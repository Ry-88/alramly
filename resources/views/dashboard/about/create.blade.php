 @extends('layouts.admin')
 
 @section('title')
 حولنا
 @endsection

 @section('content')
     <div class="container" style="margin-top:20px">
        
         <div class="row">
            <div class="col-6">
                <h3 style="margin-bottom: 5rem;">حولنا </h3>
            </div>
            <div class="col-6">
                <a href="{{ route('abouts.index')}}" class="btn btn-outline-success waves-effect">رجوع</a>
            </div>
        </div>
         <form class="form form-vertical" action="{{ route('abouts.store') }}" method="POST" enctype="multipart/form-data">
             @csrf
             <div class="row">


                 <div class="col-8">
                     <div class="form-group">
                         <label for="email-id-vertical">المحتوى بالعربي </label>
                         <textarea id="editor"  class="form-control" name="content" id="email-id-vertical" rows="3"></textarea>
                         @error('content')
                             <span id="basic-default-name-error" class="error">
                                 {{ $message }}
                             </span>
                         @enderror
                     </div>
                 </div>

                 <div class="col-8">
                    <div class="form-group">
                        <label for="email-id-vertical">المحتوى بالانجليزي</label>
                        <textarea id="editorEn"  class="form-control" name="content_en" id="email-id-vertical" rows="3"></textarea>
                        @error('content_en')
                            <span id="basic-default-name-error" class="error">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
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
                    @error('image') 
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                 
                 </div>

 

                 <div class="col-12">
                     <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">حفظ</button>
                 </div>
             </div>
         </form>
         
     </div>

     
 @endsection
