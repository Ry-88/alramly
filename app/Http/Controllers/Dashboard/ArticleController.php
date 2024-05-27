<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\ImageUploder;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('image')->get();
        return view('dashboard.article.index', compact('articles'));
    }

    public function create()
    {
        return view('dashboard.article.create');
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
            'title.required' => 'يجب ادخال عنوان المقال',
            'title.string' => 'يجب ادخال عنوان المقال بشكل صحيح',
            'title_en.required' => 'يجب ادخال عنوان المقال بالانجليزي',
            'title_en.string' => 'يجب ادخال عنوان المقال بالانجليزي بشكل صحيح',
            'title.max' => 'يجب ان لا يتعدي 255 حرف',
            'content.required' => 'يجب ادخال محتوى المقال',
            'content_en.required' => 'يجب ادخال محتوى المقال بالانجليزي',
            'image.required' => 'يجب ادخال صورة للخبر',
        ]);

        $article = article::create([
            'title' => [
                'ar' => $request->title,
                'en' => $request->title_en,
            ],
            'content' => [
                'ar' => $request->content,
                'en' => $request->content_en,
            ],
        ]);



        $image = ImageUploder::uploadOneImage($request, 'article');
        $article->image()->create([
            'path' => $image,
            'imageable_id' => $article->id,
            'imageable_type' => get_class($article)
        ]);

        alert()->success('المقالات', 'تم اضافة المقال بنجاح');

        return redirect()->route('articles.index');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('dashboard.article.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'content' => 'required|string',
            'content_en' => 'required|string',
        ], [
            'title.required' => 'يجب ادخال عنوان المقال',
            'title.string' => 'يجب ادخال عنوان المقال بشكل صحيح',
            'title_en.required' => 'يجب ادخال عنوان المقال بالانجليزي',
            'title_en.string' => 'يجب ادخال عنوان المقال بالانجليزي بشكل صحيح',
            'title.max' => 'يجب ان لا يتعدي 255 حرف',
            'content.required' => 'يجب ادخال محتوى المقال',
            'content_en.required' => 'يجب ادخال محتوى المقال بالانجليزي',
        ]);

        $article = Article::findOrFail($id);
        $article->update([
            'title' => [
                'ar' => $request->title,
                'en' => $request->title_en,
            ],
            
            'content' => [
                'ar' => $request->content,
                'en' => $request->content_en,
            ],
        ]);
        if ($request->hasFile('image')) {
            $image = ImageUploder::uploadOneImage($request, 'article');
            $article->image()->update([
                'path' => $image,
                'imageable_id' => $article->id,
                'imageable_type' => get_class($article)
            ]);
        }



        alert()->success('المقالات', 'تم تعديل المقال بنجاح');
        return redirect()->route('articles.index');
    }

    public function delete($id)
    {
        $article = Article::findOrFail($id);
        $article->image()->delete();
        $article->delete();
        alert()->success('المقالات', 'تم حذف المقال بنجاح');
        return redirect()->route('articles.index');
    }
}
