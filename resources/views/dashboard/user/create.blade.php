
@extends('layouts.admin')
@section('title')
المستخدمين
@endsection

@section('content')

<div class="container" style="margin-top:20px">
   
    <div class="row">
        <div class="col-6">
            <h3 style="margin-bottom: 5rem;">أضافة مستخدم </h3>
        </div>
        <div class="col-6">
            <a href="{{ route('users.index') }}" class="btn btn-outline-success waves-effect">رجوع</a>
        </div>
    </div>
       <form class="form form-vertical" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
           @csrf
           <div class="row">
               <div class="col-8">
                   <div class="form-group">
                       <label for="first-name-vertical">أسم المستخدم</label>
                       <input type="text" id="first-name-vertical" class="form-control" name="name">
                       @error('name') 
                       <span id="basic-default-name-error" class="error">
                           {{ $message }}
                       </span>
                       @enderror
                   </div>
               </div>
 
             
                <div class="col-8">
                     <div class="form-group">
                          <label for="email-vertical">البريد الإلكتروني</label>
                          <input type="email" id="email-vertical" class="form-control" name="email">
                          @error('email') 
                          <span id="basic-default-email-error" class="error">
                            {{ $message }}
                          </span>
                          @enderror
                     </div>

                </div>

                <div class="col-8">
                    <div class="form-group">
                        <label for="password-vertical">كلمة المرور</label>
                        <input type="password" id="password-vertical" class="form-control" name="password">
                        @error('password') 
                        <span id="basic-default-password-error" class="error">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                </div>

                

                <div class="col-8">
                    <div class="form-group">
                        <label for="password-vertical">الصلاحيات</label>
                        <select name="role" class="form-control">
                            <option value="admin">مدير</option>
                            <option value="approver">يوافق على طلبات العضوية</option>
                        </select>
                    </div>

                    </div>

                    
              
               <div class="col-12 mt-2">
                   <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">حفظ</button>
               </div>
           </div>
       </form>
   </div>

@endsection