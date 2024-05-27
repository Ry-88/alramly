@extends('layouts.admin')


@section('title')
المشاريع
@endsection
 

@section('content')

<div class="container" style="margin-top:20px">
    <div class="row">
        <div class="col-6">
            <h3 style="margin-bottom: 5rem;">تعديل البيانات</h3>
        </div>
        <div class="col-6">
            <a href="{{ route('projects.index') }}" class="btn btn-outline-success waves-effect">رجوع</a>
        </div>
    </div>
       <form class="form form-vertical" action="{{ route('projects.update',$project->id) }}" method="POST" enctype="multipart/form-data">
           @csrf
              @method('PUT')
           <div class="row">
               <div class="col-8">
                   <div class="form-group">
                       <label for="first-name-vertical">أسم المشروع بالعربي</label>
                       <input type="text" id="first-name-vertical" class="form-control" name="name" value="{{ $project->getTranslations('name')['ar'] }}">
                       @error('name') 
                       <span id="basic-default-name-error" class="error">
                           {{ $message }}
                       </span>
                       @enderror
                   </div>
               </div>

               <div class="col-8">
                <div class="form-group">
                    <label for="first-name-vertical">أسم المشروع بالانجليزي</label>
                    <input type="text" id="first-name-vertical" class="form-control" name="name_en" value="{{ $project->getTranslations('name')['en'] }}">
                    @error('name_en') 
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

               <div class="col-8">
                <div class="form-group">
                    <label for="first-name-vertical">الفئة المستهدفه بالعربي</label>
                    <input type="text" id="first-name-vertical" class="form-control" name="target_group" value="{{ $project->getTranslations('target_group')['ar'] }}">
                    @error('target_group') 
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-8">
                <div class="form-group">
                    <label for="first-name-vertical">الفئة المستهدفه بالانجليزي</label>
                    <input type="text" id="first-name-vertical" class="form-control" name="target_group_en" value="{{ $project->getTranslations('target_group')['en'] }}">
                    @error('target_group_en') 
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-8">
                <div class="form-group">
                    <label for="first-name-vertical">المكان بالعربي</label>
                    <input type="text" id="first-name-vertical" class="form-control" name="place" value="{{ $project->getTranslations('place')['ar'] }}">
                    @error('place') 
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-8">
                <div class="form-group">
                    <label for="first-name-vertical">المكان بالانجليزي</label>
                    <input type="text" id="first-name-vertical" class="form-control" name="place_en" value=" {{ $project->getTranslations('place')['en'] }}">
                    @error('place_en') 
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-8">
                <div class="form-group">
                    <label for="email-id-vertical">الوصف بالعربي</label>
                       <textarea id="editor"  class="form-control" name="description" id="email-id-vertical" rows="3">
                        {{ $project->getTranslations('description')['ar'] }}
                       </textarea>
                    @error('description') 
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
              </div>

              <div class="col-8">
                <div class="form-group">
                    <label for="email-id-vertical">الوصف بالانجليزي</label>
                       <textarea id="editorEn"  class="form-control" name="description_en" id="email-id-vertical" rows="3">
                           {{ $project->getTranslations('description')['en'] }}
                       </textarea>
                    @error('description_en') 
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
              </div>

              <div class="col-8 mt-2 mb-2" id="pdf-app">
                <label for="first-name-vertical"> أرفاق ملف</label>
                <input @change="handleChange" type="file" name="document" accept="application/pdf" />

                        <embed
                        v-if="embedSrc"
                        type="video/webm"
                        :src="embedSrc"
                        width="100%"
                        style="max-height: 50rem; min-height: 20rem"
                    />
                    @error('document') 
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
               </div>
 
             


               <div class="col-8">
                <p><input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)"
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
              
               <div class="col-12 mt-2">
                   <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">تعديل</button>
               </div>
           </div>
       </form>
   </div>

@endsection