@extends('layouts.admin')

@section('title')
    رد
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>مقدم الطلب  {{ $membership->full_name }}</h3>
                            <a href="{{ route('memberships.index') }}" class="btn btn-outline-success waves-effect">رجوع</a>
                    </div>
                    <div class="card-body">
                        <form  method="post" action="{{route('membership.send.reply',$membership->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">البريد الالكتروني</label>
                                <input type="email" class="form-control" value="{{ $membership->email }}" name="email">
                                @error('email')
                                <span>{{ $message }}</span>>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">سبب الرفض</label>
                                <textarea name="reason_refuse" id="editor" cols="30" rows="10" class="form-control"></textarea>
                                @error('reason_refuse')
                                <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">أرسال</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection