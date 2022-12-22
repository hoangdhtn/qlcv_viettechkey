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
              <a href="{{route('addrole')}}" class="btn btn-block btn-success waves-effect waves-classic">Thêm vai trò</a>
            </div>  
    
        <div class="panel">
          <header class="panel-heading">
            <div class="panel-actions"></div>
            <h3 class="panel-title">Danh sách vai trò</h3>

          </header>
          <div class="panel-body">

            <table class="table table-hover dataTable table-striped w-full" id="users-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên</th>
                  <th>Ngày tạo</th>
                	<th>Ngày cập nhật</th>
                  <th>Quyền</th>
                  <th>Thao tác</th>
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
        ajax: '{!! route('rolesData') !!}',
 		language: {
            url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/vi.json'
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'per', name: 'per' },
            { data: 'action', name: 'action' },
        ]
    });
});
</script>


@endsection