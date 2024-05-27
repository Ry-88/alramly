<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\ImageUploder;
use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function index()
    {
        $about = About::first();


        return view('dashboard.about.index', compact('about'));
    }
    public function create()
    {
        return view('dashboard.about.create');
    }

    public function store(Request $request)
    {


        $request->validate([
            'content' => 'required',
            'content_en' => 'required',

        ], [
            'content.required' => 'يجب ادخال محتوى',
            'content_en.required' => 'يجب ادخال محتوى بالانجليزي',

        ]);

        $about = About::create([
            'content' => [
                'ar' => $request->content,
                'en' => $request->content_en,
            ],
        ]);


        $image = ImageUploder::uploadOneImage($request, 'about');

        $about->image()->create([
            'path' => $image,
            'imageable_id' => $about->id,
            'imageable_type' => get_class($about)
        ]);

        alert()->success('', 'تم الاضافه  بنجاح');
        return redirect()->route('abouts.index');
    }


    public function edit($id)
    {
        $about = About::find($id);
        return view('dashboard.about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required',
            'content_en' => 'required'
        ], [
            'content.required' => 'يجب ادخال محتوى',
            'content_en.required' => 'يجب ادخال محتوى بالانجليزي'
        ]);

        $about = About::find($id);
        $about->content = [
            'ar' => $request->content,
            'en' => $request->content_en,

        ];

        $about->save();

        if ($request->hasFile('image')) {
            $image = ImageUploder::uploadOneImage($request, 'about');
            $about->image()->update([
                'path' => $image,
            ]);
        }

        alert()->success('', 'تم التعديل بنجاح');
        return redirect()->route('abouts.index');
    }


    public function delete($id)
    {
        $about = About::find($id);
        $about->image()->delete();
        $about->delete();
        alert()->success('', 'تم الحذف بنجاح');
        return redirect()->route('abouts.index');
    }
}
