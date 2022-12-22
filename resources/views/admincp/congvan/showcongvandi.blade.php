@extends('layouts.app')

@section('content')

<!-- Panel Basic -->
@if(Session::has('success'))
<div class="alert  alert-success alert-dismissible" role="alert">
  <div class="toast toast-just-text toast-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>

    {{Session::get('success')}}
    @php
    Session::forget('success');
    @endphp
  </div>
</div>
@endif
@if(Session::has('fail'))
<div class="alert  alert-danger alert-dismissible" role="alert">
  <div class="toast toast-just-text toast-error">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    {{Session::get('fail')}}
    @php
    Session::forget('fail');
    @endphp
  </div>
</div>
@endif
@if ($errors->any())
@foreach ($errors->all() as $error)

<div class="alert  alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  {{ $error }}
</div>

@endforeach
@endif

<div class="colunm">
  <div class="h-p20 w-p20 float-right m-10">
    <a href="{{route('addcongvan')}}" class="btn btn-block btn-success waves-effect waves-classic">Tạo công văn</a>
  </div> 
    <div class="h-p20 w-p20 float-right m-10">
    <a href="{{ route('showcongvandi') }}" class="btn btn-block btn-info waves-effect waves-classic">Công văn đi</a>
  </div> 
  <div class="h-p20 w-p20 float-right m-10">
    <a href="{{ route('congvan') }}" class="btn btn-block btn-info waves-effect waves-classic">Công văn đến</a>
  </div> 
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-lg-12">
      <form action="{{ route('updatecongvan', $congvan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">Chi tiết công văn đi: {{$congvan->tieude}}</h3>

        </header>
        <div class="panel-body">
          <div class="form-group form-material" data-plugin="formMaterial">
            <label class="form-control-label" for="inputText">Tiêu đề</label>
            <input type="text" class="form-control" id="inputText" name="tieude"  value="{{$congvan->tieude}}"
            />
          </div>
          <div class="form-group form-material" data-plugin="formMaterial">
            <label class="form-control-label" for="inputText">Ngày tạo</label>
            <input disabled type="text" class="form-control" id="inputText" name="ngaytao"  value="{{$ngaynhan}}"
            />
          </div>
          <div class="form-group form-material" data-plugin="formMaterial">
            <label class="form-control-label" for="inputText">Nội dung</label>
            <textarea  style="height: 100px" class="form-control"  name="noidung" id="noidung">{{$congvan->noidung}}</textarea>
          </div>
          <div class="form-group form-material" >
            <label class="form-control-label" >Tài liệu</label>
            @foreach($filecongvan as $file)
            <div class="row p-5">
              <p class=" col-lg-4">{{$file->name}}</p>
              <a style="color: #ffffff;" href="{{ route('files', $file->name) }}" class="btn btn-primary col-lg-1 m-3"><i class="icon md-download" aria-hidden="true"></i> Tải về</a>
              <a style="color: #ffffff;" href="{{ route('deletefilecongvandi', $file->id) }}" class="btn btn-danger col-lg-1 m-3"><i class="icon md-delete " aria-hidden="true"></i> Xóa</a>
            </div>
            @endforeach
          </div>
          <div class="row form-group ">
            <div class="col-12 col-md-12">
              <div class="control-group" id="fields">
                <label class="form-control-label" >Chọn file (Cho phép: zip 7z tar gz bz rar doc docx bmp png jpeg jpg pdf pps ppsx ppt pptx txt wav xls xml xlsm xlsx)</label>
                <div class="controls">
                  <div class="entry input-group upload-input-group">
                    <input class="form-control" name="file[]" type="file">
                    <button class="btn btn-upload btn-success btn-add" type="button">
                      <i class="icon md-plus-circle"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group form-material" data-plugin="formMaterial">
            <label class="form-control-label" >Chọn phòng ban để gửi</label>
            <div class="controls">
              <div class="h-p10 w-p10 float-left m-10">
                <a style="color: white;" class="btn btn-block btn-primary waves-effect waves-classic" id="ccc">Đóng tất cả</a>
              </div>
              <div class="h-p10 w-p10 float-left m-10">
                <a style="color: white;" class="btn btn-block btn-primary waves-effect waves-classic" id="ccc">Mở tất cả</a>
              </div>
              <div class="h-p10 w-10 float-left m-10">
                <a style="color: white;" class="btn btn-block btn-primary waves-effect waves-classic" id="ccc">Chọn tất cả</a>
              </div>
              <div class="h-10 w-10 float-left m-10">
                <a style="color: white;" class="btn btn-block btn-primary waves-effect waves-classic" id="ccc">Bỏ chọn tất cả</a>
              </div>  
            </div>
            <div class="clearfix"></div>
            <ul class="tree">
              @foreach($phongbans as $key => $phongban)
              <li class="has">
                <input type="checkbox" name="domain[]" value="{{$phongban->name}}">
                <label>{{$phongban->name}} 
                  <span class="total">
                    @php
                    $sum = 0;
                    foreach($all_users as $key => $user){
                      if($user->name == $phongban->name){
                        $sum++;
                      }
                    }
                    echo '( Có '.$sum . ' thành viên)';
                    @endphp
                  </span>
                </label>
                @foreach($all_users as $key => $user)
                @if($user->name == $phongban->name && $user->user_id != Auth::id())
                <ul>
                  <li class="">
                    <input 
                    @foreach($nguoinhancongvan as $key => $nncv)
                    @if($nncv->id_nguoinhan == $user->user_id)
                    checked 
                    @endif 
                    @endforeach
                    type="checkbox" name="friend[]" value="{{$user->user_id}}">
                    <label>{{$user->name_dislay}} </label>
                  </li>
                </ul>
                @endif
                @endforeach
              </li>
              @endforeach
            </ul>
          </div>
          <div class="form-group form-material" data-plugin="formMaterial">
           <label class="form-control-label" >Thành viên</label>
         </div>
         <div class="form-group row" >
          <div class="input-group col-6 col-md-6">
            <div class="input-group-prepend">
              <span class="input-group-text h-auto">Thành viên đã xem:</span>
            </div>
            <input disabled type="text" class="form-control" data-plugin="tokenfield" value="
            @foreach($nguoinhancongvan as $key => $nncv)
            @if($nncv->trangthai == 1)
            @foreach($all_users as $key => $user)
            @if($nncv->id_nguoinhan == $user->user_id)
            @php
            echo $user->name_dislay . ',';
            @endphp
            @endif
            @endforeach
            @endif 
            @endforeach
            "
            />
          </div>
          <div class="input-group col-6 col-md-6">
            <div class="input-group-prepend">
              <span class="input-group-text h-auto">Thành viên chưa xem:</span>
            </div>
            <input disabled type="text" class="form-control" data-plugin="tokenfield" value="
            @foreach($nguoinhancongvan as $key => $nncv)
            @if($nncv->trangthai != 1)
            @foreach($all_users as $key => $user)
            @if($nncv->id_nguoinhan == $user->user_id)
            @php
            echo $user->name_dislay . ',';
            @endphp
            @endif
            @endforeach
            @endif 
            @endforeach
            "
            />
          </div>
        </div>
        <div class="form-group form-material" data-plugin="formMaterial">
          <label class="form-control-label" >Phản hồi nhận được</label>
          @foreach($phanhoi as $key => $ph)

          <div class="comment media">
            <div class="comment-body media-body">
              <a class="comment-author" href="javascript:void(0)">
               @foreach($all_users as $key => $user)
               @if($ph->id_nguoigui == $user->user_id)
               Thành viên: {{ $user->name_dislay }}
               @endif
               @endforeach
             </a>
             <a class="comment-author" href="javascript:void(0)">@php echo $ph->noidung; @endphp</a>
             <div class="comment-meta">
              Trạng thái: 
              @if($ph->trangthai == 1)
              <span class="badge badge-success">
                Đã được xử lý 
              </span>
              @else
              <span class="badge badge-danger">
                Chưa được xử lý
              </span>
              @endif
            </div>
            <a class="btn btn-primary m-3" href="{{ route('replyphanhoicongvan', [$ph->id, $congvan->id]) }}">Tôi đã xử lý xong</a>
          </div>
        </div>

        @endforeach
      </div>
      <div class="col-md-12 float-left">
        <button class="btn btn-success float-right" type="submit">Cập nhật</button>
      </div>
    </div>
  </div>
  </form>
</div>

</div>
</div>


<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
  CKEDITOR.replace('noidung');
</script>
<script>

// $(function() {
//     $('#users-table').DataTable({
//         processing: true,
//         serverSide: true,
//         ajax: '{!! route('dataCongVanNhan') !!}',
//  		language: {
//             url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/vi.json'
//         },
//         columns: [
//             { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
//             { data: 'tieude', name: 'tieude' },
//             { data: 'noidung', name: 'noidung' },
//             { data: 'nguoigui', name: 'nguoigui' },
//             { data: 'created_at', name: 'created_at' },
//             { data: 'trangthai', name: 'trangthai' },
//             { data: 'action', name: 'action' },
//         ],
//         order:[[4, 'desc']],
//     });
// });
</script>


@endsection