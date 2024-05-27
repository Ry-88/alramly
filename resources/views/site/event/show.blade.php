@extends('layouts.site')

@section('content')
<div style="padding-top: 170px;">
    <div class="container text-center">
        <img src="{{ asset('events/'.$event->images->first()->path) }}" alt="" width="500" class="img-fluid">
        <h1 class="fs-2 orange text-center mb-2 mt-5">{{ $event->title }}</h1>
        <div class="card shadow mt-4" style="border: 0; border-radius: 10px;">
            <div class="card-body">
                <p class="fs-5 mt-4"><i class="fas fa-clock orange fa-xl me-2" aria-hidden="true"></i>{{ $event->time }}<span class="ms-5"><i class="fas fa-calendar-alt orange fa-xl me-2" aria-hidden="true"></i>{{ $event->date }}</span></p>
                    <h5 class="mt-3">
                        {!! $event->description !!}
                    </h5>
            </div>
        </div>
        
            
    </div>
</div>
@endsection