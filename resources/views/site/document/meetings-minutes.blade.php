@extends('layouts.site')



@section('content')
<div style="padding-top: 170px;">
    <div class="container">
        <h1 class="fs-2 orange text-start mb-5">{{ __('محاضر الاجتماعات') }}</h1>
        <div class="row d-flex justify-content-center">

            <div class="col-md-6 col-lg-6 col-xxl-6 mb-4 d-flex justify-content-center">
                <div class="card shadow" style="width: 18rem; border: 0; border-radius: 10px;">
                    <img src="{{ asset('site/imgs/torath-icon.png') }}" class="card-img-top p-4" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" alt="...">
                    <div class="card-body">
                      <h1 class="fs-4 text-center">{{ __('مجلس الإدارة') }}</h1>
                      <div class="text-center mt-4">
                        <a href="{{ route('site.board.meeting.minutes') }}"><button type="button" class="btn btn-2 text-white">{{ __('عرض') }}</button></a>
                      </div>
                    </div>
                  </div>
              </div>

              <div class="col-md-6 col-lg-6 col-xxl-6 mb-4 d-flex justify-content-center">
                <div class="card shadow" style="width: 18rem; border: 0; border-radius: 10px;">
                    <img src="{{ asset('site/imgs/torath-icon.png') }}" class="card-img-top p-4" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" alt="...">
                    <div class="card-body">
                      <h1 class="fs-4 text-center">{{ __('الجمعية العمومية') }}</h1>
                      <div class="text-center mt-4">
                        <a href="{{ route('site.general.association.meetings') }}"><button type="button" class="btn btn-2 text-white">{{ __('عرض') }}</button></a>
                      </div>
                    </div>
                  </div>
              </div>

        </div>

    </div>
</div>
@endsection