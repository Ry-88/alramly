
@extends('layouts.admin')
@section('title')
شركاء النجاح
@endsection

@section('content')

<div class="container" style="margin-top:20px">

    <div class="row">
        <div class="col-6">
            <h3 style="margin-bottom: 5rem;">تعديل البيانات </h3>
        </div>
        <div class="col-6">
            <a href="{{ route('partners.index') }}" class="btn btn-outline-success waves-effect">رجوع</a>
        </div>
    </div>
       <form class="form form-vertical" action="{{ route('partners.update',$partner->id) }}" method="POST" enctype="multipart/form-data">
           @csrf
              @method('PUT')
           <div class="row">
               <div class="col-8">
                   <div class="form-group">
                       <label for="first-name-vertical">أسم الشريك</label>
                       <input type="text" id="first-name-vertical" class="form-control" name="name" value="{{ $partner->getTranslations('name')['ar'] }}">
                       @error('name') 
                       <span id="basic-default-name-error" class="error">
                           {{ $message }}
                       </span>
                       @enderror
                   </div>
               </div>

               <div class="col-8">
                <div class="form-group">
                    <label for="first-name-vertical">أسم الشريك بالانجليزي</label>
                    <input type="text" id="first-name-vertical" class="form-control" name="name_en" value="{{ $partner->getTranslations('name')['en'] }}">
                    @error('name_en') 
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-8">
                <div class="form-group">
                    <label for="first-name-vertical">رابط الموقع</label>
                    <input type="text" id="first-name-vertical" class="form-control" name="url" value="{{ $partner->url }}">
                    @error('url') 
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
 

             


               <div class="col-8">
                <p><input type="file" accept="image/*" name="logo" id="file" onchange="loadFile(event)"
                    style="display: none;"></p>
            <p><label for="file"
                    style="cursor: pointer; color: blue; padding:10px 20px; border:1px solid #D8D6DE; background-color:#fff">أرفع
                    صورة</label></p>
            <p style="position: relative"><img id="output" width="200" style="border-radius: 5px; margin-top:10px; margin-bottom:10px" />
           <i onclick="removeImage(event)" id="img-remove" style="position: absolute; display:none;
           top: 10px;
           right: 10px; width: 30px; height: 30px; border-radius: 50%; line-height:30px !important;cursor: pointer; text-align:center; font-size:20px !important;color:white; background-color:#f00" class="fa fa-trash"></i></p>
                @error('logo') 
                <span id="basic-default-name-error" class="error">
                    {{ $message }}
                </span>
                @enderror
            </div>
              
               <div class="col-12">
                   <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">تعديل</button>
               </div>
           </div>
       </form>
   </div>

@endsection