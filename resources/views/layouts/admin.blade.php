
<!DOCTYPE html>

<html class="loading {{ session()->get('theme') == 'dark' ? 'light-layout dark-layout' : 'light-layout'}}" lang="en" data-textdirection="rtl">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title> سفراء التراث | @yield('title')</title>
    <link rel="apple-touch-icon" href="ap{{ asset('p-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/deals.ico">
    {{-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet"> --}}

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
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
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/pages/dashboard-ecommerce.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/plugins/charts/chart-apex.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/plugins/extensions/ext-component-toastr.min.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/custom-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style-rtl.css') }}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <!-- END: Custom CSS-->
<!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/earlyaccess/droidarabickufi.css' rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/pe-icon-7-stroke.css') }}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
   
  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">


    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav  navbar-shadow {{ session()->get('theme') == 'dark' ? 'navbar-dark' : 'navbar-light'}}">
      <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
          <ul class="nav navbar-nav d-xl-none">
            <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);">
              <i class="ficon" data-feather="menu"></i></a></li>
          </ul>

      <ul class="nav navbar-nav bookmark-icons">
           <li class="nav-item dropdown dropdown-user">
            <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="avatar">
                    <img class="round" src="{{ asset('logos/admin.png') }}" alt="avatar" height="40" width="40">
               
                  
            </a>
            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdown-user">
              <a class="dropdown-item" href="{{ route('logout') }}"><i class="mr-50" data-feather="power"></i> تسجيل خروج</a>
            </div>
          </li>
          <ul class="nav navbar-nav align-items-center ml-auto">
          {{-- <li class="nav-item dropdown dropdown-language">
          <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-ae"></i>
                <span class="selected-language">العربية</span></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
            <a class="dropdown-item" href="{{ url('/lang/ar') }}" data-language="ar"><i class="flag-icon flag-icon-sa"></i> العربية</a>
            <a class="dropdown-item" href="{{ url('/lang/ar') }}" data-language="en"><i class="flag-icon flag-icon-us"></i> الإنجليزية</a>
            
            </div>
          </li> --}}
          
          <li class="nav-item d-none d-lg-block"><a href="{{ route('setDarkTheme') }}"  class="nav-link nav-link-style"><i class="ficon" data-feather="{{ session()->get('theme') == 'dark' ? 'sun' : 'moon'}}"></i></a></li>
          <li class="nav-item nav-search">
            {{-- <a class="nav-link nav-link-search"><i class="ficon" data-feather="search"></i></a> --}}
            <div class="search-input">
              <div class="search-input-icon"><i data-feather="search"></i></div>
              <input class="form-control input" type="text" placeholder="عن ماذا تبحث؟؟" tabindex="-1" data-search="search">
              <div class="search-input-close"><i data-feather="x"></i></div>
              <ul class="search-list search-list-main"></ul>
            </div>
          </li>
          </ul>
          </ul>
         
        </div>
        
          
 
      </div>
    </nav>
    
   
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    {{-- <div class="main-menu menu-fixed  menu-accordion menu-shadow menu-light" data-scroll-to-active="true"> --}}
    <div class="main-menu menu-fixed  menu-accordion menu-shadow {{ session()->get('theme') == 'dark' ? 'menu-dark' : 'menu-light'}}" data-scroll-to-active="true">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto"><a class="navbar-brand" href="html/rtl/vertical-menu-template/index.html"><span class="brand-logo">
                {{-- <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24"> --}}
                 
                   <img class="" src="{{ asset('logos/logo.jpeg') }}" alt="سفراء التراث">
                
                
                </svg></span>
               
         
          <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
      </div>
      <div class="shadow-bottom"></div>

      <div class="main-menu-content">
        
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          @if(Auth::user()->role == 'admin')
          <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class  = "fa fa-dashboard"></i><span class="menu-title text-truncate" data-i18n="Dashboards">لوحة التحكم</span></a>
            
          </li>
          </li>
              </li>
          <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('projects.index') }}"><i class="fa fa-building" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="auctions">المشاريع</span></a>
     
          </li>  

          <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('events.index') }}"><i class="fa fa-calendar" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="auctions">الفعاليات</span></a>
     
          </li>  

          <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('news.index') }}"><i class="fa fa-newspaper-o" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="news">الاخبار</span></a>
            
          </li>

          <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('visions.index') }}"><i class="fa fa-eye" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="visions">عن الجمعية</span></a>
            
          </li>

          <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('sliders.index') }}"><i class="fa fa-picture-o" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="sliders">شرائح الصور</span></a>
            
          </li>

          <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('partners.index') }}"><i class="fa fa-users" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="sliders">شركاء النجاح</span></a>
            
          </li>

         

          <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('contacts.index') }}"><i class="fa fa-comments" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="sliders">رسائل الزوار</span></a>
            
          </li>


          <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('abouts.index') }}"><i class="fa fa-book" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="sliders">من نحن</span></a>
            
          </li>

          <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('social-media.index') }}"><i class="fa fa-share-square-o" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="sliders">وسائل التواصل </span></a>
            
          </li>

          <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('users.index') }}"><i class="fa fa-user" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="sliders">المستخدمين</span></a>
            
          </li>

          {{-- <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('memberships.index') }}"><i class="fa fa-check-circle" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="sliders">طلبات العضوية</span></a>
            
          </li> --}}
         

          <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fa fa-camera" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="FinancialManagement">المركز الاعلامي </span></a>
            <ul class="menu-content">
              <li><a class="d-flex align-items-center" href="{{ route('galleries.photo.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FinancialManagementDetails">معرض الصور</span></a>
              </li>

              <li><a class="d-flex align-items-center" href="{{ route('galleries.video.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FinancialManagementDetails">معرض الفيديوهات</span></a>
              </li>

              <li><a class="d-flex align-items-center" href="{{ route('articles.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FinancialManagementDetails">المقالات</span></a>
              </li>

             
        
            </ul>
          </li>  

          <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fa fa-bars" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="FinancialManagement">المستندات</span></a>
            <ul class="menu-content">
              <li><a class="d-flex align-items-center" href="{{ route('documents.reports') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FinancialManagementDetails">التقارير</span></a>
              </li>



              <li><a class="d-flex align-items-center" href="{{ url('/document/ministerial/decision') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FinancialManagementDetails">القرار الوزاري</span></a>
              </li>

           
              <li><a class="d-flex align-items-center" href="{{ route('documents.decision.board.directors') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FinancialManagementDetails">قرار تشكيل مجلس الإدارة</span></a>
              </li>

              <li><a class="d-flex align-items-center" href="{{ route('documents.association.license') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FinancialManagementDetails">ترخيص الجمعية</span></a>
              </li>

              <li><a class="d-flex align-items-center" href="{{ route('documents.basic.regulation') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FinancialManagementDetails">اللائحة الأساسية</span></a>
              </li>
              <li><a class="d-flex align-items-center" href="{{ route('documents.regulations.policies') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FinancialManagementDetails">اللوائح والسياسات</span></a>
              </li>
              
              <li><a class="d-flex align-items-center" href="{{ route('documents.governance.result') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FinancialManagementDetails">نتيجة الحوكمة</span></a>
              </li>

              <li><a class="d-flex align-items-center" href="{{ route('documents.board.meeting.minutes') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FinancialManagementDetails">محاضر اجتماعات مجلس الإدارة</span></a>
              </li>
   
              <li><a class="d-flex align-items-center" href="{{ route('documents.getMinutesNormalMeetings') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FinancialManagementDetails">
                  الجمعية العمومية العادية  
              </span></a>
              </li>
              <li><a class="d-flex align-items-center" href="{{ route('documents.getMinutesUnNormalMeetings') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FinancialManagementDetails">
                {{-- محاضر اجتماعات الجمعية العمومية الغير عادية --}}
                 الجمعية العمومية الغير عادية
              </span></a>
              </li>

              <li><a class="d-flex align-items-center" href="{{ route('documents.organizational.chart') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FinancialManagementDetails"> الهيكل التنظيمي</span></a>
              </li>
              
             
        
            </ul>
          </li>  
          
          <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fa fa-cogs" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="FinancialManagement">الضبط</span></a>
                      <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{ route('controls.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FinancialManagementDetails">أعدادات عامه</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="{{ route('meuns.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FinancialManagementDetails">أعدادات القوائم</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="{{ route('settings.sliders.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FinancialManagementDetails"> أعدادات  شرائح الصور</span></a>
                        </li>

                        <li><a class="d-flex align-items-center" href="{{ route('setting.visions.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FinancialManagementDetails"> أعدادات الرؤى</span></a>
                        </li>

                        <li><a class="d-flex align-items-center" href="{{ route('texts.index') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FinancialManagementDetails">النصوص</span></a>
                        </li>

                  
                      </ul>
                    </li>  
                    
                    @endif
                    
                    
                    
                    
                    @if(Auth::user()->role == 'admin' || 'approver')
                    <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fa fa-check-circle" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="FinancialManagement">طلبات العضوية </span></a>
                      <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{ route('memberships.pending') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FinancialManagementDetails">في الانتظار</span></a>
                        </li>
          
                        <li><a class="d-flex align-items-center" href="{{ route('memberships.accepted') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FinancialManagementDetails">تمت الموافقة</span></a>
                        </li>
          
                        <li><a class="d-flex align-items-center" href="{{ route('memberships.rejected') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="FinancialManagementDetails">المرفوضه</span></a>
                        </li>
          
                       
                  
                      </ul>
                    </li>  
                    @endif
                    
                    
                  </ul>
                
                </div>
    </div>
    <!-- END: Main Menu-->


    <!-- BEGIN: Content-->


      <div id="app" class="content-body app-content content"><div class="row">
        <div class="col-12">
            @yield('content')
           
            @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

        </div>
      </div>

     </div>
    </div>
    <!-- END: Content-->



    <!-- Buynow Button-->

    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
  {{-- <div class="customizer-menu px-2">
    <div id="customizer-menu-collapsible" class="d-flex">
      <p class="font-weight-bold mr-auto m-0">Menu Collapsed</p>
      <div class="custom-control custom-control-primary custom-switch">
        <input type="checkbox" class="custom-control-input" id="collapse-sidebar-switch" />
        <label class="custom-control-label" for="collapse-sidebar-switch"></label>
      </div>
    </div>
  </div> --}}
    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/customizer.min.js') }}"></script>
    <script src="{{ asset('/app-assets/vendors/js/jquery/jquery.min.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

    <script>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })
    </script>
 
<script>
  var loadFile = function(event) {
     
      var image = document.getElementById('output');
      image.src = URL.createObjectURL(event.target.files[0]);
      var remove = document.getElementById('img-remove');
         remove.style.display = 'block';
  };

     var removeImage = function(event) {

         var image = document.getElementById('output');
         image.src = '';
         var remove = document.getElementById('img-remove');
         remove.style.display = 'none';
     };
   
  
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>



<script>

  ClassicEditor
          .create( document.querySelector( '#editor' ) )
          .then( editor => {
            
            // console.log(editor.config);
            editor.config.contentsLangDirection = 'rtl';
          } )
          .catch( error => {
                  console.error( error );
          } );

          
          
</script>

<script>

  ClassicEditor
          .create( document.querySelector( '#editorEn' ) )
          .then( editor => {
            
            // console.log(editor.config);
            editor.config.contentsLangDirection = 'rtl';
          } )
          .catch( error => {
                  console.error( error );
          } );

          
          
</script>
<script>
 
  $(document).ready(function() {
    $('#table').DataTable();
} );
 </script>
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

   @yield('scripts')

  </body>
  <!-- END: Body-->
</html>