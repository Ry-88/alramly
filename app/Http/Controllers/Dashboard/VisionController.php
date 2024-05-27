<?php

namespace App\Http\Controllers\Dashboard;


use App\Helpers\ImageUploder;
use App\Http\Controllers\Controller;
use App\Models\Vision;
use Illuminate\Http\Request;

class VisionController extends Controller
{
    public function index()
    {
        $visions = Vision::all();
        return view('dashboard.vision.index', compact('visions'));
    }
    public function create()
    {
        return view('dashboard.vision.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'description_en' => 'required|string',
            'image' => 'required|image',
        ], [
            'title.required' => 'يجب ادخال عنوان الرؤية',
            'title.string' => 'يجب ادخال عنوان الرؤية بشكل صحيح',
            'title.max' => 'يجب ان لا يتعدي 255 حرف',
            'description.required' => 'يجب ادخال وصف الرؤية',
            'description.string' => 'يجب ادخال وصف الرؤية بشكل صحيح',
            'description_en.required' => 'يجب ادخال وصف الرؤية بالانجليزي',
            'description_en.string' => 'يجب ادخال وصف الرؤية بالانجليزي بشكل صحيح',
            'image.required' => 'يجب ادخال صورة الرؤية',
            'image.required' => 'يجب أرفاق صورة الرؤية',
        ]);

        $image = ImageUploder::uploadOneImage($request, 'visions');

        $AR_VALUES = [
            'Goals' => 'الاهداف',
            'Message' => 'الرسالة',
            'Vision' => 'الرؤية'
        ];


        Vision::create([
            'title' => [
                'ar' =>  $AR_VALUES[$request->title],
                'en' => $request->title,
            ],
            'description' => [
                'ar' => $request->description,
                'en' => $request->description_en,

            ],
            'image' => $image
        ]);
        alert()->success('الرؤية', 'تم اضافة الرؤية بنجاح');
        return redirect()->route('visions.index');
    }

    public function edit(Vision $vision)
    {
        return view('dashboard.vision.edit', compact('vision'));
    }

    public function update(Request $request, Vision $vision)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'description_en' => 'required|string',

        ], [
            'title.required' => 'يجب ادخال عنوان الرؤية',
            'title.string' => 'يجب ادخال عنوان الرؤية بشكل صحيح',
            'title.max' => 'يجب ان لا يتعدي 255 حرف',
            'description.required' => 'يجب ادخال وصف الرؤية',
            'description.string' => 'يجب ادخال وصف الرؤية بشكل صحيح',
            'description_en.required' => 'يجب ادخال وصف الرؤية بالانجليزي',
            'description_en.string' => 'يجب ادخال وصف الرؤية بالانجليزي بشكل صحيح',

        ]);

        if ($request->image) {
            $extension = $request->image->getClientOriginalExtension();
            $image = $request->image->move('visions', time() . '-' . rand(10, 10000) . '.' . $extension);
        }
        $AR_VALUES = [
            'Goals' => 'الاهداف',
            'Message' => 'الرسالة',
            'Vision' => 'الرؤية'
        ];
        $vision->update([
            'title' => [
                'ar' => $AR_VALUES[$request->title],
                'en' => $request->title,
            ],
            'description' => [
                'ar' => $request->description,
                'en' => $request->description_en,

            ],
            'image' => $image ?? $vision->image,
        ]);

        alert()->success('الرؤية', 'تم تعديل الرؤية بنجاح');
        return redirect()->route('visions.index');
    }

    public function delete(Vision $vision)
    {
        $vision->delete();
        alert()->success('الرؤية', 'تم حذف الرؤية بنجاح');

        return redirect()->route('visions.index');
    }

    public function  updateStatusEnabled($id)
    {

        $vision = Vision::findOrFail($id);
        $vision->status = 'enabled';
        $vision->save();
        alert()->success('الرؤية', 'تم تفعيل الرؤية بنجاح');
        return redirect()->route('visions.index');
    }

    public function  updateStatusDisabled($id)
    {

        $vision = Vision::findOrFail($id);
        $vision->status = 'disabled';
        $vision->save();
        alert()->success('الرؤية', 'تم تعطيل الرؤية بنجاح');
        return redirect()->route('visions.index');
    }
}
