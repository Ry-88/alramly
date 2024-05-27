@extends('layouts.site')


@section('content')
    <div style="margin-top:170px">
        <div class="container">
            <h1 class="fs-2 orange text-start mb-2">{{ __('تقديم طلب عضوية') }}</h1>
            <p class="orange fs-6 mb-4">{{ __('يرجى ملء الحقول ادناه لتقديم الطلب') }}</p>
            <div class="row d-flex justify-content-center">
                <div class="col-md-7">
                    <!-- Button trigger modal -->

                    <form id="createMembership" class="row g-3" action="{{ route('site.membership.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12 text-center mb-3">
                            <h1 class="fs-5 mb-3">{{ __('نوع العضوية') }}</h1>
                            <div class="form-check form-check-inline mb-3 mb-xxl-0">
                                <input class="form-check-input" type="radio" name="membership_type" id="option-1"
                                    value="منتسب">
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal1"> <label class="form-check-label"
                                        for="option-1">{{ __('منتسب') }}<span class="orange ms-1"
                                            style="font-size: 12px">({{ __('اضغط للتفاصيل') }})</span></label></a>
                            </div>
                            <div class="form-check form-check-inline mb-3 mb-xxl-0">
                                <input class="form-check-input" type="radio" name="membership_type" id="option-2"
                                    value="عامل">
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal2"><label class="form-check-label"
                                        for="option-2">{{ __('عامل') }}<span class="orange ms-1"
                                            style="font-size: 12px">({{ __('اضغط للتفاصيل') }})</span></label></a>
                            </div>
                            <div class="form-check form-check-inline mb-3 mb-xxl-0">
                                <input class="form-check-input" type="radio" name="membership_type" id="option-3"
                                    value="شرفي">
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal3"> <label class="form-check-label"
                                        for="option-3">{{ __('شرفي') }}<span class="orange ms-1"
                                            style="font-size: 12px">({{ __('اضغط للتفاصيل') }})</span></label></a>
                            </div>

                            @error('membership_type')
                                <span class="msg-error">
                                    {{ $message }}
                                </span> 
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">{{ __('الاسم الثلاثي باللغة العربية') }}</label>
                            <input type="text" class="form-control" id="name" name="full_name">
                            @error('full_name')
                                <span class="msg-error">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <!-- new -->
                        <div class="col-md-6">
                            <label for="name" class="form-label">{{ __('الاسم الثلاثي باللغة الانجليزية') }}</label>
                            <input type="text" class="form-control" id="name" name="full_name_en">
                            @error('full_name_en')
                                <span class="msg-error">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        {{-- <div class="col-md-6">
                        <label for="id-number" class="form-label">{{ __('رقم الهوية') }}</label>
                        <input type="text" class="form-control" id="id-number" name="id_number">
                        @error('id_number')
                        <span class="msg-error">
                            {{ $message }}
                        </span>
                      @enderror
                      </div> --}}
                        <div class="col-md-6">
                            <label for="email" class="form-label">{{ __('البريد الإلكتروني') }}</label>
                            <input type="email" class="form-control" id="email" name="email">
                            @error('email')
                                <span class="msg-error">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="phone-number" class="form-label">{{ __('رقم الجوال') }}</label>
                            <input type="text" class="form-control" id="phone-number" name="phone">
                            @error('phone')
                                <span class="msg-error">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        @include('site.membership.partials.__birthday')
                        <div class="col-md-6">
                            <label for="job" class="form-label">{{ __('المهنة') }}</label>
                            <input type="text" class="form-control" id="job" name="job">
                            @error('job')
                                <span class="msg-error">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6" id="app">
                            <label for="city" class="form-label">{{ __('المدينة') }}</label>
                            {{-- <select id="city" class="form-select" name="city"> --}}
                            {{-- <option selected="">اختيار...</option>
                        <option value="الرياض">الرياض</option> --}}
                            {{-- @foreach ($cities as $city) --}}
                            {{-- <option value="{{ $city }}">{{ $city }}</option> --}}
                            {{-- @endforeach --}}
                            {{-- </select> --}}
                            <input type="hidden" name="city_name" :value="city">
                            <div>
                                <multiselect v-model="city" name="city" placeholder="{{ __('اختر المدينة') }}"
                                    select-label="{{ __('اختر المدينة') }}" deselect-label="أضغط لحذف الاختيار"
                                    :options="{{ $cities }}" :multiple="false" :taggable="false">
                                </multiselect>
                            </div>
                            @error('city')
                                <span class="msg-error">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <label for="picture" class="form-label">{{ __('الصورة الشخصية') }}
                                    <span>({{ __('أختياري') }})</span></label>
                                <input class="form-control" type="file" id="picture" name="image"
                                    accept="image/*">
                            </div>
                            @error('image')
                                <span class="msg-error">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <!-- new -->
                        <div class="col-md-12">
                        <div class="">
                           
                          @error('g-recaptcha-response')
                          <span class="msg-error">
                              {{ $message }}
                          </span>
                        @enderror
                    </div>
                        <div class="col-12">
                            <div class="text-center mt-3">
                                <button id="btnSub" type="submit" class="btn btn-2 orange text-white">{{ __('ارسال') }}</button>
                            </div>
                        </div>
                    
                    </form>
                    <p class="my-5"><span style="color: red;"> * </span>
                        {{ __('سيتم اشعارك بحالة الطلب عبر البريد الإلكتروني') }}.</p>
                    {{-- <div class="bank-info">
                     <div class="row">
                     
                       <div class="col-sm-8">
                       <h3>{{ __('رقم الحساب البنكي للجمعية لدي بنك البلاد') }}</h3>
                     <h4>{{ __('رقم الحساب') }} :  <span>999136841100008</span></h4>
                     <h4>{{ __('رقم الايبان') }} :  <span>SA0215000999136841100008</span></h4>
                       </div>
                       <div class="col-sm-4">
                         <img src="{{ asset('site/imgs/bank-logo.png') }}" class="img-fluid" alt="">
                       </div>
                     </div>
                   
                    </div> --}}
                </div>
            </div>

        </div>
    </div>
