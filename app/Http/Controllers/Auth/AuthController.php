<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    } 

    public function login(Request $request)
    {



        $this->validate(
            $request,
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'email.required' => 'email is required',
                'email.email' => 'الرجاء إدخال بريد إلكتروني صحيح',
                'password.required' => 'الرجاء إدخال كلمة المرور',
            ]
        );

        $remember_me = $request->has('remember_me') ? true : false;
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials, $remember_me)) {

            return redirect()->route('events.index');
        }

        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'لا يوجد حساب مسجل بهذا البريد الإلكتروني'
        ]);
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login.showLoginForm');
    }
}
