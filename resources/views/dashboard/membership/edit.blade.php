@extends('layouts.admin')
@section('title')
العضوية
@endsection
@section('content')

<div class="container" style="margin-top:20px">
    
    <div class="row">
        <div class="col-6">
            <h3 style="margin-bottom: 5rem;">العضوية|تعديل البيانات</h3>
        </div>
        <div class="col-6">
            {{-- <a href="#" class="btn btn-outline-success waves-effect">رجوع</a> --}}
        </div>
    </div>
     
       <form class="form form-vertical" action="{{ route('memberships.update',$membership->id) }}" method="POST" enctype="multipart/form-data">
           @csrf
           @method('PUT')
           <div class="row">
               <div class="col-8">
                   <div class="form-group">
                       <label for="first-name-vertical">أسم العضو بالعربي</label>
                       <input type="text" id="first-name-vertical" class="form-control" name="full_name_ar" value="{{ $membership->getTranslations('full_name')['ar'] }}" />
                       @error('full_name_ar') 
                       <span id="basic-default-name-error" class="error">
                           {{ $message }}
                       </span>
                       @enderror
                   </div>
               </div>

               

               <div class="col-8">
                <div class="form-group">
                    <label for="first-name-vertical">أسم العضو بالانجليزي</label>
                    <input type="text" id="first-name-vertical" class="form-control" name="full_name_en" value="{{ $membership->getTranslations('full_name')['en'] }}" />
                    @error('full_name_en') 
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
              </div>

              <div class="col-8">
                <div class="form-group">
                    <label for="first-name-vertical">نوع العضوية</label>
                    <select type="text" id="first-name-vertical" class="form-control" name="membership_type">
                        <option value="منتسب" {{ $membership->membership_type == 'منتسب' ? 'selected' : ''}}>منتسب </option>
                        <option value="عامل" {{ $membership->membership_type == 'عامل' ? 'selected' : ''}} > عامل</option>
                        <option value="شرفي" {{ $membership->membership_type == 'شرفي' ? 'selected' : ''}}> شرفي</option> 
                    </select>
                    @error('membership_type') 
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            

               <div class="col-8">
                <div class="form-group">
                    <label for="first-name-vertical">البريد الالكتروني</label>
                    <input type="email" id="first-name-vertical" class="form-control" name="email" value="{{ $membership->email }}">
                    @error('email') 
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-8">
                <div class="form-group">
                    <label for="first-name-vertical">تجديد تاريخ الاشتراك</label>
                    <input type="date" id="first-name-vertical" class="form-control" name="expirted_at" value="{{ $membership->expirted_at }}">
                    @error('expirted_at') 
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-8">
                <div class="form-group">
                    <label for="first-name-vertical">رقم الجوال</label>
                    <input type="text" id="first-name-vertical" class="form-control" name="phone" value="{{ $membership->phone }}">
                    @error('phone') 
                    <span id="basic-default-name-error" class="error">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-8">
                <div class="form-group">
                    <label for="first-name-vertical">المهنة</label>
                    <input type="text" id="first-name-vertical" class="form-control" name="job" value="{{ $membership->job }}">
                    @error('job') 
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
                    style="cursor: pointer; color: blue; padding:10px 20px; border:1px solid #D8D6DE; background-color:#fff">تعديل الصورة</label></p>
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
              
               <div class="col-12 mt-2">
                   <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">حفظ</button>
               </div>
           </div>
       </form>
   </div>



   

@endsection


@section('scripts')
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/vue-multiselect@2.1.0"></script>

    <script>
        var app = new Vue({
            el: '#app',
            components: {
                Multiselect: window.VueMultiselect.default
            },
            data() {
                return {
                    city: '',

                }
            }
        })

        $("#georgian").click(() => {

            $("select[name='day']").empty()
            $("select[name='day']").append(`<option selected="">{{ __('اليوم') }}</option>`)
            for (let index = 31; index > 0; index--) {
                $("select[name='day']").append(`<option>${index}</option>`)
            }

            $("select[name='month']").empty()
            $("select[name='month']").append(`<option selected="">{{ __('الشهر') }}</option>`)
            for (let index = 12; index > 0; index--) {
                $("select[name='month']").append(`<option>${index}</option>`)
            }

            $("select[name='year']").empty()
            $("select[name='year']").append(`<option selected="">{{ __('السنة') }}</option>`)
            for (let index = 2004; index > 1949; index--) {
                $("select[name='year']").append(`<option>${index}</option>`)
            }

            $("select").attr("disabled", false)
        })

        $("#hijri").click(() => {

            $("select[name='day']").empty()
            $("select[name='day']").append(`<option selected="">{{ __('اليوم') }}</option>`)
            for (let index = 30; index > 0; index--) {
                $("select[name='day']").append(`<option>${index}</option>`)
            }

            $("select[name='month']").empty()
            $("select[name='month']").append(`<option selected="">{{ __('الشهر') }}</option>`)
            for (let index = 12; index > 0; index--) {
                $("select[name='month']").append(`<option>${index}</option>`)
            }

            $("select[name='year']").empty()
            $("select[name='year']").append(`<option selected="">{{ __('السنة') }}</option>`)
            for (let index = 1425; index > 1342; index--) {
                $("select[name='year']").append(`<option>${index}</option>`)
            }

            $("select").attr("disabled", false)
        })
    </script>
@endsection