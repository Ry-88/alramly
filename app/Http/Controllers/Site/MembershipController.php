<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\NewMembershipRequest;
use App\Models\Membership;
use App\Rules\CheckAge;
use App\Rules\PhoneNumber;
use App\Rules\ReCaptcha;
use Carbon\Carbon;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MembershipController extends Controller
{
    public function create()
    {
        $path = public_path('cities.json');
        $cities = collect(json_decode(file_get_contents($path), true))->pluck('name_ar');

        return view('site.membership.create', compact('cities'));
    }


    public function store(Request $request)
    {
        // |unique:memberships,email'
        // tofa@mailinator.com
        $request->validate([
            'full_name' => 'required',
            'full_name_en' => 'required',
            'membership_type' => 'required',
            'email' => 'required|email|unique:memberships,email',
            'phone' => ['required', 'max:10', new PhoneNumber()],
            'day' => 'required',
            'month' => 'required',
            'year' => 'required',
            'job' => 'required',
            'city_name' => 'required',
            'g-recaptcha-response' => ['required', new ReCaptcha()]
        ], [
            'full_name.required' => __('الاسم مطلوب'),
            'full_name_en.required' => __('الاسم بالانجليزي مطلوب'),
            'membership_type.required' => __('نوع العضوية مطلوب'),
            'email.required' => __('البريد الالكتروني مطلوب'),
            'email.email' => __('البريد الالكتروني غير صحيح'),
            'email.unique' => __('البريد الالكتروني موجود مسبقا'),
            'phone.required' => __('رقم الجوال مطلوب'),
            'phone.max' => __('رقم الجوال يجب أن يكون لا يكون أكثر من 10 ارقام'),
            'id_number.required' => __('رقم الهوية مطلوب'),
            'day.required' => __('اليوم مطلوب'),
            'month.required' => __('الشهر مطلوب'),
            'year.required' => __('السنة مطلوب'),
            'job.required' => __('الوظيفة مطلوبة'),
            'city_name.required' => __('المدينة مطلوبة'),

        ]);

        $birth_date = $request->year . '-' . $request->month . '-' . $request->day;

        $age = Carbon::parse($birth_date)->diff(Carbon::now())->y;

        // return $age >= 18;
        if ($age < 18) {
            return redirect()->back()->withErrors(['birth_date' => __('العمر يجب ان يكون اكبر من 18')]);
        }



        if ($request->has('image')) {
            $extensionPersonal = $request->image->getClientOriginalExtension();
            $image = $request->image->move('membership', time() . '-' . rand(10, 10000) . '.' . $extensionPersonal);
        } else {
            $image = 'logos/defalut.png';
            $extensionPersonal = 'png';
        }


        $membership = Membership::create([
            'full_name' => [
                'ar' => $request->full_name,
                'en' => $request->full_name_en,
            ],
            'membership_type' => $request->membership_type,
            'email' => $request->email,
            'phone' => $request->phone,
            'id_number' => $request->id_number,
            'birth_date' => $request->year . '-' . $request->month . '-' . $request->day,
            'job' => $request->job,
            'city' => $request->city_name,
            'image_extension' => $extensionPersonal,
        ]);





        $membership->image()->create([
            'path' => $image,
            'imageable_id' => $membership->id,
            'imageable_type' => get_class($membership)
        ]);

        $email_receiver = 'members@heritage.org.sa';
        
        Mail::to($email_receiver)->send(new NewMembershipRequest($membership));
         
        alert()->success('تهانينا.. نشكركم على اختياركم بالانضمام لعضوية جمعية سفراء التراث، ونفيدكم بأن طلبكم قيد الإجراء، وسيتم إشعاركم بقبول الطلب على البريد الإلكتروني الخاص بكم.')->autoClose(10000);
        return back();
    }
}
