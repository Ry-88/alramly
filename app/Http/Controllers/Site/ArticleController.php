<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('image')->paginate(12);
        return view('site.articles.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::find($id)->load('image');
        return view('site.articles.show', compact('article'));
    }
}
