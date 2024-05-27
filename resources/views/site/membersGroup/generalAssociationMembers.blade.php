@extends('layouts.site')


@section('content')

<div class="new-content">
    <div class="container">
        <div class="members">
            <h3 class="text-center">{{ __('أعضاء الجمعية العمومية') }}</h3>
            <div class="row d-flex justify-content-center">
                <div class="col-md-3 custom-margin">
                    <div class="member-box text-center">
                        {{-- <div class="img-box">
                            <img src="{{ asset('site/imgs/members/1.png') }}" class="img-fluid" alt="">
                        </div> --}}
                        <h4>{{ __('علي حمود العريفي') }}</h4>
                        {{-- <p>{{ __('رئيس مجلس الإدارة') }}</p> --}}
                        <p></p>
                    </div>
                </div>
                <div class="col-md-3 custom-margin">
                    <div class="member-box text-center">
                        {{-- <div class="img-box">
                            <img src="{{ asset('site/imgs/members/2.png') }}" class="img-fluid" alt="">
                        </div> --}}
                        <h4>{{ __('حمود حمدان المطيري') }}</h4>
                        {{-- <p>{{ __('نائب رئيس مجلس الادارة') }}</p>
                        <p>{{ __('رئيس لجنة التدريب') }} </p> --}}
                    </div>
                </div>
                <div class="col-md-3 custom-margin">
                    <div class="member-box text-center">
                        {{-- <div class="img-box">
                            <img src="{{ asset('site/imgs/members/6.png') }}" class="img-fluid" alt="">
                        </div> --}}
                        <h4>{{ __('محمد عبدالرحمن الغامدي') }}</h4>
                        {{-- <p>{{ __('عضو مجلس الإدارة') }}</p>
                        <p>{{ __('رئيس لجنة شؤون الثقافة') }}</p> --}}
    
                    </div>
                </div>

            </div>
            
            <div class="row d-flex justify-content-center">
            <div class="col-md-3 custom-margin">
                    <div class="member-box text-center">
                        {{-- <div class="img-box">
                            <img src="{{ asset('site/imgs/members/3.png') }}" class="img-fluid" alt="">
                        </div> --}}
                        <h4>{{ __('سعيد عبدالله آل هطلاء') }}</h4>
                        {{-- <p>{{ __('عضو مجلس الإدارة') }}</p>
                        <p>{{ __('رئيس اللجنة الإعلامية') }}</p> --}}
                    </div>
                </div>
                <div class="col-md-3 custom-margin">
                    <div class="member-box text-center">
                        {{-- <div class="img-box">
                            <img src="{{ asset('site/imgs/members/4.png') }}" class="img-fluid" alt="">
                        </div> --}}
                        <h4>{{ __('د.علي إبراهيم خواجي') }}</h4>
                        {{-- <p>{{ __('عضو مجلس الإدارة') }}</p>
                        <p>{{ __('رئيس لجنة الاستثمار') }}</p> --}}
                    </div>
                </div>
                
                <div class="col-md-3 custom-margin">
                    <div class="member-box text-center">
                        {{-- <div class="img-box">
                            <img src="{{ asset('site/imgs/members/5.png') }}" class="img-fluid" alt="">
                        </div> --}}
                        <h4>{{ __('م. طلال نخيل الشرهان') }}</h4>
                        {{-- <p>{{ __('عضو مجلس الإدارة') }}</p>
                        <p>{{ __('رئيس لجنة العلاقات العامة') }}</p> --}}
                    </div>
                </div>

            </div>
            <div class="row d-flex justify-content-center">
                
                <div class="col-md-3 custom-margin">
                    <div class="member-box text-center">
                        {{-- <div class="img-box">
                            <img src="{{ asset('site/imgs/members/8.png') }}" class="img-fluid" alt="">
                        </div> --}}
                        <h4>{{ __('د.أحمد عيسى الهلالي') }}</h4>
                        {{-- <p>{{ __('عضو مجلس الإدارة') }}</p>
                        <p>{{ __('رئيس لجنة المؤتمرات والندوات') }}</p> --}}
                    </div>
                </div>
                <div class="col-md-3 custom-margin">
                    <div class="member-box text-center">
                        {{-- <div class="img-box">
                            <img src="{{ asset('site/imgs/members/7.png') }}" class="img-fluid" alt="">
                        </div> --}}
                        <h4>{{ __('محمد هليل الرويلي') }}</h4>
                        {{-- <p>{{ __('عضو مجلس الإدارة') }}</p>
                        <p>{{ __('رئيس لجنة التسويق') }}</p> --}}
                    </div>
                </div>
                <div class="col-md-3 custom-margin">
                    <div class="member-box text-center">
                        {{-- <div class="img-box">
                            <img src="{{ asset('site/imgs/members/12.png') }}" class="img-fluid" alt="">
                        </div> --}}
                        <h4>{{ __('مشهور مرزوق العتيبي') }}</h4>
                        {{-- <p>{{ __('عضو مجلس الإدارة') }}</p>
                        <p>{{ __('رئيس لجنة الإبداع والابتكار') }}</p> --}}
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">

                <div class="col-md-3 custom-margin">
                    <div class="member-box text-center">
                        {{-- <div class="img-box">
                            <img src="{{ asset('site/imgs/members/9.png') }}" class="img-fluid" alt="">
                        </div> --}}
                        <h4>{{ __('أيمن يعن الله الغامدي') }}</h4>
                        {{-- <p>{{ __('عضو مجلس الإدارة') }}</p>
                        <p>{{ __('رئيس لجنة المواقع التراثية') }}</p> --}}
                    </div>
                </div>
                
                <div class="col-md-3 custom-margin">
                    <div class="member-box text-center">
                        {{-- <div class="img-box">
                            <img src="{{ asset('site/imgs/members/10.png') }}" class="img-fluid" alt="">
                        </div> --}}
                        <h4>{{ __('ياسر إبراهيم هيجان') }}</h4>
                        {{-- <p>{{ __('عضو مجلس الإدارة') }}</p>
                        <p>{{ __('رئيس لجنة الإنتاج الفني') }}</p> --}}
                    </div>
                </div>

                {{-- <div class="col-md-3 custom-margin">
                    <div class="member-box text-center"> --}}
                        {{-- <div class="img-box">
                            <img src="{{ asset('site/imgs/members/10.png') }}" class="img-fluid" alt="">
                        </div> --}}
                        {{-- <h4>{{ __('أحمد عبدالله المجحد') }}</h4> --}}
                        {{-- <p>{{ __('عضو مجلس الإدارة') }}</p>
                        <p>{{ __('رئيس لجنة الإنتاج الفني') }}</p> --}}
                    {{-- </div>
                </div> --}}
              
                
            </div>
        </div>
    </div>
</div>

@endsection