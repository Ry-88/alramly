@if(\App\Models\Control::find(4)->status == 'مفعل')
<center>
    <!-- News -->
    <div id="Media-center">
        <div class="container">
            <div class="row py-4">
                <div class="col-6">
                <h1 class="fs-2 orange text-start">{{ __('أخر الاخبار') }}</h1>
                </div>
                <div class="col-6">
                    <a href="{{ route('site.news.index') }}"><p class="green text-end">{{ __('المزيد') }}<i class="fas fa-caret-left ms-3"></i></p></a>
                </div>
            </div>
        </div>

  <div class="gallery">
    <div class="gallery-container" data-aos="fade-up" data-aos-duration="1000"  data-aos-delay="300">
        
      @foreach ($news as $key => $report)
        <div class="gallery-item gallery-item-{{ $key+1 }}" data-index="{{ $key+1 }}">
            <div class="card text-white" style="border: 0; border-radius: 25px;     height: 100%;
            ">
                <div class="img-grad" style="    height: 100%;
                ">
                    <img src="{{ asset($report->image->path) }}" class="card-img" alt="..." style="border-radius: 10px !important;     height: 100%; ">
                    {{-- <img src="https://media.istockphoto.com/photos/daily-papers-with-news-on-the-computer-picture-id1301656823" class="card-img" alt="..." style="border-radius: 10px !important;     height: 100%; "> --}}
                </div>
                <div class="card-img-overlay">
                  <h1 class="card-title fs-5 mt-5">{{ $report->title }}</h1>
                  <p class="card-text text-start show-item mt-5" style="position: absolute;">{!! \Illuminate\Support\Str::limit($report->content, 150) !!} </p>
                  <a href="{{ route('site.news.show',$report->id) }}"><button type="button" class="btn btn-arrow text-light"><img src="{{ asset('site/imgs/arrow.png') }}" alt="" width="20"></button></a>
                </div>
              </div>
          </div>
          @endforeach

          {{-- <div class="gallery-item gallery-item-2" data-index="2">
            <div class="card text-white" style="border: 0; border-radius: 25px;">
                <div class="img-grad">
                    <img src="{{ asset('site/imgs/new3.png') }}" class="card-img" alt="..." style="border-radius: 10px !important;">
                </div>
                <div class="card-img-overlay">
                  <h1 class="card-title fs-5 mt-5">هذا النص مثال لنص يمكن</h1>
                  <p class="card-text text-start show-item mt-5" style="position: absolute;">هذا النص مثال لنص يمكن ان يستبدل بنص اخر و غرضه العرض فقط و اظهار الفكرة هذا النص مثال لنص يمكن ان يستبدل بنص اخر و غرضه العرض فقط و اظهار الفكرة </p>
                  <a href="news-info.html"><button type="button" class="btn btn-arrow show-item text-light"><img src="{{ asset('site/imgs/arrow.png') }}" alt="" width="20"></button></a>
                </div>
              </div>
          </div> --}}

      {{-- <div class="gallery-item gallery-item-3" data-index="3">
        <div class="card text-white" style="border: 0; border-radius: 25px;">
            <div class="img-grad">
                <img src="{{ asset('site/imgs/new3.png') }}" class="card-img" alt="..." style="border-radius: 10px !important;">
            </div>
            <div class="card-img-overlay">
              <h1 class="card-title fs-5 mt-5">هذا النص مثال لنص يمكن</h1>
              <p class="card-text text-start show-item mt-5" style="position: absolute;">هذا النص مثال لنص يمكن ان يستبدل بنص اخر و غرضه العرض فقط و اظهار الفكرة هذا النص مثال لنص يمكن ان يستبدل بنص اخر و غرضه العرض فقط و اظهار الفكرة </p>
              <a href="news-info.html"><button type="button" class="btn btn-arrow show-item text-light"><img src="{{ asset('site/imgs/arrow.png') }}" alt="" width="20"></button></a>
            </div>
          </div>
      </div> --}}

      {{-- <div class="gallery-item gallery-item-4" data-index="4">
        <div class="card text-white" style="border: 0; border-radius: 25px;">
            <div class="img-grad">
                <img src="{{ asset('site/imgs/new3.png') }}" class="card-img" alt="..." style="border-radius: 10px !important;">
            </div>
            <div class="card-img-overlay">
              <h1 class="card-title fs-5 mt-5">هذا النص مثال لنص يمكن</h1>
              <p class="card-text text-start show-item mt-5" style="position: absolute;">هذا النص مثال لنص يمكن ان يستبدل بنص اخر و غرضه العرض فقط و اظهار الفكرة هذا النص مثال لنص يمكن ان يستبدل بنص اخر و غرضه العرض فقط و اظهار الفكرة </p>
              <a href="news-info.html"><button type="button" class="btn btn-arrow show-item text-light"><img src="{{ asset('site/imgs/arrow.png') }}" alt="" width="20"></button></a>
            </div>
          </div>
      </div> --}}

      {{-- <div class="gallery-item gallery-item-5" data-index="5">
        <div class="card text-white" style="border: 0; border-radius: 25px; height: 375px;">
            <div class="img-grad">
                <img src="{{ asset('site/imgs/new3.png') }}" class="card-img" alt="..." style="border-radius: 10px !important;">
            </div>
            <div class="card-img-overlay">
              <h1 class="card-title fs-5 mt-5">هذا النص مثال لنص يمكن</h1>
              <p class="card-text text-start show-item mt-5" style="position: absolute;">هذا النص مثال لنص يمكن ان يستبدل بنص اخر و غرضه العرض فقط و اظهار الفكرة هذا النص مثال لنص يمكن ان يستبدل بنص اخر و غرضه العرض فقط و اظهار الفكرة </p>
              <a href="news-info.html"><button type="button" class="btn btn-arrow show-item text-light"><img src="{{ asset('site/imgs/arrow.png') }}" alt="" width="20"></button></a>
            </div>
          </div>
      </div> --}}

    </div>
    <div class="gallery-controls">
        <button class="gallery-controls-next"><img src="{{ asset('site/imgs/arrow-right.svg') }}" alt=""></button>
        <button class="gallery-controls-previous"><img src="{{ asset('site/imgs/arrow-left.svg') }}" alt=""></button>
    </div>
  </div>

    </div>
</center>
@endif