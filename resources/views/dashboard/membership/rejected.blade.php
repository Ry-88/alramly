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
                    <h4 class="card-title">طلبات العضوية المرفوضه</h4>
                    {{-- <a href="{{ route('memberships.create') }}" class="btn btn-outline-success waves-effect">أضافة فعالية جديدة</a> --}}
                </div>
                <div class="card-body">
                </div>
                <div class="table-responsive">
                    <table id="table"  class="table table-hover">
                        <thead>
                            <tr>
                                <th>أسم مقدم الطلب</th>
                                <th>رقم الهوية</th>
                                <th>سبب الرفض</th>

                        
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($memberships as $membership)
                            <tr>
                                <td>
                                    <span class="font-weight-bold">{{ $membership->full_name }}</span>
                                </td>
                                <td>
                                    <span class="font-weight-bold">{{ $membership->id_number }}</span>
                                </td>
                               

                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter-{{ $membership->id }}">
                                        <i class="fa fa-eye"></i>
                                      </button>
                                      <div class="modal fade" id="exampleModalCenter-{{ $membership->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLongTitle">سبب الرفض</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                  
                                                  
                                                  </div>
                                            </div>
                                            
                                          </div>
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