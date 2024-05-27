<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('image')->paginate(12);
        return view('site.news.index', compact('news'));
    }

    public function show($id)
    {
        $report = News::find($id)->load('image');
        return view('site.news.show', compact('report'));
    }
}
