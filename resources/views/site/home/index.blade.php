@extends('layouts.site')


@section('content')

  <!-- Slider -->
  @include('site.partials.__slider')
  <!-- end Slider -->

<img src="{{ asset('site/imgs/Group.png') }}" alt="" class="after-slider">

{{-- Vision Gools --}}
@include('site.partials.__vision')

{{-- end Vision Gools --}}

{{-- events --}}
@include('site.partials.__events')
{{-- end events --}}  

{{-- news --}}
   @include('site.partials.__news')
{{-- end news --}}
{{-- <img src="{{ asset('site/imgs/Group-2.png') }}" class="hidden" alt="" style="bottom: -2965px; left: 0; position: absolute; background-color: white;"> --}}

  {{-- projects --}}
  @include('site.partials.__projects')
  {{-- end projects --}}
  


  {{-- partners --}}

  @include('site.partials.__partners')

  {{-- end partners --}}

  


    

@endsection