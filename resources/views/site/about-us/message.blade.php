@extends('layouts.site')


@section('content')

<div style="padding-top: 170px;">

    <div class="container">
        <h1 class="fs-2 orange text-start mb-5">{{ __('الرسالة') }}</h1>

        
      
        
        <h1 class="hr fs-3">{{ $message?->title }}</h1>
        <p class="fs-5 mt-3">
            {!! $message?->description !!}
        </p>
    

    </div>
 
</div>

@endsection