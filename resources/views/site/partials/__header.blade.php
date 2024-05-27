@if(\App\Models\Control::find(1)->status == 'مفعل')
<nav class="navbar navbar-expand-lg navbar-light fixed-top nav-bg py-0 shadow" data-aos="fade-down" data-aos-duration="700"  data-aos-delay="100">
   <div class="container px-4 px-lg-5">
      <a class="navbar-brand" href="{{ route('site.home') }}"><img src="{{ asset('site/imgs/logo.svg') }}" alt="" width="100"></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
         <ul class="navbar-nav mx-auto animated_link">
            <!-- @foreach($meuns as $me)
               @if(count($me->subMeuns) > 0)
               <li class="nav-item dropdown">
               
                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   {{ __($me->name )}}
                 </a>
               
                 
                 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   @foreach($me->subMeuns as $sub)
                   @if($sub->route_name)
                   <a class="dropdown-item" href="{{ route($sub->route_name)}}">{{ __($sub->name) }}</a>
                   @else
                   <a class="dropdown-item" href="{{ $sub->endpoint }}">{{ __($sub->name) }}</a>
                   @endif
                   @endforeach
                 </div>
               </li>
               @else 
               @if($me->route_name)
               <li class="nav-item fw-bold"><a class="nav-link" href="{{ route($me->route_name) }}">{{ __($me->name) }}</a></li>
               @else
               <li class="nav-item fw-bold"><a class="nav-link" href="{{ $me->endpoint }}">{{ __($me->name)}}</a></li>
               
               @endif
               @endif
               
               @endforeach -->
            <li class="nav-item"><a class="nav-link" href="{{ route('site.home') }}">{{ __('الرئيسية') }}</a></li>
      
            <!-- <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 عن الجمعية
               </a>
               <ul class="dropdown-menu shadow" aria-labelledby="navbarDropdown">
                 <li><a class="dropdown-item" href="{{ route('site.document.departments') }}">الإدارات</a></li>
                 <li><a class="dropdown-item" href="{{ route('site.document.governance') }}"> اللائحة التنفيذية</a></li>
                 <li><a class="dropdown-item" href="{{ route('site.document.reports') }}">التقارير</a></li>
                 <li><a  class="dropdown-item" href="{{ route('site.document.meetings') }}">الاجتماعات</a></li>
                 
               </ul>
               </li> -->
            <div class=" dropdown">
               <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               {{ __('عن الجمعية') }}
               </a>
               <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" href="{{ route('site.vision.index') }}">{{ __('من نحن') }}</a></li>
                  <li>
                     <a class="dropdown-item" href="{{ route('site.vision.vision') }}">{{ __('الرؤية') }}</a>
                  </li>
                  <li>
                     <a class="dropdown-item" href="{{ route('site.vision.message') }}">{{ __('الرسالة') }}</a>
                  </li>
                  <li>
                     <a class="dropdown-item" href="{{ route('site.vision.goals') }}">{{ __('الاهداف') }}</a>
                  </li>
                  <li>
                     <a class="dropdown-item" href="{{ route('site.membersGroup') }}">{{ __('أعضاء مجلس الإدارة') }}</a>
                  </li>
                  <li>
                     <a class="dropdown-item" href="{{ route('site.foundingMembers') }}">{{ __('الأعضاء المؤسسون') }}</a> 
                  </li>
                  <li>
                     <a class="dropdown-item" href="{{ route('site.generalAssociationMembers') }}">{{ __('أعضاء الجمعية العمومية') }}</a>
                  </li>
                  <li>
                     <a class="dropdown-item" href="{{ route('site.organizational.chart') }}">{{ __('الهيكل التنظيمي') }}</a>
                  </li>
                  <li>
                     <a class="dropdown-item" href="{{ route('site.document.governance_transparency') }}">
                     {{ __(' الحوكمة و الشفافية') }}
                     </a>
                     {{-- <ul class="dropdown-menu dropdown-submenu">
                        <li>
                           <a class="dropdown-item" href="{{ route('site.ministerial.decision') }}">{{ __('القرار الوزاري') }}</a>
                        </li>
                        <li>
                           <a class="dropdown-item" href="{{ route('site.decision.board.directors') }}">{{ __('قرار تشكيل مجلس الادارة') }}</a>
                        </li>
                        <li>
                           <a class="dropdown-item" href="{{ route('site.association.license') }}">{{ __('ترخيص الجمعية') }}</a>
                        </li>
                        <li>
                           <a class="dropdown-item" href="{{ route('site.basic.regulation') }}">{{ __('اللائحة الأساسية') }}</a>
                        </li>
                        <li>
                           <a class="dropdown-item" href="{{ route('site.regulations.policies') }}">{{ __('اللوائح والسياسات') }}</a>
                        </li>
                        <li>
                           <a class="dropdown-item" href="{{ route('site.document.reports') }}">{{ __('التقارير') }}</a>
                        </li>
                        <li>
                           <a class="dropdown-item" href="{{ route('site.governance.result') }}">{{ __('نتيجة الحوكمة') }}</a>
                        </li>
                     </ul> --}}
                  </li>
                  <li> 
                     <a class="dropdown-item" href="{{ route('site.document.meetings-minutes') }}">{{ __('محاضر الاجتماعات') }}</a>
                  </li>
                  {{-- <li> 
                     <a class="dropdown-item" href="{{ route('site.board.meeting.minutes') }}">{{ __(' محاضر اجتماعات مجلس الإدارة') }}</a>
                  </li>
                  <li>
                     <a class="dropdown-item" href="{{ route('site.general.association.meetings') }}"> {{ __('محاضر اجتماعات الجمعية العمومية') }}</a>
                  </li> --}}
               </ul>
            </div>
            <li class="nav-item "><a class="nav-link" href="{{ route('site.event.index') }}">{{ __('الفعاليات') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('site.project.index') }}">{{ __('البرامج والمشاريع') }}</a></li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               {{ __('المركز الإعلامي') }}
               </a>
               <ul class="dropdown-menu shadow" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{ route('site.news.index') }}">{{ __('اخر الاخبار') }}</a></li>
                  <li><a class="dropdown-item" href="{{ route('site.gallery.index') }}">{{ __('معرض الصور والفيديوهات') }}</a></li>
                  <li><a class="dropdown-item" href="{{ route('site.articles.index') }}">{{ __('مقالات الجمعية') }}</a></li>
               </ul>
            </li>
            <li class="nav-item "><a class="nav-link" href="{{ route('site.membership.create') }}">{{ __('العضوية') }}</a></li>
          
            <li class="nav-item "><a class="nav-link" href="{{ route('site.contact.create') }}">{{ __('تواصل معنا') }}</a></li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
                     <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                  </svg>
               </a>
               <ul class="dropdown-menu flags shadow" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="{{ url('/lang/ar') }}"> <img class="flag" src="{{ asset('site/imgs/1.png') }}" alt=""></a>
                  </li>
                  <li><a class="dropdown-item" href="{{ url('/lang/en') }}"> <img class="flag two" src="{{ asset('site/imgs/2.png') }}" alt=""></a>
                  </li>
               </ul>
            </li>
         </ul>
      </div>
   </div>
</nav>
@endif
{{-- {{ (request()->is('customers')) ? 'active' : '' }} --}}