<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('dashboard.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required',
        ],[
            'name.required' => 'يجب إدخال الاسم',
            'email.required' => 'يجب إدخال البريد الإلكتروني',
            'email.email' => 'يجب إدخال بريد إلكتروني صحيح',
            'email.unique' => 'هذا البريد الإلكتروني مسجل من قبل',
            'password.required' => 'يجب إدخال كلمة المرور',
            'role.required' => 'يجب إدخال الصلاحية',
        
        ]);



 User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
        ]);



       

        alert()->success('تم أضافة مستخدم جديد', 'الادارة');

        return redirect()->route('users.index');
    }

    public function index()
    {
        $users = User::all();

        return view('dashboard.user.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('dashboard.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable',
            'role' => 'required',
        ],[
            'name.required' => 'يجب إدخال اسم المستخدم',
            'email.required' => 'يجب إدخال البريد الإلكتروني',
            'email.email' => 'يجب إدخال بريد إلكتروني صحيح',
            'email.unique' => 'هذا البريد الإلكتروني مسجل من قبل',
            'role.required' => 'يجب إدخال صلاحية المستخدم',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password) ?? $user->password,
        ]);

        alert()->success('تم تعديل بيانات المستخدم', 'الادارة');

        return redirect()->route('users.index');
    }

    public function delete(User $user)
    {
        $user->delete();

        alert()->success('تم حذف المستخدم', 'الادارة');

        return redirect()->route('users.index');
    }
}
