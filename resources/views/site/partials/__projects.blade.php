@if(\App\Models\Control::find(5)->status == 'مفعل')
<div id="Projects">

    <div class="container">
        <div class="row py-4">
            <div class="col-6">
            <h1 class="fs-2 orange text-start">{{ __('أخر المشاريع') }}</h1>
            </div>
            <div class="col-6">
                @if($project)
                <a href="{{ route('site.project.index') }}"><p class="green text-end">{{ __('المزيد') }}<i class="fas fa-caret-left ms-3"></i></p></a>
                @endif
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row align-items-center text-xl-start text-center py-4 py-xl-0" style="background-color: #fcf6ea;">
            <div class="col-12 col-xl-4 p-xl-0 mb-5 mb-xl-0">
                @if($project)
                <img class="img-fluid" src="{{ asset('/'.$project?->image->path) }}" alt="..." style="height: 430px;"/>
                @endif
            </div>
            <div class="col-12 col-xl-6">
                <div class="text-center">
                    <h1 class="dark-brown mb-5" data-aos="zoom-in" data-aos-duration="500"  data-aos-delay="200">{{ $project?->name }}</h1>
                    <h2 class="brown fs-5">{!! \Illuminate\Support\Str::limit($project?->description, 100) !!}</h2>
                    @if ($project)
                    <a href="{{ route('site.project.index') }}"><button type="button" class="btn-1 mt-5" data-aos="zoom-in" data-aos-duration="800"  data-aos-delay="800"><p class="fs-5 mt-2">{{__('المزيد')}}</p></button></a>
                    @endif
                </div>
            </div>
        </div> 
    </div>
</div>
@endif