<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Control;
use App\Models\Slider;
use App\Models\Vision;
use App\Models\Event;
use App\Models\MainMenu;
use App\Models\News;
use App\Models\Partner;
use App\Models\Project;
use App\Models\SocialMedia;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 'enabled')->with('image')->get();
        $visions = Vision::where('status', 'enabled')->get();
        $event = Event::where('date', '>=', Carbon::today())->where('time', '>=', Carbon::now())->with('images')->latest()->first();
        $news = News::with('image')->get();
        $partners = Partner::with('image')->get();
        $project = Project::with('image')->latest()->first();


        // $meuns = MainMenu::with(['subMeuns' => function($q){
        //     $q->where('status','enabled');
        // }])->get();
        // dd($meuns);



        return view('site.home.index', compact('sliders', 'visions', 'event', 'news', 'partners', 'project'));
    }
}
