@extends('layouts.admin')

@section('title')
طلبات العضوية
@endsection

@section('content')

<div class="container">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">طلبات العضوية</h4>
                    {{-- <a href="{{ route('memberships.create') }}" class="btn btn-outline-success waves-effect">أضافة فعالية جديدة</a> --}}
                </div>
                <div class="card-body">
                </div>
                <div class="table-responsive">
                    <table id="table"  class="table table-hover">
                        <thead>
                            <tr>
                                <th>أسم مقدم الطلب</th>
                                <th>رقم الهاتف</th>
                                <th>رقم الهوية</th>
                                <th>تاريخ الميلاد</th>
                                <th>نوع العضوية</th>
                                <th>المدينة</th>
                                {{-- <th>الوظيفة</th> --}}
                                <th>الحالة</th>
                                <th>الصورة الشخصية</th>
                                <th>التحكم</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($memberships as $membership)
                            <tr>
                                <td>
                                    <span class="font-weight-bold">{{ $membership->full_name }}</span>
                                </td>
                                <td>
                                    <span class="font-weight-bold">{{ $membership->phone }}</span>
                                </td>
                                <td>
                                    <span class="font-weight-bold">{{ $membership->id_number }}</span>
                                </td>
                                <td>
                                    <span class="font-weight-bold">{{ $membership->birth_date }}</span>
                                </td>
                                <td>
                                    <span class="font-weight-bold">{{ $membership->membership_type }}</span>
                                </td>
                                <td>
                                    <span class="font-weight-bold">{{ $membership->city }}</span>
                                </td>
                                {{-- <td>
                                    <span class="font-weight-bold">{{ $membership->job }}</span>
                                </td> --}}
                                <td>
                                    <span class="font-weight-bold">{{ $membership->status }}</span>
                                </td>
                    

                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter-{{ $membership->id }}">
                                        <i class="fa fa-eye"></i>
                                      </button>
                                      <div class="modal fade" id="exampleModalCenter-{{ $membership->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLongTitle">الصورة  الشخصية</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                  
                                                         <img style="width: 200px; height: 200px;" src="{{ asset($membership->image->path) }}" alt="" >
                                                  
                                                  </div>
                                            </div>
                                            
                                          </div>
                                        </div>
                                      </div>
                                </td>
                           

                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow waves-effect waves-float waves-light" data-toggle="dropdown" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                        </button>
                                        <div class="dropdown-menu" style="">
                                          
                                            <a class="dropdown-item" href="{{ route('memberships.accpet',$membership->id) }}">
                                                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 mr-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg> --}}
                                                موافقه
                                            </a>

                                            <a class="dropdown-item" href="{{ route('memberships.reject',$membership->id) }}">
                                                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 mr-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg> --}}

                                                {{-- <svg class="svg-icon" style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M622.276923 508.061538l257.969231-257.96923c11.815385-11.815385 11.815385-29.538462 0-41.353846l-41.353846-41.353847c-11.815385-11.815385-29.538462-11.815385-41.353846 0L539.569231 425.353846c-7.876923 7.876923-19.692308 7.876923-27.569231 0L254.030769 165.415385c-11.815385-11.815385-29.538462-11.815385-41.353846 0l-41.353846 41.353846c-11.815385 11.815385-11.815385 29.538462 0 41.353846l257.969231 257.969231c7.876923 7.876923 7.876923 19.692308 0 27.56923L169.353846 793.6c-11.815385 11.815385-11.815385 29.538462 0 41.353846l41.353846 41.353846c11.815385 11.815385 29.538462 11.815385 41.353846 0L512 618.338462c7.876923-7.876923 19.692308-7.876923 27.569231 0l257.969231 257.96923c11.815385 11.815385 29.538462 11.815385 41.353846 0l41.353846-41.353846c11.815385-11.815385 11.815385-29.538462 0-41.353846L622.276923 535.630769c-5.907692-7.876923-5.907692-19.692308 0-27.569231z"  /></svg> --}}
                                                رفض
                                            </a>

                                            <a class="dropdown-item" href="{{ route('memberships.reply',$membership->id) }}">
                                                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 mr-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg> --}}

                                                {{-- <svg class="svg-icon" style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M622.276923 508.061538l257.969231-257.96923c11.815385-11.815385 11.815385-29.538462 0-41.353846l-41.353846-41.353847c-11.815385-11.815385-29.538462-11.815385-41.353846 0L539.569231 425.353846c-7.876923 7.876923-19.692308 7.876923-27.569231 0L254.030769 165.415385c-11.815385-11.815385-29.538462-11.815385-41.353846 0l-41.353846 41.353846c-11.815385 11.815385-11.815385 29.538462 0 41.353846l257.969231 257.969231c7.876923 7.876923 7.876923 19.692308 0 27.56923L169.353846 793.6c-11.815385 11.815385-11.815385 29.538462 0 41.353846l41.353846 41.353846c11.815385 11.815385 29.538462 11.815385 41.353846 0L512 618.338462c7.876923-7.876923 19.692308-7.876923 27.569231 0l257.969231 257.96923c11.815385 11.815385 29.538462 11.815385 41.353846 0l41.353846-41.353846c11.815385-11.815385 11.815385-29.538462 0-41.353846L622.276923 535.630769c-5.907692-7.876923-5.907692-19.692308 0-27.569231z"  /></svg> --}}
                                                رد على الطلب
                                            </a>
                                            {{-- <form class="" action="{{ route('memberships.delete',$membership->id) }}" method="post">
                                               
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn-delete dropdown-item" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash mr-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                               حذف</button>
                                            </form> --}}
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