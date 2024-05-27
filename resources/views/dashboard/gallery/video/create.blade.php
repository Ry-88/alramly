@extends('layouts.admin')


@section('title')
 الفيدوهات
@endsection

@section('content')
<div class="container" style="margin-top:20px">


    <div class="row">
        <div class="col-6">
            <h3 style="margin-bottom: 5rem;">أضافة فيديو </h3>
        </div>
        <div class="col-6">
            <a href="{{ route('galleries.video.index') }}" class="btn btn-outline-success waves-effect">رجوع</a>
        </div>
    </div>
       <form class="form form-vertical" action="{{ route('galleries.video.store') }}" method="POST" enctype="multipart/form-data">
           @csrf
           <div class="row">
               <div class="col-8">
                   <div class="form-group">
                       <label for="first-name-vertical">أسم الفيديو بالعربي</label>
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
                    <label for="first-name-vertical">أسم الفيديو بالانجليزي</label>
                    <input type="text" id="first-name-vertical" class="form-control" name="name_en">
                    @error('name_en') 
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

               <div class="col-8">
                <div class="form-group">
                    <label for="first-name-vertical">رابط الفيديو</label>
                    <input type="text" id="first-name-vertical" class="form-control" name="link">
                    @error('link') 
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