@extends('layouts.admin')
@section('title')
شرائح الصور
@endsection

@section('content')

<div class="container" style="margin-top:20px">
   
    <div class="row">
        <div class="col-6">
            <h3 style="margin-bottom: 5rem;">تعديل البيانات</h3>
        </div>
        <div class="col-6">
            <a href="{{ route('sliders.index') }}" class="btn btn-outline-success waves-effect">رجوع</a>
        </div>
    </div>
       <form class="form form-vertical" action="{{ route('sliders.dashboard.update',$slider->id) }}" method="POST" enctype="multipart/form-data">
           @csrf
              @method('PUT')
           <div class="row">
               <div class="col-8">
                   <div class="form-group">
                       <label for="first-name-vertical"> أسم الاسلايدر بالعربي   </label>
                       <input type="text" id="first-name-vertical" class="form-control" name="name" value="{{ $slider->getTranslations('name')['ar'] }}">
                       @error('name') 
                       <span id="basic-default-name-error" class="error">
                           {{ $message }}
                       </span>
                       @enderror
                   </div>
               </div>

               <div class="col-8">
                <div class="form-group">
                    <label for="first-name-vertical"> أسم الاسلايدر بالانجليزي   </label>
                    <input type="text" id="first-name-vertical" class="form-control" name="name_en" value="{{ $slider->getTranslations('name')['en'] }}">
                    @error('name_en') 
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

               <div class="col-8" id="img-app">
                <div class="form-group">
                    <label for="email-id-vertical">الصور</label>
                    <input accept="image/*" type="file" ref="files" @change="imageChange" id="email-id-vertical"  id="first-name-vertical" class="form-control" name="image" multiple>
                    @error('image') 
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
       {{-- <div class="row mt-8">
              <div class="col-12">
                <div class="card">
                     <div class="card-header">
                          <h4 class="card-title">الصور</h4>
                     </div>
                     <div class="card-body">
                          <div class="row">
                           
                            <div class="col-md-3">
                                 <img src="{{ asset('sliders/'.$slider->image->path) }}" alt="" style="width:100%;border-radius: 5px; margin-top:10px; margin-bottom:10px; height:290px; object-fit: cover">
                            </div>
                      
                          </div>
                     </div>
                </div>
              </div>
       </div> --}}
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