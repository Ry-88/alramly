@extends('layouts.site')


@section('content')

<div class="new-content">
    <div class="container">
        <div class="members">
            <h3 class="text-center">{{ __('اعضاء مجلس الإدارة') }}</h3>
            <div class="row d-flex justify-content-center">
                <div class="col-md-3">
                    <div class="member-box text-center">
                        <div class="img-box">
                            <img src="{{ asset('site/imgs/members/1.png') }}" class="img-fluid" alt="">
                        </div>
                        <h4>{{ __('م. طلال نخيل الشرهان') }}</h4>
                        <p>{{ __('رئيس مجلس الإدارة') }}</p>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-4">
                                    <div class="member-box text-center">
                                        <div class="img-box">
                                            <img src="{{ asset('site/imgs/members/2.png') }}" class="img-fluid" alt="">
                                        </div>
                                        <h4>{{ __('د.علي إبراهيم خواجي') }}</h4>
                                        <p>{{ __('نائب رئيس مجلس الادارة') }}</p>
                                        {{-- <p>{{ __('رئيس لجنة التدريب') }}</p> --}}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="member-box text-center">
                                        <div class="img-box">
                                            <img src="{{ asset('site/imgs/members/4.png') }}" class="img-fluid" alt="">
                                        </div>
                                        <h4>{{ __('محمد عبدالرحمن الغامدي') }}</h4>
                                        <p>{{ __('عضو مجلس الإدارة') }}</p>
                                        <p>{{ __('المشرف المالي') }}</p>
                                    </div>
                                </div>
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-4">
                                    <div class="member-box text-center">
                                        <div class="img-box">
                                            <img src="{{ asset('site/imgs/members/3.png') }}" class="img-fluid" alt="">
                                        </div>
                                        <h4>{{ __('محمد هليل الرويلي') }}</h4>
                                        <p>{{ __('عضو مجلس الإدارة') }}</p>
                                        {{-- <p>{{ __('رئيس اللجنة الإعلامية') }}</p> --}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="member-box text-center">
                                        <div class="img-box">
                                            <img src="{{ asset('site/imgs/members/5.png') }}" class="img-fluid" alt="">
                                        </div>
                                        <h4>{{ __('مشهور مرزوق العتيبي') }}</h4>
                                        <p>{{ __('عضو مجلس الإدارة') }}</p>
                                        {{-- <p>{{ __('رئيس لجنة العلاقات العامة') }}</p> --}}
                                    </div>
                                </div>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
</div>

@endsection
