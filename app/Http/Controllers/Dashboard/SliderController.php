<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\ImageUploder;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::all();
        return view('dashboard.slider.index', compact('sliders'));
    }
    public function create()
    {
        return view('dashboard.slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'image' => 'required',

        ], [
            'name.required' => 'يجب ادخال اسم الاسلايدر',
            'name.string' => 'يجب ادخال اسم الاسلايدر بشكل صحيح',
            'name.max' => 'يجب ان لا يتعدي 255 حرف',
            'name_en.required' => 'يجب ادخال اسم الاسلايدر بالانجليزي',
            'name_en.string' => 'يجب ادخال اسم الاسلايدر بشكل صحيح',
            'name_en.max' => 'يجب ان لا يتعدي 255 حرف',
            'image.required' => 'يجب أرفاق صور الاسلايدر ',
        ]);


        $slider = Slider::create([
            'name' => [
                'ar' => $request->name,
                'en' => $request->name_en,
            ]
        ]);



        // $extension = $request->image->getClientOriginalExtension();
        // $image = $request->image->move('sliders', time().'-'.rand(10, 10000).'.'.$extension);

        $image = ImageUploder::uploadOneImage($request, 'sliders');

        Image::create([
            'path' => $image->getFilename(),
            'imageable_id' => $slider->id,
            'imageable_type' => get_class($slider),
        ]);



        alert()->success('الضبط', 'تم  إضافة الشريحة بنجاح    ');
        return redirect()->route('sliders.index');
    }


    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('dashboard.slider.edit', compact('slider'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',


        ], [
            'name.required' => 'يجب ادخال اسم الاسلايدر',
            'name.string' => 'يجب ادخال اسم الاسلايدر بشكل صحيح',
            'name.max' => 'يجب ان لا يتعدي 255 حرف',
            'name_en.required' => 'يجب ادخال اسم الاسلايدر بالانجليزي',
            'name_en.string' => 'يجب ادخال اسم الاسلايدر بالانجليزي بشكل صحيح',
            'name_en.max' => 'يجب ان لا يتعدي 255 حرف',
        ]);

        $slider = Slider::find($id);

        $slider->update([
            'name' => [
                'ar' => $request->name,
                'en' => $request->name_en,
            ],
        ]);
        if ($request->hasFile('image')) {
            $image = ImageUploder::uploadOneImage($request, 'sliders');
            $slider->image()->update([
                'path' => $image,
            ]);
        }

        alert()->success('الضبط', 'تم تعديل الشريحة بنجاح');
        return redirect()->route('sliders.index');
    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        $slider->image()->delete();
        $slider->delete();
        alert()->success('الضبط', 'تم حذف الشريحة بنجاح');
        return redirect()->route('sliders.index');
    }
}
