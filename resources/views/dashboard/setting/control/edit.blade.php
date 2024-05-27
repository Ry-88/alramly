@extends('layouts.admin')
@section('title')
الاعدادات العامه
@endsection
@section('content')
    <div class="container" style="margin-top:20px">
     <h3 style="margin-bottom: 5rem;">التحكم العام</h3>
        <form class="form form-vertical" action="{{ route('controls.update',$control->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-8">
                    <div class="form-group">
                        <label for="first-name-vertical"> أسم القسم </label>
                        <input type="text" id="first-name-vertical" class="form-control" name="section_name" value="{{ $control->section_name }}">
                        @error('section_name') 
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