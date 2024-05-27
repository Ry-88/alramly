<!doctype html>
<html lang="ar">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>جمعية سفراء التراث</title>
      <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('site/imgs/fav-icon.png') }}" />


    <!-- Bootstrap CSS -->
    @if(App::isLocale('en'))
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    @else
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">
    @endif
    <link rel="stylesheet" href="{{ asset('site/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/owlcarousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/style.css') }}">

    <!-- rtl style -->
    @if(App::isLocale('en'))
    <link rel="stylesheet" href="{{ asset('site/ltr-style.css') }}"> 
    @endif
    <link rel="stylesheet" href="{{ asset('site/carousel.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">

    <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHAV3_SITEKEY') }}"></script>
    <style>
      .swal2-popup {
        font-size: 10px !important;

       }
    </style>

  </head>

  <body>
<!-- Header -->
   @include('site.partials.__header')
    
    <!-- end Header -->
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
        @yield('content')
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->

     {{-- footer --}}

  @include('site.partials.__footer')
  
  {{-- end footer --}}
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://kit.fontawesome.com/3e0ed72be0.js"></script>
    <script src="{{ asset('site/owlcarousel/jquery.min.js') }}"></script>
    <script src="{{ asset('site/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('site/script.js') }}"></script>
    <script src="{{ asset('site/count-down.js') }}"></script>
    <script src="{{ asset('site/news-slider.js') }}"></script>
    <script src="{{ asset('site/carousel.js') }}"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    @yield('scripts')
 
  
  </body>
</html>