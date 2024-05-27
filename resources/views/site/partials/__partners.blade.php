@if(\App\Models\Control::find(6)->status == 'مفعل')
<div class="parenters">
    <div style="padding-left: 130px; padding-right: 130px;">
        <div class="row">
            <div class="col-lg-2  mb-5 mb-lg-0">
                <h1 class="fs-3 dark-brown">{{ __('شركاء النجاح') }}</h1>
                <a href="{{ route('site.partner.index') }}"><h2 class="fs-6 grey mt-3">{{ __('تصفح الكل') }}</h2></a>
            </div>
            <div class="col-lg-10">
                <div class="owl-one owl-carousel owl-theme">
                    @foreach ($partners as $partner)
                        
                    <div class="item">
                        <a href="{{ $partner->url }}"><img src="{{ asset($partner->image->path) }}" alt="{{ $partner->name }}" ></a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endif