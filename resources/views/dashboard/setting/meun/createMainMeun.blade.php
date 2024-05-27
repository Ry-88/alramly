@extends('layouts.admin')
@section('title')
 أعدادات القوائم
@endsection
@section('content')
    <div class="container" style="margin-top:20px">
     <h3 style="margin-bottom: 5rem;">أضافة عنصر للقائمة </h3>
        <form class="form form-vertical" action="{{ route('meuns.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-8">
                    <div class="form-group">
                        <label for="first-name-vertical"> أسم العنصر   </label>
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
                        <label for="first-name-vertical"> أسم الراوت   </label>
                        <input type="text" id="first-name-vertical" class="form-control" name="route_name">
                        @error('route_name') 
                        <span id="basic-default-name-error" class="error">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-8">
                    <div class="form-group">
                        <label for="email-id-vertical">الرابط</label>
                        <input type="text" id="first-name-vertical" class="form-control" name="endpoint">
                        @error('endpoint') 
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