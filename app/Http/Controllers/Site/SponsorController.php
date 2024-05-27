<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'facility_name' => 'required',
            'coordinator' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'g-recaptcha-response' => 'required|recaptchav3:sponsor,0.5'
        ], [
            'facility_name.required' => __('الرجاء ادخال اسم المنشأة'),
            'coordinator.required' => __('الرجاء ادخال اسم المنسق'),
            'email.required' => __('البريد الالكتروني مطلوب'),
            'phone.required' => __('رقم الجوال مطلوب'),
            'city.required' => __('المدينة مطلوبة'),
        ]);

        Sponsor::create([
            'facility_name' => $request->facility_name,
            'project_id' => $request->project_id,
            'coordinator' => $request->coordinator,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
        ]);

        alert()->success('تم أرسال طلب الرعاية بنجاح', 'شكرا لك');
        return back();
    }
}
