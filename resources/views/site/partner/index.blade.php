@extends('layouts.site')


@section('content')

<div class="new-content">
    <div class="container">
        <h1 class="fs-2 orange text-start mb-5">{{ __('شركائنا') }}</h1>
        <div class="row d-flex justify-content-center">
            @foreach ($partners as $partner)
            <div class="col-md-6 col-lg-4 col-xxl-3 mb-4 d-flex justify-content-center">
                <div class="card shadow text-center" style="width: 20rem; border: 0; border-radius: 10px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <img src="{{ asset($partner->image->path) }}" alt="" width="150" class="img-responsive">
                            </div>
                            <div class="col-12 mt-3">
                                <p class="mb-0">
                                    <a href="{{ $partner->url }}" class="fs-2 orange">{{ $partner->name }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
            @endforeach
          
          
       
        </div>

    </div>
</div>

@endsection