

@if(\App\Models\Control::find(3)->status == 'مفعل')
<center> 
  
    <!-- Events -->
    <div id="Events">
        <div class="container">
            <div class="row py-4"> 
                <div class="col-8 col-sm-6">
                <h1 class="fs-2 orange text-start">{{ __('الفعاليات الثقافية') }}</h1>
                </div>
                <div class="col-4 col-sm-6">
                    <a href="{{ route('site.event.index') }}"><p class="green text-end">{{ __('المزيد') }}<i class="fas fa-caret-left ms-3"></i></p></a>
                </div>
            </div>
        </div> 
        <div class="section-1">
            <h1 id="dateEvent" style="display: none">{{ $event?->date }}</h1>
            <h1 id="TimeEvent" style="display: none">{{ $event?->time }}</h1>
            <div class="container">
                <h1 class="text-light fs-2 pb-5" data-aos="fade-up">{{ $event?->title }}</h1>>
                <div class="countdown-container text-light">
                    @if($event)
                    <div class="countdown-el days-c mx-5 mb-4">
                        <h1 class="big-text" id="days" data-aos="zoom-in" data-aos-duration="500"  data-aos-delay="300"></h1>
                        <h1 class="fs-5">{{ __('اليوم') }}</h1>
                    </div>
                    <h1 class="mt-3 d-none d-lg-block" style="font-size: 70px;">:</h1>
                    <div class="countdown-el hours-c mx-5 mb-4"> 
                        <h1 class="big-text" id="hours" data-aos="zoom-in" data-aos-duration="500"  data-aos-delay="500"></h1>
                        <h1 class="fs-5">{{ __('ساعة') }}</h1>
                    </div>
                    <h1 class="mt-3 d-none d-lg-block" style="font-size: 70px;">:</h1>
                    
                    <div class="countdown-el mins-c mx-5">
                        <h1 class="big-text" id="mins" data-aos="zoom-in" data-aos-duration="500"  data-aos-delay="700"></h1>
                        <h1 class="fs-5">{{ __('دقيقة') }}</h1>
                    </div>
                    @endif
                </div>
                
                    </div>
                </div>
            </div>
</center>

@endif
