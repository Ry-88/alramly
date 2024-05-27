@extends('layouts.admin')

@section('title')
الوثائق
@endsection

@section('content')

<div class="container" style="margin-top:20px">
  
    <div class="row">
        <div class="col-6">
            <h3 style="margin-bottom: 5rem;">أضافة مستند </h3>
        </div>
        <div class="col-6">
            <a href="{{ url()->previous() }}" class="btn btn-outline-success waves-effect">رجوع</a>
        </div>
    </div>
       <form class="form form-vertical" action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
           @csrf
           <div class="row">
               <div class="col-8">
                   <div class="form-group">
                       <label for="first-name-vertical">عنوان المستند بالعربي</label>
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
                    <label for="first-name-vertical">عنوان المستند بالانجليزي</label>
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
                    <label for="first-name-vertical">نوع المستند</label>
                     <select class="form-control" name="document_type">
                         <option value="التقارير">التقارير </option>
                         <option value="القرار الوزاري">القرار الوزاري </option>
                         <option value="قرار تشكيل مجلس الإدارة">قرار تشكيل مجلس الإدارة</option>
                         <option value="ترخيص الجمعية">ترخيص الجمعية</option>
                         <option value="اللائحة الأساسية">اللائحة الأساسية</option>
                         <option value="اللوائح والسياسات">اللوائح والسياسات</option>
                         <option value="الهيكل التنظيمي"> الهيكل التنظيمي</option>
                         <option value="نتيجة الحوكمة">نتيجة الحوكمة</option>
                         <option value="محاضر اجتماعات مجلس الإدارة">محاضر اجتماعات مجلس الإدارة</option>
                         <option value="محاضر اجتماعات الجمعية العمومية العادية">محاضر اجتماعات الجمعية العمومية العادية</option>
                         <option value="محاضر اجتماعات الجمعية العمومية الغير عادية"> محاضر اجتماعات الجمعية العمومية الغير عادية</option>
                        </select>
                    @error('name') 
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-8 mt-2 mb-2" id="pdf-app">
                <label for="first-name-vertical"> المستند</label>
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
               
               <div class="col-12 mt-2">
                   <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">حفظ</button>
               </div>
           </div>
       </form>
   </div>

   

@endsection



@section('scripts')
<script>
    new Vue({
    el: '#pdf-app',
    data:{
        embedSrc: ''
    },
    methods:{
        handleChange(){
            this.embedSrc = URL.createObjectURL(event.target.files[0]);
    },


    }
   
    })
</script>
@endsection


