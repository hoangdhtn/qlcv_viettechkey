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
            <h3 class="panel-title">Chỉnh sửa thông tin phòng ban</h3>

          </header>
          <div class="panel-body">
            <form autocomplete="off" method="POST" action="{{ route('updatephongban', $pb->id) }}">
              @method('PUT')
              @csrf
                  <div class="form-group form-material" data-plugin="formMaterial">
                    <label class="form-control-label" for="inputText">Tên phòng ban</label>
                    <input type="text" class="form-control" id="inputText" name="name" placeholder="Tên phòng ban" value="{{$pb->name}}" 
                    />
                  </div>
                  <div class="form-group form-material" data-plugin="formMaterial">
                    <label class="form-control-label" for="inputText">Mô tả phòng ban</label>
                    <input type="text" class="form-control" id="inputText" name="description" placeholder="Mô tả" value="{{$pb->description}}" 
                    />
                  </div>
                  <div class="h-p15 w-p20 float-right">
                    <button type="submit" class="btn btn-block btn-success waves-effect waves-classic ">Lưu</button>
                  </div>
            </form>
          </div>
  
        </div>

        <script src="//code.jquery.com/jquery-3.1.1.min.js"></script>




@endsection