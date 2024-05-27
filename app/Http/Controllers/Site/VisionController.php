<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Vision;
use Illuminate\Http\Request;

class VisionController extends Controller
{
    public function index()
    {
        $visions = Vision::all();
        return view('site.about-us.index', compact('visions'));
    }

    public function goals()
    {
        $goal = Vision::where('title->en', 'Goals')->first();
        // $goal = Vision::where('id', 1)->first();


        return view('site.about-us.goals', compact('goal'));
    }

    public function message()
    {
        $message = Vision::where('title->en', 'Message')->first();
        return view('site.about-us.message', compact('message'));
    }

    public function vision()
    {
        $vision = Vision::where('title->en', 'Vision')->first();
        return view('site.about-us.vision', compact('vision'));
    }
}
