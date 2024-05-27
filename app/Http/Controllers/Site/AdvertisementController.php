<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'facility_name_adv' => 'required',
            'coordinator_adv' => 'required',
            'email_adv' => 'required',
            'phone_adv' => 'required',
            'city_adv' => 'required',
            'g-recaptcha-response' => 'required|recaptchav3:advertisement,0.5'
        ], [
            'facility_name.required' => __('الرجاء ادخال اسم المنشأة'),
            'coordinator.required' => __('الرجاء ادخال اسم المنسق'),
            'email.required' => __('البريد الالكتروني مطلوب'),
            'phone.required' => __('رقم الجوال مطلوب'),
            'city.required' => __('المدينة مطلوبة'),
        ]);

        Advertisement::create([
            'facility_name' => $request->facility_name_adv,
            'project_id' => $request->project_id,
            'coordinator' => $request->coordinator_adv,
            'email' => $request->email_adv,
            'phone' => $request->phone_adv,
            'city' => $request->city_adv,
        ]);

        alert()->success('تم الاعلان بنجاح', 'شكرا لك');
        return back();
    }
}
