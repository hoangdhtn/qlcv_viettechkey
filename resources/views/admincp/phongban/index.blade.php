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
                  @if(auth()->user()->can('add phongban'))
            <div class="h-p20 w-p20 float-right m-10">
              <button class="btn btn-block btn-success waves-effect waves-classic" data-target="#exampleFormModal" data-toggle="modal"
              type="button">Thêm phòng ban mới</button>
            </div> 
            <!-- Modal -->
            <div class="modal fade" id="exampleFormModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
        role="dialog" tabindex="-1">
        <div class="modal-dialog modal-simple">
          <form method="POST" action="{{ route('addphongban') }}" class="modal-content">
            @method('POST')
            @csrf
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="exampleFormModalLabel">Tạo phòng ban mới</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-xl-12 form-group">
                  <input type="text" class="form-control" name="name" placeholder="Tên phòng ban">
                </div>
                <div class="col-xl-12 form-group">
                  <input type="text" class="form-control" name="description" placeholder="Mô tả phòng ban">
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
            @endif
    
        <div class="panel">
          <header class="panel-heading">
            <div class="panel-actions"></div>
            <h3 class="panel-title">Danh sách phòng ban</h3>

          </header>
          <div class="panel-body">

            <table class="table table-hover dataTable table-striped w-full" id="users-table">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Phòng ban</th>
                  <th>Mô tả</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>

        <script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
<script>

$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('phongbansData') !!}',
 		language: {
            url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/vi.json'
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'description', name: 'description' },
            { data: 'action', name: 'action' },
        ]
    });
});
</script>


@endsection