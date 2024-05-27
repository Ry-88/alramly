

@extends('layouts.site')



@section('content')
<div style="padding-top: 170px;">
    <div class="container">
        <h1 class="fs-2 orange text-start mb-5">{{ __('الحوكمة والشفافية') }}</h1>
        <div class="row d-flex justify-content-center">

            <div class="col-md-6 col-lg-4 col-xxl-3 mb-4 d-flex justify-content-center">
                <div class="card shadow" style="width: 18rem; border: 0; border-radius: 10px;">
                    <img src="{{ asset('site/imgs/torath-icon.png') }}" class="card-img-top p-4" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" alt="...">
                    <div class="card-body">
                      <h1 class="fs-4 text-center">{{ __('القرار الوزاري') }}</h1>
                      <div class="text-center mt-4">
                        <a href="{{ route('site.ministerial.decision') }}"><button type="button" class="btn btn-2 text-white">{{ __('عرض') }}</button></a>
                      </div>
                    </div>
                  </div>
              </div>

              <div class="col-md-6 col-lg-4 col-xxl-3 mb-4 d-flex justify-content-center">
                <div class="card shadow" style="width: 18rem; border: 0; border-radius: 10px;">
                    <img src="{{ asset('site/imgs/torath-icon.png') }}" class="card-img-top p-4" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" alt="...">
                    <div class="card-body">
                      <h1 class="fs-4 text-center">{{ __('قرار تشكيل مجلس الإدارة') }}</h1>
                      <div class="text-center mt-4">
                        <a href="{{ route('site.decision.board.directors') }}"><button type="button" class="btn btn-2 text-white">{{ __('عرض') }}</button></a>
                      </div>
                    </div>
                  </div>
              </div>

              <div class="col-md-6 col-lg-4 col-xxl-3 mb-4 d-flex justify-content-center">
                <div class="card shadow" style="width: 18rem; border: 0; border-radius: 10px;">
                    <img src="{{ asset('site/imgs/torath-icon.png') }}" class="card-img-top p-4" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" alt="...">
                    <div class="card-body">
                      <h1 class="fs-4 text-center">{{ __('ترخيص الجمعية') }}</h1>
                      <div class="text-center mt-4">
                        <a href="{{ route('site.association.license') }}"><button type="button" class="btn btn-2 text-white">{{ __('عرض') }}</button></a>
                      </div>
                    </div>
                  </div>
              </div>

              <div class="col-md-6 col-lg-4 col-xxl-3 mb-4 d-flex justify-content-center">
                <div class="card shadow" style="width: 18rem; border: 0; border-radius: 10px;">
                    <img src="{{ asset('site/imgs/torath-icon.png') }}" class="card-img-top p-4" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" alt="...">
                    <div class="card-body">
                      <h1 class="fs-4 text-center">{{ __('اللائحة الأساسية') }}</h1>
                      <div class="text-center mt-4">
                        <a href="{{ route('site.basic.regulation') }}"><button type="button" class="btn btn-2 text-white">{{ __('عرض') }}</button></a>
                      </div>
                    </div>
                  </div>
              </div>

              <div class="col-md-6 col-lg-4 col-xxl-3 mb-4 d-flex justify-content-center">
                <div class="card shadow" style="width: 18rem; border: 0; border-radius: 10px;">
                    <img src="{{ asset('site/imgs/torath-icon.png') }}" class="card-img-top p-4" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" alt="...">
                    <div class="card-body">
                      <h1 class="fs-4 text-center">{{ __('اللوائح والسياسات') }}</h1>
                      <div class="text-center mt-4">
                        <a href="{{ route('site.regulations.policies') }}"><button type="button" class="btn btn-2 text-white">{{ __('عرض') }}</button></a>
                      </div>
                    </div>
                  </div>
              </div>

              <div class="col-md-6 col-lg-4 col-xxl-3 mb-4 d-flex justify-content-center">
                <div class="card shadow" style="width: 18rem; border: 0; border-radius: 10px;">
                    <img src="{{ asset('site/imgs/torath-icon.png') }}" class="card-img-top p-4" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" alt="...">
                    <div class="card-body">
                      <h1 class="fs-4 text-center">{{ __('التقارير') }}</h1>
                      <div class="text-center mt-4">
                        <a href="{{ route('site.document.reports') }}"><button type="button" class="btn btn-2 text-white">{{ __('عرض') }}</button></a>
                      </div>
                    </div>
                  </div>
              </div>

              <div class="col-md-6 col-lg-4 col-xxl-3 mb-4 d-flex justify-content-center">
                <div class="card shadow" style="width: 18rem; border: 0; border-radius: 10px;">
                    <img src="{{ asset('site/imgs/torath-icon.png') }}" class="card-img-top p-4" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" alt="...">
                    <div class="card-body">
                      <h1 class="fs-4 text-center">{{ __('نتيجة الحوكمة') }}</h1>
                      <div class="text-center mt-4">
                        <a href="{{ route('site.governance.result') }}"><button type="button" class="btn btn-2 text-white">{{ __('عرض') }}</button></a>
                      </div>
                    </div>
                  </div>
              </div>

          </div>

    </div>
</div>
@endsection