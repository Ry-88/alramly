@extends('layouts.site')
@section('content')
<div style="padding-top: 170px;">
   <div class="container text-center">
      <h1 class="fs-2 orange text-start mb-3">{{ $report->title }}</h1>
      <div class="bg-orange px-3 pt-1 mb-4" style="border-radius: 10px;">
         <div class="row">
            <div class="col-6">
               <p class="mb-0 text-start">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($report->created_at))->diffForHumans() }}</p>
            </div>
            <div class="col-6">
               <p class="text-end mb-0">
                  <a href="#" class="text-black" target="_blank"><i class="fab fa-facebook-f mx-2" aria-hidden="true"></i></a>
                  <a href="#" class="text-black" target="_blank"><i class="fab fa-youtube mx-2" aria-hidden="true"></i></a>
                  <a href="#" class="text-black" target="_blank"><i class="fab fa-twitter mx-2" aria-hidden="true"></i></a>
                  <a href="#" class="text-black" target="_blank"><i class="fab fa-instagram ms-2" aria-hidden="true"></i></a>
               </p>
            </div>
         </div>
      </div>
      {{-- <div class="owl-two owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
         <div class="owl-stage-outer">
            <div class="owl-stage" style="transform: translate3d(951px, 0px, 0px); transition: all 0.5s ease 0s; width: 2377px;">
              
               
              
               <div class="owl-item active" style="width: 345.333px; margin-left: 130px;">
                  <div class="item">
                     <img src="{{ asset($report->image->path) }}" alt="">
                  </div>
               </div>
            </div>
         </div>
         <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>

      </div> --}}
      <img src="{{ asset('/'.$report->image->path) }}" alt="" width="500" class="img-fluid mt-4">
      <h5 class="mt-4">
          {!! $report->content !!}
      </h5>
   </div>
</div>
@endsection