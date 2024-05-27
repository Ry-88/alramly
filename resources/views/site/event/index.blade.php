@extends('layouts.site')


@section('content')

<div style="padding-top:170px">
    <div class="container">
        <h1 class="fs-2 orange text-start mb-5">{{ __('الفعاليات الثقافية') }}</h1>
            <div class="row d-flex justify-content-center">
                
             
               @foreach ($events as $event) 
                  
               {{-- <div class="col-md-6 col-lg-4 col-xxl-3 mb-4 d-flex justify-content-center">
                   <div class="card shadow item" style="width: 18rem; border: 0; border-radius: 20px;">
                       <div class="card-body">
                           <h1 class="card-title text-center me-1 fs-3">{{ $event->time }}</h1>
                         <h6 class="card-subtitle text-center text-muted fw-bold">{{ $event->title }}</h6>
                         <p class="text-center mt-3 mb-0 text-muted" style="font-size: 13px;">ستقام بتاريخ <span>{{ $event->date }}</span></p>
                       </div>
                   </div>
               </div> --}}
               <div class="col-md-6 col-lg-4 col-xxl-3 mb-5 d-flex justify-content-center d-flex justify-content-center">
                <div class="card shadow item" style="width: 18rem; border: 0; border-radius: 20px;">
                    <img src="{{ asset('events/'.$event->images->first()->path) }}" class="card-img-top" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <div class="card-body">
                        <h1 class="card-title text-center me-1 fs-3">{{ $event->time }}</h1>
                        <h6 class="card-subtitle text-center text-muted fw-bold">{{ $event->title }}</h6>
                      <p class="text-center mt-3 mb-0 text-muted" style="font-size: 13px;">{{ __('ستقام بتاريخ') }} <span>{{ $event->date }}</span></p>
                      <div class="text-center">
                        <a href="{{ route('site.event.show',$event->slug) }}"><button style="background: yellowgreen;"  type="button" class="btn btn-3 text-white mt-4">{{ __('عرض') }}</button></a>
                      </div>
                    </div>
                </div>
            </div>
               @endforeach
               <x-paginator :paginator="$events" />
            </div>
        </div>
</div>
@endsection