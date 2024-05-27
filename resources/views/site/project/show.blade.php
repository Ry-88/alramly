@extends('layouts.site')


@section('content')

<div style="padding-top: 170px;">
    <div class="container text-center">
        <div class="row">
            <div class="col-8">
                <h1 class="fs-2 orange text-start mb-2">{{ $project->name }}</h1>
                
            </div>
            <div class="col-4">
                <p class="text-end">{{ __('الفئة المستهدفة') }}: <span class="badge bg-orange">{{ $project->target_group }}</span></p>
            </div>
        </div>
        <img src="{{ asset('/'.$project->image->path) }}" alt="" width="500" class="img-fluid mt-4">
        <h1 class="fs-5 mt-4"><i class="fas fa-map-marker-alt orange me-2" aria-hidden="true"></i>{{ $project->place }}</h1>
        <h5 class="mt-3"> {!! $project->description !!} 💚🇸🇦💚</h5>
        <button type="button" class="btn btn-3 text-white mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal" style="border-radius: 9px;width:125px;height:35;background:#DCA425;color:#FFFFFF">{{ __('رعاية') }}</button>
        <button type="button" class="btn btn-3 text-white mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="border-radius: 9px;width:125px;height:35;background:#DCA425;color:#FFFFFF">{{ __('اعلان') }}</button>
        <p class="mt-4">
          <a href="https://twitter.com/intent/tweet?url={{ url()->full() }}" target="_blank"><i class="fab fa-twitter orange fa-lg" aria-hidden="true"></i></a>
          <a href="https://api.whatsapp.com/send/?text={{ url()->full() }}" target="_blank"><i class="fab fa-whatsapp orange ms-4 fa-lg" aria-hidden="true"></i></a>
          <a href="javascript:;" type="button" onclick="Copy();"><i class="fas fa-copy ms-4 orange fa-lg" aria-hidden="true"></i></a>
          <a href="{{ asset($project->document) }}" type="button" target="_blank" class="orange"><p>{{ __('ملف المشروع') }}<i class="fas fa-file-pdf ms-2 orange fa-lg" aria-hidden="true"></i></p></a>
            </p>

    </div>
</div>




    <!-- رعاية -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content" style="border: 0;
        border-radius: 10px;">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ __('رعاية المشروع') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('site.sponsors.store') }}" method="post">
                  <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                    <div class="col-md-6">
                        {!! RecaptchaV3::field('sponsor') !!}
                        @if ($errors->has('g-recaptcha-response'))
                            <span class="help-block">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                    @csrf
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label text-center" >{{ __('أسم المنشأة') }}</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="facility_name">
                        </div>

                        @error('facility_name')
                            <span class="text-danger">{{ $message }}</span>
                            
                        @enderror
                      </div>

                      <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label text-center" >{{ __('المنسق') }}</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="coordinator">
                        </div>
                        @error('coordinator')
                            <span class="text-danger">{{ $message }}</span>
                            
                        @enderror
                      </div>

                      <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label text-center" >{{ __('رقم التواصل') }}</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="phone">
                        </div>
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        
                       @enderror
                      </div>
        
                      <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label text-center" >{{ __('المدينة') }}</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="city">
                        </div>
                        @error('city')
                        <span class="text-danger">{{ $message }}</span>
                        
                       @enderror
                      </div>
        
                      <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label text-center" >{{ __('البريد الإلكتروني') }}</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="email">
                        </div>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        
                       @enderror
                      </div>
                       
                      <input type="hidden" name="project_id" value="{{ $project->id }}">

                      <div class="modal-footer">
                        <button type="submit" style="border-radius: 9px;width:125px;height:35;background:#DCA425;color:#FFFFFF" class="btn btn-3">{{ __('ارسال') }}</button>
                        </div>
                  </form>
            </div>
            
        </div>
        </div>
    </div>


     <!-- اعلان -->
     <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
      <div class="modal-content" style="border: 0;
      border-radius: 10px;">
          <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __('اعلان للمشروع') }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('site.advertisements.store') }}" method="post">
              <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                <div class="col-md-6">
                    {!! RecaptchaV3::field('advertisement') !!}
                    @if ($errors->has('g-recaptcha-response'))
                        <span class="help-block">
                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
                @csrf
                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label text-center" >{{ __('أسم المنشأة') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="facility_name_adv">
                    </div>

                    @error('facility_name_adv')
                        <span class="text-danger">{{ $message }}</span>
                        
                    @enderror
                  </div>

                  <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label text-center" >{{ __('المنسق') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="coordinator_adv">
                    </div>
                    @error('coordinator_adv')
                        <span class="text-danger">{{ $message }}</span>
                        
                    @enderror
                  </div>

                  <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label text-center" >{{ __('رقم التواصل') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="phone_adv">
                    </div>
                    @error('phone_adv')
                    <span class="text-danger">{{ $message }}</span>
                    
                   @enderror
                  </div>
    
                  <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label text-center" >{{ __('المدينة') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="city_adv">
                    </div>
                    @error('city_adv')
                    <span class="text-danger">{{ $message }}</span>
                    
                   @enderror
                  </div>
    
                  <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label text-center" >{{ __('البريد الإلكتروني') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="email_adv">
                    </div>
                    @error('email_adv')
                    <span class="text-danger">{{ $message }}</span>
                    
                   @enderror
                  </div>
                   
                  <input type="hidden" name="project_id" value="{{ $project->id }}">

                  <div class="modal-footer">
                    <button type="submit" style="border-radius: 9px;width:125px;height:35;background:#DCA425;color:#FFFFFF" class="btn btn-3">{{ __('ارسال') }}</button>
                    </div>
              </form>
        </div>
        
      </div>
      </div>
      
  </div>


@endsection

@section('scripts')
<script>

function Copy() {
            var dummy = document.createElement('input'),
            text = window.location.href;
            document.body.appendChild(dummy);
            dummy.value = text;
            dummy.select();
            document.execCommand('copy');
            document.body.removeChild(dummy);
        }
</script>
@endsection

