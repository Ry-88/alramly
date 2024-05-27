<center>
    <!-- Message, Vision, Goals -->
    <div id="About"> 
            <div class="container">
                <div class="row">
    
                    {{-- <div class="col-md-6 col-xl-4 " data-aos="fade-up" data-aos-duration="800"  data-aos-delay="300" style="z-index: 2">
                        <div class="card card-1 py-4 px-3" style="width: 21rem;">
                            <div class="card-body text-center">
                                <img src="{{ asset('site/imgs/lamp.png') }}" alt="..." class="mb-4" width="70px">
                                <h1 class="dark-brown fs-4">الرؤية</h1>
                                 <h6 class="brown mt-4 pb-2 card-animation">هذا النص مثال لنص يمكن ان يستبدل في المستقبل وعرضه</h6>
                                <a href="about-us.html"><p class="brown mt-4 card-animation">المزيد +</p></a>
                            </div>
                        </div>
                    </div> --}}
                    
                    {{-- <div class="col-md-6 col-xl-4" data-aos="fade-up" data-aos-duration="800"  data-aos-delay="500">
                        <div class="card card-1 py-4 px-3" style="width: 21rem;">
                            <div class="card-body text-center">
                                <img src="{{ asset('site/imgs/diamond.png') }}" alt="..." class="mb-4" width="60px">
                                <h1 class="dark-brown fs-4">الرسالة</h1>
                                <h6 class="brown mt-4 pb-2 card-animation">هذا النص مثال لنص يمكن ان يستبدل في المستقبل وعرضه</h6>
                                <a href="about-us.html"><p class="brown mt-4 card-animation">المزيد +</p></a>
                            </div>
                        </div>
                    </div> --}}

                    @foreach($visions as $vision)
                    <div class="col-md-12 col-xl-4 " data-aos="fade-up" data-aos-duration="800"  data-aos-delay="700">
                        <div class="card card-1 py-4 px-3" style="width: 21rem;">
                            <div class="card-body text-center">
                                <img src="{{ asset($vision->image) }}" alt="..." class="mb-4" width="55px">
                                <h1 class="dark-brown fs-4">{{ $vision->title }}</h1>
                                <h6 class="brown mt-4 pb-2 card-animation">{!! \Illuminate\Support\Str::limit($vision->description, 30) !!}</h6>
                                @if( $vision->getTranslations('title')['en'] =='Goals')
                                <a href="{{ route('site.vision.goals') }}"><p class="brown mt-4 card-animation">{{ __('المزيد') }} +</p></a>
                                @elseif( $vision->getTranslations('title')['en'] =='Message')
                                <a href="{{ route('site.vision.message') }}"><p class="brown mt-4 card-animation">{{ __('المزيد') }} +</p></a>
                                @elseif ( $vision->getTranslations('title')['en'] =='Vision')
                                <a href="{{ route('site.vision.vision') }}"><p class="brown mt-4 card-animation">{{ __('المزيد') }} +</p></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
    
                    
    
                </div>
            </div>
    </div>
</center>