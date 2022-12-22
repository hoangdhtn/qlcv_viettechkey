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
    <a href="{{ route('addbaocao') }}" class="btn btn-block btn-success waves-effect waves-classic">Tạo báo cáo</a>
  </div> 
  
  <div class="h-p20 w-p20 float-right m-10">
    <a href="{{ route('myycbaocao') }}" class="btn btn-block btn-info waves-effect waves-classic">Danh sách yêu cầu báo cáo của tôi</a>
  </div> 
  <div class="h-p20 w-p20 float-right m-10">
    <a href="{{ route('baocaodanop') }}" class="btn btn-block btn-info waves-effect waves-classic">Báo cáo đã nộp</a>
  </div> 
  <div class="h-p20 w-p20 float-right m-10">
    <a href="{{ route('baocaochuanop') }}" class="btn btn-block btn-info waves-effect waves-classic">Báo cáo chưa nộp</a>
  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">Danh sách báo cáo chưa nộp</h3>

        </header>
        <div class="panel-body">

          <table class="table table-hover dataTable table-striped w-full" id="users-table">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Người gửi</th>
                <th>Ngày nhận được</th>
                <th>Thời hạn</th>
                <th>Trạng thái</th>
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
      ajax: '{!! route('dataBaoCaoChuaNop') !!}',
      language: {
        url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/vi.json'
      },
      columns: [
      { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
      { data: 'tieude', name: 'tieude' },
      { data: 'noidung', name: 'noidung' },
      { data: 'name_dislay', name: 'name_dislay' },
      { data: 'created_at', name: 'created_at' },
      { data: 'thoihan', name: 'thoihan' },
      { data: 'trangthai', name: 'trangthai' },
      { data: 'action', name: 'action' },
      ],
      order:[[4, 'desc']],
    });
  });
</script>


@endsection 