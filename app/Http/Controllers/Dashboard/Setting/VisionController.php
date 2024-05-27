<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use App\Models\Vision;
use Illuminate\Http\Request;

class VisionController extends Controller
{
    public function index()
    {
        $visions = Vision::all();
        return view('dashboard.setting.vision.index', compact('visions'));
    
    }
    public function create()
    {
        return view('dashboard.setting.vision.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image',
        ],[
            'title.required' => 'يجب ادخال عنوان الرؤية',
            'title.string' => 'يجب ادخال عنوان الرؤية بشكل صحيح',
            'title.max' => 'يجب ان لا يتعدي 255 حرف',
            'description.required' => 'يجب ادخال وصف الرؤية',
            'description.string' => 'يجب ادخال وصف الرؤية بشكل صحيح',
            'image.required' => 'يجب أرفاق صورة الرؤية',
        ]);
        $extension = $request->image->getClientOriginalExtension();
        $image = $request->image->move('visions', time().'-'.rand(10, 10000).'.'.$extension);
        Vision::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image
        ]);
        alert()->success('الرؤية', 'تم اضافة الرؤية بنجاح');
        return redirect()->route('setting.visions.index');
    }

    public function edit(Vision $vision)
    {
        return view('dashboard.setting.vision.edit', compact('vision'));
    }

    public function update(Request $request, Vision $vision)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
          
        ],[
            'title.required' => 'يجب ادخال عنوان الرؤية',
            'title.string' => 'يجب ادخال عنوان الرؤية بشكل صحيح',
            'title.max' => 'يجب ان لا يتعدي 255 حرف',
            'description.required' => 'يجب ادخال وصف الرؤية',
            'description.string' => 'يجب ادخال وصف الرؤية بشكل صحيح',
        ]);
        
        if ($request->image){
            $extension = $request->image->getClientOriginalExtension();
            $image = $request->image->move('visions', time().'-'.rand(10, 10000).'.'.$extension);
        }
        $vision->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image ?? $vision->image,
        ]);
      
        alert()->success('الرؤية', 'تم تعديل الرؤية بنجاح');
        return redirect()->route('setting.visions.index');

    }

    public function delete(Vision $vision)
    {
        $vision->delete();
        alert()->success('الرؤية', 'تم حذف الرؤية بنجاح');

        return redirect()->route('setting.visions.index');
    }

  public function  updateStatusEnabled($id)
    {
        
        $vision = Vision::findOrFail($id);
        $vision->status = 'enabled';
        $vision->save();
        alert()->success('الرؤية', 'تم تفعيل الرؤية بنجاح');
        return redirect()->route('setting.visions.index');

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
