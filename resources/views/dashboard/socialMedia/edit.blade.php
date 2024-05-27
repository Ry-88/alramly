
@extends('layouts.admin')
@section('title')
وسائل التواصل الاجتماعي
@endsection

@section('content')

<div class="container" style="margin-top:20px">
    
    <div class="row">
        <div class="col-6">
            <h3 style="margin-bottom: 5rem;"> تعديل البيانات</h3>
        </div>
        <div class="col-6">
            <a href="{{ route('social-media.index') }}" class="btn btn-outline-success waves-effect">رجوع</a>
        </div>
    </div>
       <form class="form form-vertical" action="{{ route('social-media.update',$socialMedia->id) }}" method="POST" enctype="multipart/form-data">
           @csrf
           @method('PUT')
           <div class="row">
               <div class="col-8">
                   <div class="form-group">
                       <label for="first-name-vertical">تويتر</label>
                       <input type="text" id="first-name-vertical" class="form-control" name="twitter" value="{{ $socialMedia->twitter }}">
                       @error('twitter') 
                       <span id="basic-default-name-error" class="error">
                           {{ $message }}
                       </span>
                       @enderror
                   </div>
               </div>

               <div class="col-8">
                <div class="form-group">
                    <label for="first-name-vertical">فيسبوك</label>
                    <input type="text" id="first-name-vertical" class="form-control" name="facebook" value="{{ $socialMedia->facebook }}">
                    @error('facebook')
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-8">
                <div class="form-group">
                    <label for="first-name-vertical">سناب شات</label>
                    <input type="text" id="first-name-vertical" class="form-control" name="snapchat" value="{{ $socialMedia->snapchat }}">
                    @error('snapchat')
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-8">
                <div class="form-group">
                    <label for="first-name-vertical">انستغرام</label>
                    <input type="text" id="first-name-vertical" class="form-control" name="instagram" value="{{ $socialMedia->instagram }}">
                    @error('instagram')
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-8">
                <div class="form-group">
                    <label for="first-name-vertical">تيك توك</label>
                    <input type="text" id="first-name-vertical" class="form-control" name="tiktok" value="{{ $socialMedia->tiktok }}">
                    @error('tiktok')
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>


            <div class="col-8">
                <div class="form-group">
                    <label for="first-name-vertical">يوتيوب</label>
                    <input type="text" id="first-name-vertical" class="form-control" name="youtube" value="{{ $socialMedia->youtube }}">
                    @error('youtube')
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-8">
                <div class="form-group">
                    <label for="first-name-vertical">واتساب</label>
                    <input type="text" id="first-name-vertical" class="form-control" name="whatsapp" value="{{ $socialMedia->whatsapp }}">
                    @error('whatsapp')
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-8">
                <div class="form-group">
                    <label for="first-name-vertical">البريد الالكتروني</label>
                    <input type="text" id="first-name-vertical" class="form-control" name="email" value="{{ $socialMedia->email }}">
                    @error('email')
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>


 
             
              
               <div class="col-12 mt-2">
                   <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">تعديل</button>
               </div>
           </div>
       </form>
   </div>

@endsection