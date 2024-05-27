@extends('layouts.admin')

@section('title')
الفعاليات
@endsection
@section('content')

<div class="container" style="margin-top:20px">
    <div class="row">
        <div class="col-6">
            <h3 style="margin-bottom: 5rem;"> تعديل البيانات </h3>
        </div>
        <div class="col-6">
            <a href="{{ route('events.index') }}" class="btn btn-outline-success waves-effect">رجوع</a>
        </div>
    </div>
       <form class="form form-vertical" action="{{ route('events.update',$event->id) }}" method="POST" enctype="multipart/form-data">
           @csrf
              @method('PUT')
           <div class="row">
               <div class="col-8">
                   <div class="form-group">
                       <label for="first-name-vertical">عنوان الفعالية</label>
                       <input type="text" id="first-name-vertical" class="form-control" name="title" value="{{ $event->getTranslations('title')['ar'] }}" placeholder=""
                       @error('title') 
                       <span id="basic-default-name-error" class="error">
                           {{ $message }}
                       </span>
                       @enderror
                   </div>
               </div>

               <div class="col-8">
                <div class="form-group">
                    <label for="first-name-vertical">عنوان الفعالية بالانجليزية</label>
                    <input type="text" id="first-name-vertical" class="form-control" name="title_en" value="{{ $event->getTranslations('title')['en'] }}">
                    @error('title_en') 
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

               <div class="col-8">
                <div class="form-group">
                    <label for="email-id-vertical">الوصف</label>
                       <textarea id="editor"  class="form-control" name="description" id="email-id-vertical" rows="3">
                         
                         {{ $event->getTranslations('description')['ar'] }}
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
                    <label for="email-id-vertical">الوصف بالانجليزيه</label>
                       <textarea id="editorEn"  class="form-control" name="description_en" id="email-id-vertical" rows="3">
                        {{ $event->getTranslations('description')['en'] }}
                       </textarea>
                    @error('description_en') 
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
              </div>
             

               <div class="col-8">
                <div class="form-group">
                    <label for="email-id-vertical">تاريخ الفعالية</label>
                    <input type="date" id="first-name-vertical" class="form-control" name="date" value="{{ $event->date }}">
                    @error('date') 
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            

            <div class="col-8">
                <div class="form-group">
                    <label for="email-id-vertical">وقت الفعالية </label>
                    <input type="time" id="first-name-vertical" class="form-control" name="time" value="{{ $event->time }}">
                    @error('date') 
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <<div class="col-8" id="img-app">
                <div class="form-group">
                    <label for="email-id-vertical">صور الفعالية</label>
                    <input accept="image/*" style="color: blue; padding:10px 20px; border:1px solid #D8D6DE; background-color:#fff" type="file" ref="files" @change="imageChange" name="images[]" multiple>
                    @error('images') 
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="row"> 
               
                        <div class="col-sm-3 " v-for="(image,index) in images" :key="image">
                       
                        <p style="position: relative"> <img :src="image" alt="..." class="img-fluid mt-1 mb-1" style="width:100%;border-radius: 5px; margin-top:10px; margin-bottom:10px; height:290px; object-fit: cover">
                            <i @click="romoveImage(index)" style="position: absolute; display:block;
                            top: 10px;
                            right: 10px; width: 30px; height: 30px; border-radius: 50%; line-height:30px !important;cursor: pointer; text-align:center; font-size:20px !important;color:white; background-color:#f00" class="fa fa-trash"></i></p>
                        </div>
                   
              </div>

        </div>
              
               <div class="col-12">
                   <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">تعديل</button>
               </div>
           </div>
       </form>
   </div>

@endsection


@section('scripts')
<script>
    new Vue({
    el: '#img-app',
    data:{
        images:[]
    },
    methods:{
        imageChange(){
            for(let i=0; i<this.$refs.files.files.length; i++){
                this.images.push(URL.createObjectURL(this.$refs.files.files[i]))
        }
    },

    romoveImage(index){
        this.images.splice(index,1)
    }
    }
   
    })
</script>
@endsection