@endsection

<!-- Modal one -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('عضوية منتسب') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>{{ __('شروط استحقاق العضوية') }}:</h4>
                <p>{{ __('يكون العضو منتسبًا في الجمعية إذا تقدم بطلب عضوية للجمعية وظهر عدم انطباق أحد شروط العضوية العاملة عليه وصدر قرار من مجلس الإدارة بقبوله عضواً منتسباً، أو تقدم بطلب العضوية منتسبًا.') }}
                </p>

                <h4>{{ __('واجبات العضوية') }}:</h4>
                <ul>
                    <li>{{ __('دفع اشتراك سنوي في الجمعية مقداره (800) ريال.') }}</li>
                    <li>{{ __('التعاون مع الجمعية ومنسوبيها لتحقيق أهدافها.') }}</li>
                    <li>{{ __('عدم القيام بأي أمر من شأنه أن يلحق ضرراً بالجمعية.') }}</li>
                    <li>{{ __('الالتزام بقرارات الجمعية العمومية.') }}</li>
                </ul>
                <h4>{{ __('حقوق العضوية') }}:</h4>
                <ul>
                    <li>{{ __('الاشتراك في أنشطة الجمعية.') }}</li>
                    <li>{{ __('تلقي المعلومات الأساسية عن نشاطات الجمعية بشكل دوري كل سنة مالية.') }}</li>
                    <li>{{ __('الاطلاع على مستندات الجمعية ووثائقها.') }}</li>
                    <li>{{ __('للعضو المنتسب مخاطبة الجمعية عبر أي وسيلة متاحة، وعلى مجلس الإدارة أو من يفوضه تقديم الجواب عبر الوسيلة ذاتها أو عبر عنوانه المقيد في سجل العضوية.') }}
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">{{ __('اغلاق') }}</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal two -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('عضوية عامل') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>{{ __('شروط استحقاق العضوية') }}:</h4>
                <p>{{ __('يكون العضو عاملاً في الجمعية إذا اشترك في تأسيس الجمعية، أو التحق بها بعد قيامها وقبل مجلس الإدارة عضويته، وكان من المتخصصين أو المهتمين أو الممارسين لتخصص الجمعية.') }}
                </p>
                <h4>{{ __('واجبات العضوية') }}:</h4>
                <ul>
                    <li>{{ __('دفع اشتراك سنوي في الجمعية مقداره (1000) ريال.') }}</li>
                    <li>{{ __('التعاون مع الجمعية ومنسوبيها لتحقيق أهدافها.') }}</li>
                    <li>{{ __('عدم القيام بأي أمر من شأنه أن يلحق ضرراً بالجمعية.') }}</li>
                    <li>{{ __('الالتزام بقرارات الجمعية العمومية.') }}</li>
                    <li>{{ __('دفع الاشتراك السنوي.') }}</li>
                    <li>{{ __('التعاون مع الجمعية ومنسوبيها لتحقيق أهدافها.') }}</li>
                    <li>{{ __('عدم القيام بأي أمر من شأنه أن يلحق ضرراً بالجمعية.') }}</li>
                    <li>{{ __('الالتزام بقرارات الجمعية العمومية.') }}</li>
                </ul>
                <h4>{{ __('حقوق العضوية') }}:</h4>
                <ul>
                    <li>{{ __('الاشتراك في أنشطة الجمعية.') }}</li>
                    <li>{{ __('الاطلاع على مستندات الجمعية ووثائقها ومنها القرارات الصادرة في الجمعية سواء كانت من الجمعية العمومية، أو مجلس الإدارة، أو المدير التنفيذي، أو غيرهم.') }}
                    </li>
                    <li>{{ __('الاطلاع على الميزانية العمومية للجمعية ومرفقاتها في مقر الجمعية وقبل عرضها على الجمعية العمومية بوقت كاف.') }}
                    </li>
                    <li>{{ __('حضور الجمعية العمومية.') }}</li>
                    <li>{{ __('التصويت على قرارات الجمعية العمومية إذا أمضى ستة أشهر من تاريخ التحاقه بالجمعية.') }}
                    </li>
                    <li>{{ __('تلقي المعلومات الأساسية عن نشاطات الجمعية بشكل دوري.') }}</li>
                    <li>{{ __('الاطلاع على المحاضر والمستندات المالية في مقر الجمعية.') }}</li>
                    <li>{{ __('دعوة الجمعية العمومية للانعقاد لاجتماع غير عادي بالتضامن مع 25% من الأعضاء الذين لهم حق حضور الجمعية العمومية.') }}
                    </li>
                    <li>{{ __('للعضو أن يخاطب الجمعية بخطاب يصدر منه يوجهه إلى مجلس الإدارة، وللجمعية أن تخاطب العضو بخطاب يصدر من مجلس الإدارة أو ممن يفوضه المجلس يسلم إلى العضو شخصياً، أو يرسل له عبر أي من عناوينه المقيدة في سجل العضوية.') }}
                    </li>
                    <li>{{ __('الإنابة كتابةً لأحد الأعضاء لتمثيله في حضور الجمعية العمومية.') }}</li>
                    <li>{{ __('الترشح لعضوية مجلس الإدارة، وذلك بعد مدةً لا تقل عن ستة أشهر من تاريخ التحاقه بالجمعية وسداده الاشتراك.') }}
                    </li>
                    <li>{{ __('للعضو العامل مخاطبة الجمعية عبر أي وسيلة متاحة، وعلى مجلس الإدارة أو من يفوضه تقديم الجواب عبر الوسيلة ذاتها أو عبر عنوانه المقيد في سجل العضوية.') }}
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-2 orange text-white">Save changes</button> -->
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">{{ __('اغلاق') }}</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal three -->
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('عضوية شرفي') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>{{ __('شروط استحقاق العضوية') }}:</h4>
                <ul>
                    <li>{{ __('يكون عضوًا شرفيًا في الجمعية من ترى الجمعية العمومية منحه عضوية شرفية بمجلس الإدارة نظير تميزه في مجال عمل الجمعية.') }}
                    </li>
                    <li>{{ __('يجوز لمجلس الإدارة دعوة العضو الشرفي في اجتماعات المجلس دون أن يكون له حق التصويت.') }}
                    </li>
                    <li>{{ __('لا يحق للعضو الشرفي طلب حضور الجمعية العمومية ولا ترشيح نفسه لعضوية مجلس الإدارة ولا يثبت بحضوره صحة انعقاد مجلس الإدارة') }}
                    </li>
                    <li>{{ __('للعضو الشرفي مخاطبة الجمعية عبر أي وسيلة متاحة، وعلى مجلس الإدارة أو من يفوضه تقديم الجواب عبر الوسيلة ذاتها أو عبر عنوانه المقيد في سجل العضوية.') }}
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/vue-multiselect@2.1.0"></script>

    <script>
        var app = new Vue({
            el: '#app',
            components: {
                Multiselect: window.VueMultiselect.default
            },
            data() {
                return {
                    city: '',

                }
            }
        })

        $("#georgian").click(() => {

            $("select[name='day']").empty()
            $("select[name='day']").append(`<option selected="">{{ __('اليوم') }}</option>`)
            for (let index = 31; index > 0; index--) {
                $("select[name='day']").append(`<option>${index}</option>`)
            }

            $("select[name='month']").empty()
            $("select[name='month']").append(`<option selected="">{{ __('الشهر') }}</option>`)
            for (let index = 12; index > 0; index--) {
                $("select[name='month']").append(`<option>${index}</option>`)
            }

            $("select[name='year']").empty()
            $("select[name='year']").append(`<option selected="">{{ __('السنة') }}</option>`)
            for (let index = 2004; index > 1949; index--) {
                $("select[name='year']").append(`<option>${index}</option>`)
            }

            $("select").attr("disabled", false)
        })

        $("#hijri").click(() => {

            $("select[name='day']").empty()
            $("select[name='day']").append(`<option selected="">{{ __('اليوم') }}</option>`)
            for (let index = 30; index > 0; index--) {
                $("select[name='day']").append(`<option>${index}</option>`)
            }

            $("select[name='month']").empty()
            $("select[name='month']").append(`<option selected="">{{ __('الشهر') }}</option>`)
            for (let index = 12; index > 0; index--) {
                $("select[name='month']").append(`<option>${index}</option>`)
            }

            $("select[name='year']").empty()
            $("select[name='year']").append(`<option selected="">{{ __('السنة') }}</option>`)
            for (let index = 1425; index > 1342; index--) {
                $("select[name='year']").append(`<option>${index}</option>`)
            }

            $("select").attr("disabled", false)
        })

       

       
    </script>

<script type="text/javascript">
    $('#createMembership').submit(function(event) {
     
        event.preventDefault();
    
        grecaptcha.ready(function() {
            grecaptcha.execute("{{ env('RECAPTCHAV3_SITEKEY') }}", {action: 'create_new_membership'}).then(function(token) {
                $('#createMembership').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
                $('#createMembership').unbind('submit').submit();
            });;
        });
    });
</script>
@endsection
