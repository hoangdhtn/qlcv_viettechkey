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
          <div class="panel-body">
            <form autocomplete="off" method="POST" action="{{ route('users.update', $user->id) }}">
              @method('PUT')
              @csrf
                  <div class="form-group form-material" data-plugin="formMaterial">
                    <label class="form-control-label" for="inputText">Tên hiển thị</label>
                    <input type="text" class="form-control" id="inputText" name="namedislay" placeholder="Text" value="{{$user->name_dislay}}" 
                    />
                  </div>
                  <div class="form-group form-material" data-plugin="formMaterial">
                    <label class="form-control-label" for="inputText">Tên người dùng</label>
                    <input type="text" class="form-control" id="inputText" name="name" placeholder="Text" value="{{$user->name}}" 
                    />
                  </div>
                  <div class="form-group form-material" data-plugin="formMaterial">
                    <label class="form-control-label" for="inputText">Số điện thoại</label>
                    <input type="text" class="form-control" id="inputText" name="phone" placeholder="Số điện thoại" value="{{$user->phone}}" 
                    />
                  </div>
                  <div class="form-group form-material" data-plugin="formMaterial">
                    <label class="form-control-label" for="inputText">Tài khoản</label>
                    <input type="text" class="form-control" id="inputText" name="username" placeholder="Số điện thoại" value="{{$user->username}}" 
                    />
                  </div>
                  <div class="form-group form-material" data-plugin="formMaterial">
                    <label class="form-control-label" for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="{{$user->email}}"
                    />
                  </div>
                  
                  <div class="form-group form-material" data-plugin="formMaterial">
                    <label class="form-control-label" for="inputPassword">Password</label>
                    <input type="password" class="form-control" id="inputPassword" name="password" value="{{$user->password}}"
                      placeholder="Password" />
                  </div>
                  <div class="form-group form-material" data-plugin="formMaterial">
                    <!-- Example Multi-Select Public Methods -->
                    <label class="form-control-label" for="inputPassword">Phòng ban</label>
                    <div class="example">
                      <select class="multi-select-methods form-control " multiple="multiple" name="phongban[]">
                          @foreach($column_phongbans as $key => $phongban)
                          <option 
                            @foreach($pb_users as $key => $pbu)
                              @if($pbu->id == $phongban->id)
                                selected 
                              @endif
                            @endforeach
                           value="{{$phongban->id}}">+ {{$phongban->name}}</option>
                          @endforeach
                      </select>
                    </div>

                    <div>
                      <button class="btn btn-primary" id="buttonSelectAll" type="button">Chọn tất cả</button>
                      <button class="btn btn-primary" id="buttonDeselectAll" type="button">Bỏ chọn tất cả</button>
                      <button class="btn btn-primary" id="buttonRefresh" type="button">Làm mới</button>
                    </div>
                  </div>
                  <div class="form-group form-material" data-plugin="formMaterial">
                    <label class="form-control-label" for="inputPassword">Trạng thái tài khoản</label>
                    <ul class="list-unstyled example">
                      @if($user->enabled == 1)
                        <li class="mb-15">
                          <input type="radio" class="icheckbox-primary" id="inputRadiosUnchecked" name="enabled" value="1" 
                            data-plugin="iCheck" data-radio-class="iradio_flat-blue" checked
                          />
                          <label for="inputRadiosUnchecked">Hoạt động</label>
                        </li>
                        <li class="mb-15">
                          <input type="radio" class="icheckbox-primary" id="inputRadiosChecked" name="enabled" value="0" 
                            data-plugin="iCheck" data-radio-class="iradio_flat-blue"
                             />
                          <label for="inputRadiosChecked">Tạm khóa</label>
                        </li>
                      @else
                        <li class="mb-15">
                          <input type="radio" class="icheckbox-primary" id="inputRadiosUnchecked" name="enabled" value="1" 
                            data-plugin="iCheck" data-radio-class="iradio_flat-blue" 
                          />
                          <label for="inputRadiosUnchecked">Hoạt động</label>
                        </li>
                        <li class="mb-15">
                          <input type="radio" class="icheckbox-primary" id="inputRadiosChecked" name="enabled" value="0" 
                            data-plugin="iCheck" data-radio-class="iradio_flat-blue" checked
                             />
                          <label for="inputRadiosChecked">Tạm khóa</label>
                        </li>
                      @endif
                    </ul>
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

        <script src="//code.jquery.com/jquery-3.1.1.min.js"></script>




@endsection