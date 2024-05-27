@extends('layouts.site')



@section('content')

<div style="padding-top: 170px;">
    <div class="container">
        <h1 class="fs-2 orange text-start mb-2 text-center">{{ __('تواصل معنا') }}</h1>
        <p class="orange fs-6 text-center">{{ __('إذا كانت لديك أية أسئلة أو اقتراحات  الرجاء الارسال لنا عبر النموذج التالي') }}</p>
        
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <form id="contactUs" class="row g-4 py-4" action="{{ route('site.contact.store') }}" method="post">
                  @csrf
                    <div class="col-md-6">
                      <input type="text" class="form-control " placeholder="{{ __('الاسم') }}"  name="name">
                      @error('name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                   
                    <div class="col-md-6">
                      <input type="email" class="form-control text-start" placeholder="{{ __('البريد الإلكتروني') }}"  name="email">
                      @error('email')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="col-md-12">
                      <input type="text" class="form-control" placeholder="{{ __('رقم الجوال') }}"  name="phone">
                      @error('phone')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="col-md-12">
                      <textarea class="form-control" placeholder="{{ __('الرسالة') }}" rows="3"  name="message"></textarea>
                      @error('message')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-2 orange text-white">{{ __('ارسال') }}</button>
                    </div>
                    
                  </form>
            </div>
        </div>

    </div>

</div>

@endsection


@section('scripts')

<script type="text/javascript">
  $('#contactUs').submit(function(event) {
   
      event.preventDefault();
  
      grecaptcha.ready(function() {
          grecaptcha.execute("{{ env('RECAPTCHAV3_SITEKEY') }}", {action: 'contactUs'}).then(function(token) {
              $('#contactUs').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
              $('#contactUs').unbind('submit').submit();
          });;
      });
  });
</script>

@endsection