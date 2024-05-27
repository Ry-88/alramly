

@extends('layouts.site')



@section('content')
<div style="padding-top: 170px;">
    <div class="container">
        <h1 class="fs-2 orange text-start mb-5">{{ __('محاضر اجتماعات الجمعية العمومية') }}</h1>
        <div class="row d-flex justify-content-center">

            {{-- @foreach($documents as $document)
            <div class="col-sm-4 col-md-3 col-lg-3 col-xxl-2 mb-4 d-flex justify-content-center">
                <div class="card shadow p-3" style="border: 0; border-radius: 10px;">
                  <img src="{{ asset('site/imgs/pdf.png') }}" alt="" width="150">
                  <h1 class="fs-6 text-center mt-4">{{ $document->name }}</h1>
                  <div class="text-center">
                    <a target="_blank" href="{{ route('site.document.pdf',$document->id) }}"   class="btn btn-3 text-white mt-2" style="width: 40px; background:#DCA425"><i  class="fa fa-eye" aria-hidden="true"></i></a>
                  </div>
                  </div>
            </div>
            @endforeach
            <x-paginator :paginator="$documents" /> --}}


                <div class="col-md-6 col-lg-6 col-xxl-6 mb-4 d-flex justify-content-center">
                    <div class="card shadow" style="width: 18rem; border: 0; border-radius: 10px;">
                        <img src="{{ asset('site/imgs/torath-icon.png') }}" class="card-img-top p-4" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" alt="...">
                        <div class="card-body">
                          <h1 class="fs-4 text-center">{{ __('اجتماعات الجمعية العمومية العادية') }}</h1>
                          <div class="text-center mt-4">
                            <a href="{{ route('site.minutes.normal.meetings') }}"><button type="button" class="btn btn-2 text-white">{{ __('عرض') }}</button></a>
                          </div>
                        </div>
                      </div>
                  </div>
    
                  <div class="col-md-6 col-lg-6 col-xxl-6 mb-4 d-flex justify-content-center">
                    <div class="card shadow" style="width: 18rem; border: 0; border-radius: 10px;">
                        <img src="{{ asset('site/imgs/torath-icon.png') }}" class="card-img-top p-4" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" alt="...">
                        <div class="card-body">
                          <h1 class="fs-4 text-center">{{ __('اجتماعات الجمعية العمومية الغير عادية') }}</h1>
                          <div class="text-center mt-4">
                            <a href="{{ route('site.minutes.uNnormal.meetings') }}"><button type="button" class="btn btn-2 text-white">{{ __('عرض') }}</button></a>
                          </div>
                        </div>
                      </div>
                  </div>
    
        </div>

    </div>
</div>
@endsection