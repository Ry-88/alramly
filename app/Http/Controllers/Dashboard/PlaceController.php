<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\ImageUploder;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlaceController extends Controller
{
    
    public function index()
    {
        $places = Place::with('images')->get();
        return view('dashboard.place.index', compact('places'));
    }

    public function create()
    {
        return view('dashboard.place.create');
    }

    public function store(Request $request)
    {
        

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'images' => 'required|array',
            'images.*' => 'image'],[
                'name.required' => 'يجب ادخال اسم المكان',
                'name.string' => 'يجب ادخال اسم المكان بشكل صحيح',
                'name.max' => 'يجب ان لا يتعدي 255 حرف',
                'description.required' => 'يجب ادخال وصف المكان',
                'images.required' => 'يجب أرفاق صور للمكان',
            ]);

            // $request->messages();


        $place = Place::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug'=>Str::slug($request->name)
        ]);

       

        $images = ImageUploder::uploadMultipleImages($request, 'places');

        collect($images)->each(function ($image) use ($place) {
            Image::create([
                'path' => $image->getFilename(),
                'imageable_id' => $place->id,
                'imageable_type' => get_class($place),
            ]);
        });

        alert()->success('الاماكن', 'تم اضافة مكان بنجاح');

        return redirect()->route('places.index');
    }

    public function edit($id)
    {
        $place = Place::findOrFail($id);
        return view('dashboard.place.edit', compact('place'));

    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
        ],[
            'name.required' => 'يجب ادخال اسم المكان',
            'name.string' => 'يجب ادخال اسم المكان بشكل صحيح',
            'name.max' => 'يجب ان لا يتعدي 255 حرف',
            'description.required' => 'يجب ادخال وصف المكان',
        ]);

        $place = Place::findOrFail($id);
        $place->update($request->all());

        if($request->has('images')){
            $images = ImageUploder::uploadMultipleImages($request, 'places');
              $place->images()->delete();
            collect($images)->each(function ($image) use ($place) {
                Image::create([
                    'path' => $image->getFilename(),
                    'imageable_id' => $place->id,
                    'imageable_type' => get_class($place),
                ]);
            });
        }

        alert()->success('الاماكن', 'تم تعديل مكان بنجاح');

        return redirect()->route('places.index');

    }

    public function delete($id)
    {
        $place = Place::findOrFail($id);
        $place->images()->delete();
        $place->delete();
        alert()->success('الاماكن', 'تم حذف مكان بنجاح');
        return redirect()->route('places.index');

    }
}
