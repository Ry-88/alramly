

@extends('layouts.site')



@section('content')
<div style="padding-top: 170px;">
    <div class="container">
        <h1 class="fs-2 orange text-start mb-5">{{ __('قرار تشكيل مجلس الادارة') }}</h1>
        <div class="row d-flex justify-content-center">

            {{-- @foreach($documents as $document)
            <div class="col-sm-4 col-md-3 col-lg-3 col-xxl-2 mb-4 d-flex justify-content-center">
                <div class="card shadow p-3" style="border: 0; border-radius: 10px;">
                  <img src="{{ asset('site/imgs/pdf.png') }}" alt="" width="150">
                  <h1 class="fs-6 text-center mt-4">{{ $document->name }}</h1>
                  <div class="text-center">
                    <a target="_blank" href="{{ route('site.document.pdf',$document->id) }}"   class="btn btn-3 text-white mt-2" style="width: 40px; background:#DCA425"><i  class="fa fa-eye" aria-hidden="true"></i></a>
                  </div>
                  </div>
            </div>
            @endforeach
            <x-paginator :paginator="$documents" /> --}}
          
            {{-- <h5 class="mb-3">سعادة رئيس مجلس إدارة جمعية سفراء التراث</h5>
            
            <h5 class="mb-3">الاستاذ/ طلال بن نخيل جعيري الشمري سلمه الله</h5>

            <h5 class="mb-3">السلام عليكم ورحمة الله وبركاته...</h5> --}}
    
            <h5 class="mb-5">
                {{ __('أشير إلى عقد اجتماع الجمعية العمومية الغير عادية للجمعية والمتعقد يوم الإربعاء بتاريخ 1443/05/11 هـ . والذي تم فيه البت في استقالة العضو احمد بن عبدالله المجحد واحلال بديلاً عنه العضو المؤسس محمد بن عبدالرحمن أحمد الغامدي وفيه ثم إعادة تشكيل المجلس برئاستكم وعضوية كلا من الأفاضل:-') }}
            </h5>

            <h5>
                <ul>
                    <li>
                        {{ __('الدكتور/ علي بن ابراهيم حسين خواجي (نائب الرئيس).') }}
                    </li>
                    <li>
                        {{ __('الاستاذ/ محمد بن عبدالرحمن احمد الغامدي (المشرف المالي)') }}
                    </li>
                    <li>
                        {{ __('الاستاذ/ مشهور بن مرزوق عياد العتيبي (عضو)') }}
                    </li>
                    <li>
                        {{ __('الاستاذ/ محمد بن هليل طنق الرويلي (عضو)') }}
                    </li>
                </ul>
            </h5>

            <h5 class="mb-3">
                {{ __('نفيدكم باعتماد هذا المجلس لدى الوزارة حتى تاريخ 1447/03/13هـ.') }}
            </h5>

            <h5 class="my-4 text-center">
                {{ __('متمنياً للجميع المزيد من التوفيق.') }}</h5>


                @foreach($documents as $document)
        <a target="_blank" href="{{ route('site.document.pdf',$document->id) }}" class="mt-3 mb-4 text-center"><p class="orange">{{ __('نسخة الأصل') }}<i class="fas fa-file-pdf orange ms-2"></i></p></a>
        @endforeach
        <x-paginator :paginator="$documents" />

        </div>

    </div>
</div>
@endsection