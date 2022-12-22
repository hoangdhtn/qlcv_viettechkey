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
  <button class="btn btn-block btn-success waves-effect waves-classic" data-target="#exampleFormModal" data-toggle="modal"
  type="button">Thêm người dùng mới</button>
</div>  
<!-- Modal -->
<div class="modal fade" id="exampleFormModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
role="dialog" tabindex="-1">
<div class="modal-dialog modal-simple">
  <form method="POST" action="{{route('users.store')}}" class="modal-content">
    @method('POST')
    @csrf
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <h4 class="modal-title" id="exampleFormModalLabel">Tạo tài khoản mới</h4>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="col-xl-12 form-group">
          <input type="text" class="form-control" name="namedislay" placeholder="Tên hiển thị">
        </div>
        <div class="col-xl-12 form-group">
          <input type="text" class="form-control" name="name" placeholder="Tên người dùng">
        </div>
        <div class="col-xl-12 form-group">
          <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="col-xl-12 form-group">
          <input type="text" class="form-control" name="username" placeholder="Tài khoản">
        </div>
        <div class="col-xl-12 form-group">
          <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
        </div>
        <div class="col-xl-12 form-group">
          <input type="text" class="form-control" name="phone" placeholder="Số điện thoại">
        </div>
        <div class="col-xl-12 form-group ">
          <!-- Example Multi-Select Public Methods -->
          <h4 class="example-title">Phòng ban</h4>
          <div class="example">
            <select class="multi-select-methods form-control " multiple="multiple" name="phongban[]">
                @foreach($column_phongbans as $key => $phongban)
                <option value="{{$phongban->id}}">+ {{$phongban->name}}</option>
                @endforeach
            </select>
          </div>

          <div>
            <button class="btn btn-primary" id="buttonSelectAll" type="button">Chọn tất cả</button>
            <button class="btn btn-primary" id="buttonDeselectAll" type="button">Bỏ chọn tất cả</button>
            <button class="btn btn-primary" id="buttonRefresh" type="button">Làm mới</button>
          </div>
        </div>
        <div class="col-xl-12 form-group">
          <!-- Example Color -->
          <h4 class="example-title">Chọn quyền cho người dùng</h4>
          <div class="example">
            <div class="select2-primary">
              <select class="form-control" multiple="multiple" data-plugin="select2" name="role[]">
                @foreach($column_roles as $key => $role)
                <option value="{{$role->id}}" >{{$role->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <!-- End Example Color -->
        </div>

        <div class="col-xl-12 form-group">
          <h4 class="example-title">Trạng thái tài khoản</h4>
          <ul class="list-unstyled example">
            <li class="mb-15">
              <input type="radio" class="icheckbox-primary" id="inputRadiosUnchecked" value="1" name="enabled"
              data-plugin="iCheck" data-radio-class="iradio_flat-blue" checked
              />
              <label for="inputRadiosUnchecked">Hoạt động</label>
            </li>
            <li class="mb-15">
              <input type="radio" class="icheckbox-primary" id="inputRadiosChecked" value="0" name="enabled"
              data-plugin="iCheck" data-radio-class="iradio_flat-blue"
              />
              <label for="inputRadiosChecked">Khóa</label>
            </li>
          </ul>
        </div>

        <div class="col-md-12 float-left">
          <button class="btn btn-success float-right" type="submit">Tạo mới</button>
        </div>
      </div>
    </div>
  </form>
</div>
</div>
<!-- End Modal -->
<div class="panel">
  <header class="panel-heading">
    <div class="panel-actions"></div>
    <h3 class="panel-title">Danh sách người dùng</h3>

  </header>
  <div class="panel-body">

    <table class="table table-hover dataTable table-striped w-full" id="users-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tên hiển thị</th>
          <th>Tên người dùng</th>
          {{-- <th>Tài khoản</th> --}}
          <th>Email</th>
          <th>Điện thoại</th>
          <th>Ngày tạo</th>
          <th>Ngày cập nhật</th>
          <th>Trạng thái tài khoản</th>
          <th>Quyền</th>
          <th>Thao tác</th>
        </tr>
        </thead>
              {{-- <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Office</th>
                  <th>Created At</th>
                <th>Updated At</th>
                </tr>
              </tfoot> --}}
              {{-- <tbody>
                <tr>
                  <td>Damon</td>
                  <td>5516 Adolfo Green</td>
                  <td>Littelhaven</td>
                  <td>85</td>
                  <td>2014/06/13</td>
                  <td>$553,536</td>
                </tr>
              </tbody> --}}
            </table>
          </div>
        </div>

        <script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
        <script>

          $(function() {
            $('#users-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{!! route('usersData') !!}',
              language: {
                url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/vi.json'
              },
              columns: [
              { data: 'id', name: 'id' },
              { data: 'name_dislay', name: 'name_dislay' },
              { data: 'name', name: 'name' },
              // { data: 'username', name: 'username' },
              { data: 'email', name: 'email' },
              { data: 'phone', name: 'phone' },
              { data: 'created_at', name: 'created_at' },
              { data: 'updated_at', name: 'updated_at' },
              { data: 'enabled', name: 'enabled' },
              { data: 'role', name: 'role' },
              { data: 'action', name: 'action' },
              ]
            });
          });
        </script>


        @endsection