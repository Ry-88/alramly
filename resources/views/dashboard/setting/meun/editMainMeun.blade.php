@extends('layouts.admin')
@section('title')
 أعدادات القوائم
@endsection
@section('content')
    <div class="container" style="margin-top:20px">
     <h3 style="margin-bottom: 5rem;">تعديل عنصر للقائمة </h3>
        <form class="form form-vertical" action="{{ route('meuns.update',$mainMenu->id) }}" method="POST">
            @csrf 
            @method('PUT')
            <div class="row">
                <div class="col-8">
                    <div class="form-group">
                        <label for="first-name-vertical"> أسم العنصر   </label>
                        <input type="text" id="first-name-vertical" class="form-control" name="name" value="{{ $mainMenu->name }}">
                        @error('name') 
                        <span id="basic-default-name-error" class="error">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-8">
                    <div class="form-group">
                        <label for="email-id-vertical">الرابط</label>
                        <input type="text" id="first-name-vertical" class="form-control" name="endpoint" value="{{ $mainMenu->endpoint }}">
                        @error('endpoint') 
                        <span id="basic-default-name-error" class="error">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
               
                <div class="col-12">
                    <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">تعديل</button>
                </div>
            </div>
        </form>
    </div>
@endsection