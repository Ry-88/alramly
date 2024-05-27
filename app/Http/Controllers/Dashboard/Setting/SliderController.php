<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
     
        return view('dashboard.setting.slider.index',compact('sliders'));
    }
   
    public function updateStatusEnabled($id)
    {
        $slider = Slider::findOrFail($id);   
        $slider->update(['status'=>'enabled']);
        alert()->success('الضبط','تم تفعيل الاسلايدر بنجاح');
        return redirect()->back();
    }

    public function updateStatusDisabled($id)
    {
        $slider = Slider::findOrFail($id);   
        $slider->update(['status' => 'disabled']);
        alert()->success('الضبط','تم تعطيل الاسلايدر بنجاح');
        return redirect()->back();
    }
}
