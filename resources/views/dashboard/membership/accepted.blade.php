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
                    <h4 class="card-title">طلبات العضوية تمت الموافقة عليها</h4>
                    {{-- <a href="{{ route('memberships.create') }}" class="btn btn-outline-success waves-effect">أضافة فعالية جديدة</a> --}}
                </div>  
                 <div class="row" style="padding-right: 30px">
                <div class="col-5">
                  <form action="{{ route('memberships.export') }}" method="post">
                    @csrf
                   <div class="form-group display-inline">
                    <select name="membership_type" id="" class="form-control">
                        <option value="المنتسب">المنتسب</option>
                        <option value="عامل">عامل</option>
                        <option value="الشرفي">الشرفي</option>
                    </select>
                  
                   </div>
               
                 
                </div>
                <div class="col-3">
                        <button type="submit" class="btn btn-primary btn-sm">تصدير</button>
                </div>
            </form>
            </div>
                <div class="card-body">
                </div>
                <div class="table-responsive">
                    <table id="table"  class="table table-hover">
                        <thead>
                            <tr>
                                <th>أسم مقدم الطلب</th>
                                <th>نوع العضوية</th>
                                <th>البريد الالكتروني</th>
                                <th>تاريخ الاشتراك</th>
                                <th>تاريخ الانتهاء</th>
                                <th>بطاقة العضوية</th>
                                <th></th>
                                <th></th>
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
                                    <span class="font-weight-bold">{{ $membership->membership_type }}</span>
                                </td>
                                <td>
                                    <span class="font-weight-bold">{{ $membership->email }}</span>
                                </td>
                                <td>
                                    <span class="font-weight-bold">{{ $membership->approved_at }}</span>
                                </td>
                                <td>
                                    <span class="font-weight-bold">{{$membership->expirted_at }}</span>
                                </td>
                                <td>
                                    <span class="badge badge-success">{{ $membership->getMemberCardStatus() }}</span>
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-sm" target="_blank" href="{{ route('memberships.show-membership-card',$membership->id) }}">عرض البطاقة</a>
                                </td>
                                <td>
                                    <a href="{{ route('memberships.send.membership_card', $membership->id) }}" class="btn btn-outline-success {{  $membership->membership_card =='yes' && $membership->hasEdit == null ? 'disabled' : '' }} ">أرسال البطاقة</a>
                                </td>
                              
                         
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow waves-effect waves-float waves-light" data-toggle="dropdown" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                        </button>
                                        <div class="dropdown-menu" style="">
                                          
                                            <a class="dropdown-item" href="{{ route('memberships.subscriptionRenewal',$membership->id) }}">
                                                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 mr-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg> --}}
                                          تجديد الاشتراك
                                            </a>

                                            <a class="dropdown-item" href="{{ route('memberships.edit',$membership->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 mr-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                تعديل
                                            </a>

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