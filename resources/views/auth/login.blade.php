
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Login </title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('logos/logo.jpeg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors-rtl.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/colors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/components.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/themes/dark-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/themes/bordered-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/themes/semi-dark-layout.min.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/pages/page-auth.min.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/custom-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style-rtl.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <!-- END: Custom CSS-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><div class="auth-wrapper auth-v1 px-2">
  <div class="auth-inner py-2">
    <!-- Login v1 -->
    <div class="card mb-0">
      <div class="card-body">
      <img src="{{ asset('site/imgs/logo.svg') }}" alt="" width="150" class="mx-auto">
        
        <form action="{{ route('login') }}" class="auth-login-form mt-2"  method="POST">
          <div class="form-group">
            @csrf
            <label for="login-email" class="form-label">البريد الالكتروني</label>
            <input
              type="email"
              class="form-control"
              name="email"
          
            />
            @error('email') 
              <span id="basic-default-name-error" class="error">
                  {{ $message }}
              </span>
              @enderror
          </div>
          

          <div class="form-group">
            <div class="d-flex justify-content-between">
              <label for="login-password">كلمة المرور</label>
              {{-- <a href="page-auth-forgot-password-v1.html">
                <small>Forgot Password?</small>
              </a> --}}
            </div>
            <div class="input-group input-group-merge">
              <input
                type="password"
                class="form-control form-control-merge"
                name="password"
               
              />
            
              @error('password') 
              <span id="basic-default-name-error" class="error">
                  {{ $message }}
              </span>
              @enderror
            </div>
          </div>
          <div class="form-group">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" value="1" type="checkbox" name="remember_me" id="remember-me" tabindex="3" />
              <label class="custom-control-label" for="remember-me">تذكرني</label>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit" tabindex="4">تسجيل دخول</button>
        </form>

        


       
      </div>
    </div>
    <!-- /Login v1 -->
  </div>
</div>

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.min.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/pages/page-auth-login.js') }}"></script>
    <!-- END: Page JS-->

    <script>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })
    </script>
  </body>
  <!-- END: Body-->
</html>