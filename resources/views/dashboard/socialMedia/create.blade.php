
@extends('layouts.admin')
@section('title')
وسائل التواصل الاجتماعي
@endsection

@section('content')

<div class="container" style="margin-top:20px">
    
    <div class="row">
        <div class="col-6">
            <h3 style="margin-bottom: 5rem;"> أضافة حسابات وسائل التواصل </h3>
        </div>
        <div class="col-6">
            <a href="{{ route('social-media.index') }}" class="btn btn-outline-success waves-effect">رجوع</a>
        </div>
    </div>
       <form class="form form-vertical" action="{{ route('social-media.store') }}" method="POST" enctype="multipart/form-data">
           @csrf
           <div class="row">
               <div class="col-8">
                   <div class="form-group">
                       <label for="first-name-vertical">تويتر</label>
                       <input type="text" id="first-name-vertical" class="form-control" name="twitter">
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
                    <input type="text" id="first-name-vertical" class="form-control" name="facebook">
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
                    <input type="text" id="first-name-vertical" class="form-control" name="snapchat">
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
                    <input type="text" id="first-name-vertical" class="form-control" name="instagram">
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
                    <input type="text" id="first-name-vertical" class="form-control" name="tiktok">
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
                    <input type="text" id="first-name-vertical" class="form-control" name="youtube">
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
                    <input type="text" id="first-name-vertical" class="form-control" name="whatsapp">
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
                    <input type="text" id="first-name-vertical" class="form-control" name="email">
                    @error('email')
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>


 
             
              
               <div class="col-12 mt-2">
                   <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">حفظ</button>
               </div>
           </div>
       </form>
   </div>

@endsection