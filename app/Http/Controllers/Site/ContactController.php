<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Rules\PhoneNumber;
use App\Rules\ReCaptcha;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('site.contact.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'phone' =>  ['required', 'max:10', new PhoneNumber()],
            'g-recaptcha-response' => ['required',new ReCaptcha()]
        ], [
            'name.required' => __('الاسم مطلوب'),
            'email.required' => __('البريد الالكتروني مطلوب'),
            'email.email' => __('البريد الالكتروني غير صحيح'),
            'message.required' => __('يجب إدخال الرسالة'),
            'phone.required' => __('رقم الجوال مطلوب'),
            'phone.max' =>  __('رقم الجوال يجب أن يكون لا يكون أكثر من 10 ارقام'),
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'phone' => $request->phone,
        ]);


        alert()->success('تم الإرسال بنجاح', 'شكرا لك');
        return redirect()->route('site.contact.create');
    }
}
