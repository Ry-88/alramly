@extends('layouts.site')



@section('content')
<div style="padding-top: 170px;">
    <div class="container">
        <h1 class="fs-2 orange text-start mb-5">{{ __('الحوكمة') }}</h1>
        <h1 class="hr fs-3">{{ __('وصف اللائحة') }}</h1>
        <p class="fs-5 mt-3">هذا النص مثال لنص يمكن ان يستبدل بنص اخر و غرضه العرض فقط و اظهار الفكرة هذا النص مثال لنص يمكن ان يستبدل بنص اخر و غرضه العرض فقط و اظهار الفكرة</p>
        <div class="row d-flex justify-content-center">

            @foreach($documents as $document)
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
            
            <x-paginator :paginator="$documents" />
          
         
      
    
        </div>

    </div>
</div>
@endsection