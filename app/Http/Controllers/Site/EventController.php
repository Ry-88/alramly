<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('images')->paginate(12);
        
        return view('site.event.index',compact('events'));
    }

    public function show($slug)
    {
        $event = Event::where('slug',$slug)->first();
        return view('site.event.show',compact('event'));
    }
  
}
