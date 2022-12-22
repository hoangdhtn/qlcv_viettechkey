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
            <h3 class="panel-title">Thông tin người dùng</h3>
          </header>
          <div class="panel-body container-fluid">
          	<form method="POST" action="{{ route('userinfo.update', $user->id) }}" autocomplete="off">
              @csrf
              @method('PUT')
          		<div class="form-group form-material" data-plugin="formMaterial">
                    <label class="form-control-label" for="inputText">Tên người dùng</label>
                    <input type="text" class="form-control" id="inputText" name="name" placeholder="Text" value="{{$user->name}}" 
                    />
                  </div>
                  
                  <div class="form-group form-material" data-plugin="formMaterial">
                    <label class="form-control-label" for="inputText">Tên hiển thị</label>
                    <input disabled type="text" class="form-control" id="inputText" name="namedislay" placeholder="Text" value="{{$user->name_dislay}}" 
                    />
                  </div>
                  <div class="form-group form-material" data-plugin="formMaterial">
                    <label class="form-control-label" for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="{{$user->email}}"
                    />
                  </div>
                  <div class="form-group form-material" data-plugin="formMaterial">
                    <label class="form-control-label" for="inputEmail">Tài khoản</label>
                    <input disabled type="text" class="form-control" id="inputEmail" name="username" placeholder="Email" value="{{$user->username}}"
                    />
                  </div>
                  <div class="form-group form-material" data-plugin="formMaterial">
                    <label class="form-control-label" for="inputPassword">Password</label>
                    <input type="password" class="form-control" id="inputPassword" name="password" value="{{$user->password}}"
                      placeholder="Password" />
                  </div>
                  {{-- <div class="form-group form-material" data-plugin="formMaterial">
                    <label class="form-control-label" for="inputFile">File</label>
                    <input type="text" class="form-control" placeholder="Browse.." readonly="" />
                    <input type="file" id="inputFile" name="inputFile" multiple="" />
                  </div> --}}
                  <div class="h-p15 w-p20 float-right">
                  	<button type="submit" class="btn btn-block btn-success waves-effect waves-classic ">Lưu</button>
                  </div>
          	</form>

         </div>
     </div>

@endsection