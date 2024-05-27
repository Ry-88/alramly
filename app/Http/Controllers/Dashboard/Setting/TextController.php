<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Text;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TextController extends Controller
{
    public function index()
    {
        $texts = Text::all();
        return view('dashboard.setting.text.index', compact('texts'));
    }

    public function create()
    {
        return view('dashboard.setting.text.create');
    }
  
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:texts',
            'body' => 'required',
        ],[
            'title.required' => 'يجب ادخال عنوان النص',
            'title.unique' => 'عنوان النص موجود مسبقا',
            'body.required' => 'يجب ادخال النص',
        ]);
        
         $text = Text::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
         ]);
        
       
         if($request->has('image')){
            $extension = $request->image->getClientOriginalExtension();
            $image = $request->image->move('texts', time().'-'.rand(10, 10000).'.'.$extension);

         
            Image::create([
                'path' => $image,
                'imageable_id' => $text->id,
                'imageable_type' => get_class($text),
            ]);
       
         }

         alert()->success('النصوص','تم الحفظ بنجاح');
         return redirect()->route('texts.index');
    }



    public function edit(Text $text)
    {
        return view('dashboard.setting.text.edit', compact('text'));
    }


    public function update(Request $request, Text $text)
    {
        $request->validate([
            'title' => 'required|unique:texts,title,'.$text->id,
            'body' => 'required',
        ],[
            'title.required' => 'يجب ادخال عنوان النص',
            'title.unique' => 'عنوان النص موجود مسبقا',
            'body.required' => 'يجب ادخال النص',
        ]);
        
         $text->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
         ]);
        
       
         if($request->has('image')){
          
       
            $extension = $request->image->getClientOriginalExtension();
            $image = $request->image->move('texts', time().'-'.rand(10, 10000).'.'.$extension);
          

       
           $text->image()->update([
                'path' => $image,
                'imageable_type' => get_class($text),
            ]);
        
         }

         alert()->success('النصوص','تم التعديل بنجاح');
         return redirect()->route('texts.index');
    }

    public function delete(Text $text)
    {
        $text->delete();
        alert()->success('النصوص','تم الحذف بنجاح');
        return redirect()->route('texts.index');
    }


    public function updateStatusEnabled(Text $text)
    {
         
        $text->update(['status'=>'enabled']);
        alert()->success('الضبط','تم تفعيل النص بنجاح');
        return redirect()->back();
    }

    public function updateStatusDisabled(Text $text)
    {
   
        $text->update(['status' => 'disabled']);
        alert()->success('الضبط','تم تعطيل النص بنجاح');
        return redirect()->back();
    }
}
