<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Rules\YoutubeUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoController extends Controller
{

    public function index()
    {
        $videos = Gallery::where('type', 'video')->get();
        return view('dashboard.gallery.video.index', compact('videos'));
    }
    public function create()
    {
        return view('dashboard.gallery.video.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'link' => ['required', 'url', new YoutubeUrl],
            'name' => 'required',
            'name_en' => 'required',
        ], [
            'link.required' => 'الرابط مطلوب',
            'link.url' => 'الرابط غير صحيح',
            'name.required' => 'الاسم مطلوب',
            'name_en.required' => 'الاسم بالانجليزي مطلوب',

        ]);

        $url = $request->link;
        parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars);

        $youtube_id = $my_array_of_vars['v'];

        Gallery::create([
            'source' => $youtube_id,
            'type' => 'video',
            'name' => [
                'ar' => $request->name,
                'en' => $request->name_en,

            ],
            'slug' => Str::slug($request->name)
        ]);

        alert()->success('تم الحفظ بنجاح');

        return to_route('galleries.video.index');
    }

    public function edit($id)
    {
        $video = Gallery::find($id);
        return view('dashboard.gallery.video.edit', compact('video'));
    }


    public function update(Request $request, $id)
    {

        $video = Gallery::find($id);
        $request->validate([
            'link' => ['required', 'url', new YoutubeUrl],
            'name' => 'required',
            'name_en' => 'required',
        ], [
            'link.required' => 'الرابط مطلوب',
            'link.url' => 'الرابط غير صحيح',
            'name.required' => 'الاسم مطلوب',
            'name_en.required' => 'الاسم بالانجليزي مطلوب',

        ]);
        $url = $request->link;
        parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars);

        $youtube_id = $my_array_of_vars['v'];


        $video->update([
            'source' =>  $youtube_id,
            'type' => 'video',
            'name' => [
                'ar' => $request->name,
                'en' => $request->name_en,
            ],
            'slug' => Str::slug($request->name)
        ]);

        alert()->success('تم التعديل بنجاح');

        return to_route('galleries.video.index');
    }

    public function delete($id)
    {
        $video = Gallery::find($id);
        $video->delete();
        alert()->success('تم الحذف بنجاح');
        return to_route('galleries.video.index');
    }
}
