@extends('layouts.site')


@section('content')

<div style="padding-top: 170px;">
    <div class="container">
        <h1 class="fs-2 orange text-start mb-5">{{ __('البرامج والمشاريع') }}</h1>
        <div class="row d-flex justify-content-center">
            @foreach($projects as $project)
            <div class="col-md-6 col-lg-4 col-xxl-3 mb-4 d-flex justify-content-center">
                <div class="card shadow" style="width: 18rem; border: 0; border-radius: 10px;">
                    <img src="{{ asset('/'.$project->image?->path) }}" class="card-img-top" style="border-top-left-radius: 10px; border-top-right-radius: 10px;" alt="...">
                    <div class="card-body">
                      <h1 class="fs-5">{{ $project->name }}</h1>
                      <div class="text-end"><span class="badge bg-orange">{{ $project->target_group }}</span></div>
                      <div class="text-center mt-4">
                        <a href="{{ route('site.project.show', $project->slug) }}"><button type="button" class="btn btn-2 text-white">{{ __('عرض') }}</button></a>
                      </div>
                    </div>
                  </div>
            </div>
          @endforeach
          <x-paginator :paginator="$projects" />
            
        </div>

    </div>
</div>

@endsection