@extends('layouts.admin')
@section('title')
حسابات التواصل الاجتماعي
@endsection
@section('content')
    <div class="container">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">حسابات التواصل الاجتماعي</h4>
                        @if(!$socialMedia)
                        <a href="{{ route('social-media.create') }}" class="btn btn-outline-success waves-effect">أضافة بيانات جديدة</a>
                        @else
                        <a href="{{ route('social-media.edit', $socialMedia->id) }}" class="btn btn-outline-success waves-effect">تعديل بيانات</a>
                        @endif
                    </div>
                    <div class="card-body">
                    </div>
                    <div class="table-responsive">
                        <table  class="table table-hover">
                            <thead>
                                <tr>
                                    <th>تويتر</th>
                                    <th>البريد الالكتروني</th>
                                    <th>الواتساب</th>
                                    <th>فيسبوك</th>
                                    <th>سناب شات</th>
                                    <th>يونيوب</th>
                                    <th>انستغرام</th>
                                    <th>تيك توك</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                <tr>
                                   
                                   
                                  @if ($socialMedia)
                                    <td>{{ \Illuminate\Support\Str::limit($socialMedia->twitter , 20) }}</td>
                                    <td>{{ $socialMedia->email }}</td>
                                    <td>{{ $socialMedia->whatsapp }}</td>
                                    <td> {{ \Illuminate\Support\Str::limit($socialMedia->facebook , 20) }}</td>
                                    <td> {{ \Illuminate\Support\Str::limit($socialMedia->snapchat , 20) }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($socialMedia->youtube , 20) }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($socialMedia->instagram , 20) }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($socialMedia->tiktok , 20) }}</td>
                      
                                    @endif
                                </tr>
                          
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection