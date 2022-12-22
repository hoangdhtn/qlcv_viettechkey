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
<div class="panel">
  <header class="panel-heading">
    <div class="panel-actions"></div>
{{--     <h3 class="panel-title">Nộp báo cáo</h3>
--}}
</header>
<div class="panel-body">
  <form autocomplete="off" method="POST" action="{{ route('storephbaocao', $baocao->id) }}"  enctype="multipart/form-data">
    @method('POST')
    @csrf
    <hr>
    <center><h3 class="panel-title">THÔNG TIN YÊU CẦU BÁO CÁO</h3></center>
    <hr>
    <div class="form-group form-material" data-plugin="formMaterial">
      <label class="form-control-label" for="inputText">Tên yêu cầu báo cáo </label>
      <input type="text" class="form-control" id="inputText" disabled  value="{{$baocao->tieude}}" 
      />
    </div>
    <div class="form-group form-material" data-plugin="formMaterial">
      <label class="form-control-label" for="inputText">Thời hạn (Năm/ Tháng/ Ngày) </label>
      <input type="text" class="form-control" id="inputText" disabled  value="{{$baocao->thoihan}}" 
      />
    </div>
    <div class="form-group form-material" >
      <label class="form-control-label" >Tài liệu</label>
      @foreach($filebaocao as $file)
      <div class="row p-5">
        <p class=" col-lg-4">{{$file->name}}</p>
        <a style="color: #ffffff;" href="{{ route('files', $file->name) }}" class="btn btn-primary col-lg-1 m-3"><i class="icon md-download" aria-hidden="true"></i> Tải về</a>
        
      </div>
      @endforeach
    </div>
    <hr>
    <center><h3 class="panel-title">PHẦN NỘP BÁO CÁO</h3></center>
    <hr>
    @if($arr == [])
    <div class="form-group form-material" data-plugin="formMaterial">
      <label class="form-control-label" for="inputText">Tiêu đề </label>
      <input type="text" class="form-control" id="inputText" name="tenbaocao" placeholder="Tiêu đề báo cáo" value="" 
      />
    </div>
    <div class="form-group form-material" data-plugin="formMaterial">
      <label class="form-control-label" for="inputText">Nội dung</label>
      <textarea  style="height: 100px" class="form-control" name="noidung" id="noidung"></textarea>
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
    <div class="h-p15 w-p20 float-right">
      <button type="submit" class="btn btn-block btn-success waves-effect waves-classic ">Nộp</button>
    </div>
    @else
    @foreach($arr as $key => $a)
    <div class="form-group form-material" data-plugin="formMaterial">
      <label class="form-control-label" for="inputText">Tiêu đề </label>
      <input type="text" class="form-control" id="inputText" name="tenbaocao" placeholder="Tiêu đề báo cáo" value="{{ $a['baocao']['tieude']}}" disabled 
      />
    </div>
    <div class="form-group form-material" data-plugin="formMaterial">
      <label class="form-control-label" for="inputText">Nội dung</label>
      <textarea disabled class="form-control" name="noidung" id="noidung">{{ $a['baocao']['noidung']}}</textarea>
    </div>

    <div class="form-group form-material" >
      <label class="form-control-label" >Tài liệu</label>
      @foreach($a['filebaocao'] as $file)
      <div class="row p-5">
        <p class=" col-lg-4">{{$file->name}}</p>
        <a style="color: #ffffff;" href="{{ route('files', $file->name) }}" class="btn btn-primary col-lg-1 m-3"><i class="icon md-download" aria-hidden="true"></i> Tải về</a>
        {{--  <a style="color: #ffffff;" href="{{ route('deletefilecongvandi', $file->id) }}" class="btn btn-danger col-lg-1 m-3"><i class="icon md-delete " aria-hidden="true"></i> Xóa</a> --}}
      </div>
      @endforeach
    </div>

    {{-- <div class="row form-group ">
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
    </div> --}}

    <div class="h-p15 w-p20 float-right">
      <a href="{{ route('deletephbc', $a['baocao']['id']) }}" style="color: white"  class="btn btn-block btn-danger waves-effect waves-classic ">Xóa</a>
    </div>

    @endforeach
    @endif

    
  </form>
</div>

</div>

<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>

<script>
  CKEDITOR.replace('noidung');

</script>


@endsection