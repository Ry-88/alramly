
@if(\App\Models\Control::find(2)->status == 'مفعل')
<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach ($sliders as $key => $slider)
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="active" aria-current="true" aria-label="Slide {{ $key }}"></button>
        {{-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> --}}
        @endforeach
    </div>
    <div class="carousel-inner">

        {{-- @foreach ($sliders as $key => $slider) --}}
        <div class="carousel-item active" style="object-fit: cover !important;">
            <div class="d-block vh-100 w-100 carousel-gradient" style="background: url('{{asset('site/imgs/slide-1.png')}}'); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
            <div class="carousel-caption">
                <h1 class="fs-3 two-caption-1" data-aos="fade-in" data-aos-duration="500"  data-aos-delay="500">{{ __('تــاريــخ مــجــيــد وحــضــارة غـــنــيــة') }}</h1>
                <h1 class="fs-3 two-caption-2" data-aos="fade-in" data-aos-duration="500"  data-aos-delay="500">{{ __('مرتبطة بالعمق التاريخي للمنطقة') }}</h1>
            </div>
        </div>
        <div class="carousel-item" style="object-fit: cover !important;">
            <div class="d-block vh-100 w-100 carousel-gradient" style="background: url('{{asset('site/imgs/slide-2.png')}}'); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
            <div class="carousel-caption">
                <h1 class="fs-3 two-caption-1" data-aos="fade-in" data-aos-duration="500"  data-aos-delay="500">{{ __('حضارة غنية ضاربة بجذورها في عمق التاريخ') }}</h1>
                <h1 class="fs-3 two-caption-2" data-aos="fade-in" data-aos-duration="500"  data-aos-delay="500">{{ __('تستمد طاقتها من قلب الحدث النابض بالنشاط') }}</h1>
            </div>
        </div>
        <div class="carousel-item" style="object-fit: cover !important;">
            <div class="d-block vh-100 w-100 carousel-gradient" style="background: url('{{asset('site/imgs/slide-3.png')}}'); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
            <div class="carousel-caption">
                <h1 class="fs-3 three-caption-1" data-aos="fade-in" data-aos-duration="500"  data-aos-delay="500">{{ __('عناصر متنوعة في انسجام مطلق') }}</h1>
                <h1 class="fs-3 three-caption-2" data-aos="fade-in" data-aos-duration="500"  data-aos-delay="500">{{ __('وتناغم كامل لمهمة وطنية خلاقة') }}</h1>
                <h1 class="fs-3 three-caption-3" data-aos="fade-in" data-aos-duration="500"  data-aos-delay="500">{{ __('تحقق أهدافا اجتماعية واقتصادية') }}</h1>
            </div>
        </div>
       {{-- @endforeach --}}
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">السابق</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">التالي</span>
</button>
</div>
@endif