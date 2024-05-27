<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\ImageUploder;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Gallery::where('type', 'image')->paginate(10);
        return view('dashboard.gallery.photo.index', compact('photos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ], [
            'image.required' => 'الصورة مطلوبة',
            'image.image' => 'الرجاء  رفع صورة ',
            'image.mimes' => 'الرجاء رفع صورة بصيغة jpeg,jpg,png',
        ]);

        $image = ImageUploder::uploadOneImage($request, 'galleries');
        Gallery::create([
            'source' => $image,
            'type' => 'image',
        ]);

        alert()->success('تم الحفظ بنجاح');


        return redirect()->back();
    }

    public function delete($id)
    {
        $photo = Gallery::findOrFail($id);
        $photo->delete();
        alert()->success('تم الحذف بنجاح');
        return redirect()->back();
    }
}
