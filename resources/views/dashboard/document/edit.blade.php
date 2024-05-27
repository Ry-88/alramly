@extends('layouts.admin')

@section('title')
الوثائق
@endsection

@section('content')

<div class="container" style="margin-top:20px">
    <div class="row">
        <div class="col-6">
            <h3 style="margin-bottom: 5rem;">تعديل البيانات </h3>
        </div>
        <div class="col-6">
            <a href="{{ url()->previous() }}" class="btn btn-outline-success waves-effect">رجوع</a>
        </div>
    </div>
       <form class="form form-vertical" action="{{ route('documents.update',$document->id) }}" method="POST" enctype="multipart/form-data">
           @csrf
           @method('PUT')
           <div class="row">
               <div class="col-8">
                   <div class="form-group">
                       <label for="first-name-vertical">عنوان المستند</label>
                       <input type="text" id="first-name-vertical" class="form-control" name="name" value="{{ $document->getTranslations('name')['ar'] }}">
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
                    <input type="text" id="first-name-vertical" class="form-control" name="name_en" value="{{ $document->getTranslations('name')['en'] }}">
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
            

                 
                         <option value="التقارير" {{ $document->document_type == 'التقارير' ? 'selected' :  ''}}>التقارير</option>
                       
                         <option value="القرار الوزاري" {{ $document->document_type == 'القرار الوزاري' ? 'selected' :  ''}}>القرار الوزاري </option>
                         <option value="قرار تشكيل مجلس الإدارة"  {{ $document->document_type == 'قرار تشكيل مجلس الإدارة' ? 'selected' :  ''}}>قرار تشكيل مجلس الإدارة</option>
                         <option value="ترخيص الجمعية" {{ $document->document_type == 'ترخيص الجمعية' ? 'selected' :  ''}}>ترخيص الجمعية</option>
                         <option value="اللائحة الأساسية" {{ $document->document_type == 'اللائحة الأساسية' ? 'selected' :  ''}}>اللائحة الأساسية</option>
                         <option value="اللوائح والسياسات" {{ $document->document_type == 'اللوائح والسياسات' ? 'selected' :  ''}}>اللوائح والسياسات</option>
                         <option value="نتيجة الحوكمة"  {{ $document->document_type == 'نتيجة الحوكمة' ? 'selected' :  ''}}>نتيجة الحوكمة</option>
                         <option value="محاضر اجتماعات مجلس الإدارة" {{ $document->document_type == 'محاضر اجتماعات مجلس الإدارة' ? 'selected' :  ''}}>محاضر اجتماعات مجلس الإدارة</option>
                         <option value="محاضر اجتماعات الجمعية العمومية" {{ $document->document_type == 'محاضر اجتماعات الجمعية العمومية' ? 'selected' :  ''}}>محاضر اجتماعات الجمعية العمومية</option>
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


