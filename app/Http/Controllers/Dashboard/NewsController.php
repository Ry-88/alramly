<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\ImageUploder;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('image')->get();
        return view('dashboard.news.index', compact('news'));
    }

    public function create()
    {
        return view('dashboard.news.create');
    }


    public function store(Request $request)
    {


        $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'content' => 'required|string',
            'content_en' => 'required|string',
            'image' => 'required|image',
        ], [
            'title.required' => 'يجب ادخال عنوان الخبر',
            'title.string' => 'يجب ادخال عنوان الخبر بشكل صحيح',
            'title_en.required' => 'يجب ادخال عنوان الخبر بالانجليزي',
            'title_en.string' => 'يجب ادخال عنوان الخبر بالانجليزي بشكل صحيح',
            'title.max' => 'يجب ان لا يتعدي 255 حرف',
            'content.required' => 'يجب ادخال محتوى الخبر',
            'content_en.required' => 'يجب ادخال محتوى الخبر بالانجليزي',
            'image.required' => 'يجب ادخال صورة للخبر',
        ]);

        $news = News::create([
            'title' => [
                'ar' => $request->title,
                'en' => $request->title_en,
            ],
            'slug' => Str::slug($request->title_en),
            'content' => [
                'ar' => $request->content,
                'en' => $request->content_en,
            ],
        ]);



        $image = ImageUploder::uploadOneImage($request, 'news');
        $news->image()->create([
            'path' => $image,
            'imageable_id' => $news->id,
            'imageable_type' => get_class($news)
        ]);

        alert()->success('الاخبار', 'تم اضافة الخبر بنجاح');

        return redirect()->route('news.index');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('dashboard.news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'content' => 'required|string',
            'content_en' => 'required|string',
        ], [
            'title.required' => 'يجب ادخال عنوان الخبر',
            'title.string' => 'يجب ادخال عنوان الخبر بشكل صحيح',
            'title_en.required' => 'يجب ادخال عنوان الخبر بالانجليزي',
            'title_en.string' => 'يجب ادخال عنوان الخبر بالانجليزي بشكل صحيح',
            'title.max' => 'يجب ان لا يتعدي 255 حرف',
            'content.required' => 'يجب ادخال محتوى الخبر',
            'content_en.required' => 'يجب ادخال محتوى الخبر بالانجليزي',
        ]);

        $news = News::findOrFail($id);
        $news->update([
            'title' => [
                'ar' => $request->title,
                'en' => $request->title_en,
            ],
            'slug' => Str::slug($request->title),
            'content' => [
                'ar' => $request->content,
                'en' => $request->content_en,
            ],
        ]);
        if ($request->hasFile('image')) {

            $image = ImageUploder::uploadOneImage($request, 'news');
            $news->image()->update([
                'path' => $image,
                'imageable_id' => $news->id,
                'imageable_type' => get_class($news)
            ]);
        }



        alert()->success('الاخبار', 'تم تعديل الخبر بنجاح');
        return redirect()->route('news.index');
    }

    public function delete($id)
    {
        $news = News::findOrFail($id);
        $news->image()->delete();
        $news->delete();
        alert()->success('الاخبار', 'تم حذف الخبر بنجاح');
        return redirect()->route('news.index');
    }
}
