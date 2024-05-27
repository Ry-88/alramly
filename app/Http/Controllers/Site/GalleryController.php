<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $videos = Gallery::where('type', 'video')->get();
        $photos = Gallery::where('type', 'image')->get();
        return view('site.gallery.index',[
            'videos' => $videos,
            'photos' => $photos
        ]);
    }
}
