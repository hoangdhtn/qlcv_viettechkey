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
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">Công văn đi</h3>

        </header>
        <div class="panel-body">

          <table style="text-align: center;" class="table table-hover dataTable table-striped w-full" id="users-table">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Ngày gửi</th>
                <th>Người nhận</th>
                <th>Tổng lượt xem</th>
                <th>Phản hồi</th>
                <th>Thao tác</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>


<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
<script>

$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('dataCongVanDi') !!}',
 		language: {
            url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/vi.json'
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'congvan.tieude', name: 'tieude' },
            { data: 'congvan.noidung', name: 'congvan.noidung' },
            { data: 'congvan.created_at', name: 'congvan.created_at' },
            { data: 'nguoinhan', name: 'nguoinhan' },
            { data: 'tongluotxem', name: 'tongluotxem' },
            { data: 'tongluotphanhoi', name: 'tongluotphanhoi' },
            { data: 'action', name: 'action' },
        ],
        order:[[3, 'desc']],
    });



});


    
</script>


@endsection