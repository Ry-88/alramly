@extends('layouts.admin')

@section('title')
 معرض الصور
@endsection

@section('content')
<div class="container">
   
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">معرض الصور</h4>
                    <form class="form form-vertical" action="{{ route('galleries.photo.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                       
                              <p><input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)"
                                 style="display: none;"></p>
                              <p><label for="file"
                                 style="cursor: pointer; color: blue; padding:10px 20px; border:1px solid #D8D6DE; background-color:#fff">أرفع
                                 صورة</label>
                              </p>
                              <p style="position: relative"><img id="output" width="200" style="border-radius: 5px; margin-top:10px; margin-bottom:10px" />
                                 <i onclick="removeImage(event)" id="img-remove" style="position: absolute; display:none;
                                    top: 10px;
                                    right: 10px; width: 30px; height: 30px; border-radius: 50%; line-height:30px !important;cursor: pointer; text-align:center; font-size:20px !important;color:white; background-color:#f00" class="fa fa-trash"></i>
                              </p>
                              @error('image') 
                              <span id="basic-default-name-error" class="error">
                              {{ $message }}
                              </span>
                              @enderror
                              <div class="col-12 mt-2">
                                  <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">حفظ</button>
                                </div>
                                
                            </form>
                   
                </div>
                <div class="card-body">
                </div>
                <div class="table-responsive">
                    <table id="table"  class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عرض</th>
                                <th>التحكم</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($photos as $key => $photo)
                            <tr>
                                <td>
                                    <span class="font-weight-bold">{{ $key + 1 }}</span>
                                </td>
                               
                               
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter-{{ $photo->id }}">
                                        <i class="fa fa-eye"></i>
                                      </button>
                                      <div class="modal fade" id="exampleModalCenter-{{  $photo->id  }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLongTitle">الصورة</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                   
                                                    <div class="col-md-3">
                                                         <img style="width: 200px; height: 200px;" src="{{ asset('/'.$photo->source) }}" alt="" >
                                                    </div>
                                                    
                                                  </div>
                                            </div>
                                            
                                          </div>
                                        </div>
                                      </div>
                                </td>
                               

                                <td>
                                   
                                          
                                            {{-- <a class="dropdown-item" href="{{ route('galleries.photo.edit',$photo->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 mr-50"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                تعديل
                                            </a> --}}
                                            <form class="" action="{{ route('galleries.photo.delete',$photo->id) }}" method="post">
                                               
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn-delete dropdown-item" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash mr-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                               حذف</button>
                                            </form>
                                       
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