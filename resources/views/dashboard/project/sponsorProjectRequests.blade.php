@extends('layouts.admin')

@section('title')
طلبات الرعاية
@endsection

@section('content')
    <div class="container">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">طلبات الرعاية  </h4>
                        <a href="{{ route('projects.index') }}" class="btn btn-outline-success waves-effect">رجوع</a>
                    </div>
                    <div class="card-body">
                    </div>
                    <div class="table-responsive">
                        <table id="table"  class="table table-hover">
                            <thead>
                                <tr>
                                    <th>أسم المنشأة</th>
                                    <th>المنسق</th>
                                    <th>رقم التواصل</th>
                                    <th>المدينة</th>
                                    <th>البريد الالكتروني</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($project->sponsores as  $sponsor)
                                <tr>
                                    <td>
                                        <span class="font-weight-bold">{{ $sponsor->facility_name }}</span>
                                    </td>
                                   
                                    <td>
                                        <span class="font-weight-bold">{{ $sponsor->coordinator }}</span>
                                    </td>

                                    <td>
                                        <span class="font-weight-bold">{{ $sponsor->phone }}</span>
                                    </td>

                                    <td>
                                        <span class="font-weight-bold">{{ $sponsor->city }}</span>
                                    </td>

                                    <td>
                                        <span class="font-weight-bold">{{ $sponsor->email }}</span>
                                    </td>
                                   
                                
            
                                   
                                   

                                    {{-- <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow waves-effect waves-float waves-light" data-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                            </button>
                                            <div class="dropdown-menu" style="">
                                              
                                                <a class="dropdown-item" href="{{ route('projects.edit',$project->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 mr-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                    تعديل
                                                </a>
                                                <form class="" action="{{ route('projects.delete',$project->id) }}" method="post">
                                                   
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn-delete dropdown-item" type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash mr-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                                   حذف</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection