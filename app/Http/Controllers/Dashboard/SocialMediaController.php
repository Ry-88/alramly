<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMedia;

class SocialMediaController extends Controller
{
    public function create()
    {
        return view('dashboard.socialMedia.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'twitter' => 'required|url',
            'facebook' => 'required|url',
            'instagram' => 'required|url',
            'youtube' => 'required|url',
            'whatsapp' => 'required',
            'snapchat' => 'required|url',
            'tiktok' => 'required|url',
            'email' => 'required|email',
        ], [
            'twitter.required' => 'يجب ادخال  رابط حساب تويتر',
            'twitter.url' => 'يجب ادخال  رابط حساب تويتر صحيح',
            'facebook.required' => 'يجب ادخال  رابط حساب فيسبوك',
            'facebook.url' => 'يجب ادخال  رابط حساب فيسبوك صحيح',
            'instagram.required' => 'يجب ادخال  رابط حساب الانستجرام',
            'instagram.url' => 'يجب ادخال  رابط حساب الانستجرام صحيح',
            'youtube.required' => 'يجب ادخال  رابط قناة اليوتيوب',
            'youtube.url' => 'يجب ادخال  رابط قناة اليوتيوب صحيح',
            'whatsapp.required' => 'يجب ادخال رقم واتساب',
            'snapchat.required' => 'يجب ادخال  رابط حساب سناب شات',
            'snapchat.url' => 'يجب ادخال  رابط حساب سناب شات صحيح',
            'tiktok.required' => 'يجب ادخال  رابط حساب تيكتوك',
            'tiktok.url' => 'يجب ادخال  رابط حساب تيكتوك صحيح',
            'email.required' => 'يجب ادخال بريد الكتروني',
            'email.email' => 'يجب ادخال بريد الكتروني صحيح',
        ]);

        $socialMedia = new SocialMedia();
        $socialMedia->twitter = $request->twitter;
        $socialMedia->facebook = $request->facebook;
        $socialMedia->instagram = $request->instagram;
        $socialMedia->youtube = $request->youtube;
        $socialMedia->whatsapp = $request->whatsapp;
        $socialMedia->snapchat = $request->snapchat;
        $socialMedia->tiktok = $request->tiktok;
        $socialMedia->email = $request->email;
        $socialMedia->save();
        alert()->success('تمت الاضافة بنجاح');
        return redirect()->route('social-media.index');

        // return redirect()->route('dashboard.socialMedia.index');
    }

    public function index()
    {
        $socialMedia = SocialMedia::first();
        return view('dashboard.socialMedia.index', compact('socialMedia'));
    }

    public function edit($id)
    {
        $socialMedia = SocialMedia::findOrFail($id);
        return view('dashboard.socialMedia.edit', compact('socialMedia'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'twitter' => 'required|url',
            'facebook' => 'required|url',
            'instagram' => 'required|url',
            'youtube' => 'required|url',
            'whatsapp' => 'required',
            'snapchat' => 'required|url',
            'tiktok' => 'required|url',
            'email' => 'required|email',
        ], [
            'twitter.required' => 'يجب ادخال  رابط حساب تويتر',
            'twitter.url' => 'يجب ادخال  رابط حساب تويتر صحيح',
            'facebook.required' => 'يجب ادخال  رابط حساب فيسبوك',
            'facebook.url' => 'يجب ادخال  رابط حساب فيسبوك صحيح',
            'instagram.required' => 'يجب ادخال  رابط حساب الانستجرام',
            'instagram.url' => 'يجب ادخال  رابط حساب الانستجرام صحيح',
            'youtube.required' => 'يجب ادخال  رابط قناة اليوتيوب',
            'youtube.url' => 'يجب ادخال  رابط قناة اليوتيوب صحيح',
            'whatsapp.required' => 'يجب ادخال رقم واتساب',
            'snapchat.required' => 'يجب ادخال  رابط حساب سناب شات',
            'snapchat.url' => 'يجب ادخال  رابط حساب سناب شات صحيح',
            'tiktok.required' => 'يجب ادخال  رابط حساب تيكتوك',
            'tiktok.url' => 'يجب ادخال  رابط حساب تيكتوك صحيح',
            'email.required' => 'يجب ادخال بريد الكتروني',
            'email.email' => 'يجب ادخال بريد الكتروني صحيح',
        ]);

        $socialMedia = SocialMedia::findOrFail($id);
        $socialMedia->twitter = $request->twitter;
        $socialMedia->facebook = $request->facebook;
        $socialMedia->instagram = $request->instagram;
        $socialMedia->youtube = $request->youtube;
        $socialMedia->whatsapp = $request->whatsapp;
        $socialMedia->snapchat = $request->snapchat;
        $socialMedia->tiktok = $request->tiktok;
        $socialMedia->email = $request->email;
        $socialMedia->save();
        alert()->success('تم التعديل بنجاح');
        return redirect()->route('social-media.index');
    }

    public function delete($id)
    {
        $socialMedia = SocialMedia::findOrFail($id);
        $socialMedia->delete();
        alert()->success('تم الحذف بنجاح');
        return redirect()->route('social-media.index');
    }
}
