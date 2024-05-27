@extends('layouts.site')


@section('content')

<div style="padding-top: 170px;">
    <div class="container">
        <h1 class="fs-2 orange text-start mb-5">{{ __('جميع الاخبار') }}</h1>

        <div class="row text-center d-flex justify-content-center">
            @foreach ($news as $report)
    

            <div class="col-md-6 col-lg-4 col-xxl-3 mb-4 d-flex justify-content-center">
                <div class="card text-white" style="border: 0; border-radius: 25px; width: 300px; height: 419px;">
                    <div class="img-grad-2">
                        <img src="{{ asset('/'.$report->image->path) }}" class="card-img" alt="..." style="border-radius: 10px !important;"> 
                    </div>
                    <div class="card-img-overlay">
                    <h1 class="card-title fs-5 mt-5">{{ $report->title }}</h1>
                    
                    <p class="card-text text-start mt-5" style="position: absolute;">{!! \Illuminate\Support\Str::limit($report->content, 100) !!}</p>
                    <a href="{{ route('site.news.show',$report->id) }}"><button type="button" class="btn btn-arrow text-light"><img src="{{ asset('site/imgs/arrow.png') }}" alt="" width="20"></button></a>
                    </div>
                </div> 
            </div>
            
            @endforeach
       
            <x-paginator :paginator="$news" />




        </div>
    </div>
</div>

@endsection