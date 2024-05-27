@extends('layouts.admin')
@section('title')
الرؤى
@endsection
@section('content')
    <div class="container">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> الرؤية</h4>
                        <a href="{{ route('setting.visions.create') }}" class="btn btn-outline-success waves-effect">أضافة رؤية جديد</a>
                    </div>
                    <div class="card-body">
                    </div>
                    <div class="table-responsive">
                        <table id="table"  class="table table-hover">
                            <thead>
                                <tr>
                                    <th>العنوان</th>
                                    <th>الصورة</th>
                                    <th>الوصف</th>
                                    <th>الحالة</th>
                                    <th>التحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($visions as $vision)
                                <tr>
                                    <td>
                                        <span class="font-weight-bold">{{ $vision->title }}</span>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter-{{ $vision->title }}">
                                            <i class="fa fa-eye"></i>
                                          </button>
                                          <div class="modal fade" id="exampleModalCenter-{{ $vision->title }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLongTitle">الصورة</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{ asset('/'.$vision->image) }}" alt="" class="img-fluid">
                                                </div>
                                                
                                              </div>
                                            </div>
                                          </div>
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter-{{ $vision->id }}">
                                            <i class="fa fa-eye"></i>
                                          </button>
                                          <div class="modal fade" id="exampleModalCenter-{{ $vision->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLongTitle">الوصف</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                    <p>{!! $vision->description !!}</p>
                                                </div>
                                                
                                              </div>
                                            </div>
                                          </div>
                                    </td>

                                    
                                    
                                    <td>
                                        @if($vision->status == 'غير مفعل')
                                        <span class="badge badge-pill badge-danger">{{ $vision->status }}</span>
                                        @else 
                                        <span class="badge badge-pill badge-success">{{ $vision->status }}</span>
                                        @endif
                                       
                                    </td>
                                    
                                

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow waves-effect waves-float waves-light" data-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                @if($vision->status == 'غير مفعل')
                                                <a class="dropdown-item" href="{{ route('setting.visions.updateStatusEnabled',$vision->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 mr-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                    تغير الحالة
                                                </a>
                                                @else
                                                <a class="dropdown-item" href="{{ route('setting.visions.updateStatusDisabled',$vision->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 mr-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                    تغير الحالة
                                                </a>
                                                @endif
                                                <a class="dropdown-item" href="{{ route('setting.visions.edit',$vision->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 mr-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                    تعديل
                                                </a>
                                                <form class="" action="{{ route('setting.visions.delete',$vision->id) }}" method="post">
                                                   
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn-delete dropdown-item" type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash mr-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                                   حذف</button>
                                                </form>
                                            </div> 
                                        </div>
                                    </td> 
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



