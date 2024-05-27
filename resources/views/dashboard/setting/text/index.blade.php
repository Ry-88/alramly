@extends('layouts.admin')
@section('title')
النصوص  
@endsection
@section('content')
    <div class="container">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">النصوص</h4>
                        <a href="{{ route('texts.create') }}" class="btn btn-outline-success waves-effect">أضافة  نص</a>
                    </div>
                    <div class="card-body">
                    </div>
                    <div class="table-responsive">
                        <table id="table"  class="table table-hover">
                            <thead>
                                <tr>
                                    <th>عنوان النص</th>
                                    <th>المحتوى</th>
                                    <th>صورة النص</th>
                                    <th>الحالة</th>
                                    <th>التحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($texts as $text)
                                <tr>
                                    <td>
                                        <span class="font-weight-bold">{{ $text->title }}</span>
                                    </td>
                                  
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter-{{ $text->id }}">
                                            <i class="fa fa-eye"></i>
                                          </button>
                                          <div class="modal fade" id="exampleModalCenter-{{ $text->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLongTitle">الخبر</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>{!! $text->body !!}</p>
                                                </div>
                                                
                                              </div>
                                            </div>
                                          </div>
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter-{{ $text->slug }}">
                                            <i class="fa fa-eye"></i>
                                          </button>
                                          <div class="modal fade" id="exampleModalCenter-{{ $text->slug }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLongTitle">صورة الخبر </h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                       
                                                        <div class="col-md-3">
                                                             <img style="width: 200px; height: 200px;" src="{{ asset('/'.$text->image?->path) }}" alt="{{ $text->title }}" >
                                                        </div>
                                                        
                                                      </div>
                                                </div>
                                                
                                              </div>
                                            </div>
                                          </div>
                                    </td>

                                    <td>
                                      @if($text->status == 'غير مفعل')
                                      <span class="badge badge-pill badge-danger">{{ $text->status }}</span>
                                      @else 
                                      <span class="badge badge-pill badge-success">{{ $text->status }}</span>
                                      @endif
                                     
                                  </td>
                               

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow waves-effect waves-float waves-light" data-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                            </button>
                                            <div class="dropdown-menu" style="">

                                              @if($text->status == 'غير مفعل')
                                              <a class="dropdown-item" href="{{ route('texts.updateStatusEnabled',$text->id) }}">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 mr-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                  تغير الحالة
                                              </a>
                                              @else
                                              <a class="dropdown-item" href="{{ route('texts.updateStatusDisabled',$text->id) }}">
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 mr-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                  تغير الحالة
                                              </a>
                                              @endif
                                              
                                                <a class="dropdown-item" href="{{ route('texts.edit',$text->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 mr-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                    تعديل
                                                </a>
                                                <form class="" action="{{ route('texts.delete',$text->id) }}" method="post">
                                                   
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