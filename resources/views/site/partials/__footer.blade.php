@if(\App\Models\Control::find(7)->status == 'مفعل')
<footer class="footer text-center text-light">
    <div class="container">
        <a href="{{ route('site.home') }}"><img src="{{ asset('site/imgs/logo-white.svg') }}" alt="" width="130px"></a>
        <hr>
    <div class="row py-4">
        <div class="col-12 col-lg-6 order-2 order-lg-0 mt-5 mt-lg-0">
        <h2 class="fs-6 text-lg-start text-center">{{ __('جميع الحقوق محفوظة لجمعية سفراء التراث') }} 2022</h2>
        </div>
        <div class="col-12 col-lg-6 order-1 order-lg-0">
            <ul class="text-lg-end text-center mb-0 p-0">
                {{-- <a href="tel:+966530257222" class="text-white" target="_blank"><i class="fas fa-phone fa-2x mx-3 mt-4 mt-sm-0"></i></a> --}}
                <a href="tel:+966530257222" class="text-white">{{ __('966530257222+') }}</a>
                <a href="mailto:{{ $socialMedia?->email }}" class="text-white" target="_blank"><i class="fas fa-at fa-2x mx-3 mt-4 mt-sm-0"></i></a>
                <a href="{{ $socialMedia?->snapchat }}" class="text-white" target="_blank"><i class="fab fa-snapchat-ghost fa-2x mx-3 mt-4 mt-sm-0"></i></a>
                <a href="tel:{{ $socialMedia?->whatsapp }}" class="text-white" ><i class="fab fa-whatsapp fa-2x mx-3 mt-4 mt-sm-0"></i></a>
                <a href="{{ $socialMedia?->tiktok }}" class="text-white" target="_blank"><i class="fab fa-tiktok fa-2x mx-3 mt-4 mt-sm-0"></i></a>
                <a href="{{ $socialMedia?->facebook }}" class="text-white" target="_blank"><i class="fab fa-facebook-f fa-2x mx-3 mt-4 mt-sm-0"></i></a>
                <a href="{{ $socialMedia?->youtube }}" class="text-white" target="_blank"><i class="fab fa-youtube fa-2x mx-3 mt-4 mt-sm-0"></i></a>
                <a href="{{ $socialMedia?->twitter }}" class="text-white" target="_blank"><i class="fab fa-twitter fa-2x mx-3 mt-4 mt-sm-0"></i></a>
                <a href="{{ $socialMedia?->instagram }}" class="text-white" target="_blank"><i class="fab fa-instagram fa-2x ms-3"></i></a>
            </ul>
        </div>
    </div>
    <div class="row  pb-3" style="font-size:1.02rem;">
        <span> 
            <a href="https://smt.sa/" target="_blank">
                <img src="{{asset('app-assets/smt_logo.png')}}" alt="" height="45" >
            </a>
            Powered by 
        </span>
    </div>
    </div>
</footer>

@endif