@extends('layouts.site')

@section('content')

<div style="padding-top: 170px;">
    <div class="container">
        <h1 class="fs-2 orange text-start mb-5">{{ __('معرض الصور والفيديوهات') }}</h1>
        <ul class="nav nav-pills mb-3 d-flex justify-content-center mb-5" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">{{ __('الصور') }}</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">{{ __('الفيديوهات') }}</button>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
              <!-- images -->
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row d-flex justify-content-center">
                    
                    
                   
                    @foreach ($photos as $photo) 
                        
                    <div class="col-md-6 col-lg-4 col-xxl-4 mb-4 d-flex justify-content-center">
                        <div class="card" style="width: 450px; border: 0;">
                            <img src="{{ asset($photo->source) }}" class="shadow" alt="" style="border-radius: 10px; height:300px; object-fit:cover">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- videos -->
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row d-flex justify-content-center">
                    @foreach ($videos as $video)
                    <div class="col-md-6 col-lg-4 col-xxl-4 mb-4 d-flex justify-content-center">
                        {{-- <iframe class="shadow" style="border-radius: 10px;" width="450" height="250" src="https://www.youtube.com/watch?v={{ $video->source }}"></iframe>                                 --}}
                        <iframe class="shadow" style="border-radius: 10px;" width="450" height="250" width="420" height="315" src="https://www.youtube.com/embed/{{ $video->source }}"></iframe>
                        </iframe>
                    </div>
                   @endforeach
                   
                    
                </div>
            </div>

          </div>
    </div>






@endsection