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
<div class="panel">
  <header class="panel-heading">
    <div class="panel-actions"></div>
    <h3 class="panel-title">Thêm công văn</h3>

  </header>
  <div class="panel-body">
    <form autocomplete="off" method="POST" action="{{ route('storecongvan') }}"  enctype="multipart/form-data">
      @method('POST')
      @csrf
      <div class="form-group form-material" data-plugin="formMaterial">
        <label class="form-control-label" for="inputText">Tiêu đề </label>
        <input type="text" class="form-control" id="inputText" name="tencongvan" placeholder="" value="" 
        />
      </div>
      <div class="form-group form-material" data-plugin="formMaterial">
        <label class="form-control-label" for="inputText">Nội dung</label>
        <textarea style="height: 100px" class="form-control " name="noidung" id="noidung"></textarea>
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
          <div class="float-left m-10">
            <a style="color: white;" class="btn btn-block btn-primary waves-effect waves-classic" id="ccc">Đóng tất cả</a>
          </div>
          <div class="float-left m-10">
            <a style="color: white;" class="btn btn-block btn-primary waves-effect waves-classic" id="ccc">Mở tất cả</a>
          </div>
          <div class="float-left m-10">
            <a style="color: white;" class="btn btn-block btn-primary waves-effect waves-classic" id="ccc">Chọn tất cả</a>
          </div>
          <div class="float-left m-10">
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
            </label> <ul>
                @foreach($all_users as $key => $user)
                  @if($user->name == $phongban->name && $user->user_id != Auth::id())

                    <li class="">
                      <input type="checkbox" name="friend[]" value="{{$user->user_id}}">
                      <label>{{$user->name_dislay}} </label>
                    </li>

                  @endif
                @endforeach
                 </ul>
          </li>
          @endforeach
            </ul>
      </div>

      <div class="h-p15 w-p20 float-right">
        <button type="submit" class="btn btn-block btn-success waves-effect waves-classic ">Gửi</button>
      </div>
    </form>
  </div>
  
</div>

<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>

<script>

</script>


@endsection
