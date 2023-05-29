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



    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <header class="panel-heading">
                    <div class="panel-actions"></div>
                    <h3 class="panel-title">Cài đặt</h3>

                </header>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-xl-2">
                            <button type="button"
                            class="btn btn-block btn-primary waves-effect waves-classic">Log hệ thống</button>
                        </div>
                        <div class="col-sm-12 col-md-4 col-xl-2">
                            <a href="{{route('congvansetting')}}"
                            class="btn btn-block btn-primary waves-effect waves-classic">Quản lý file công văn</a>
                        </div>
                        <div class="col-sm-12 col-md-4 col-xl-2">
                            <button type="button"
                            class="btn btn-block btn-primary waves-effect waves-classic">Quản lý file báo cáo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
{{-- <script>
    $(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('dataCongVanNhan') !!}',
 		language: {
            url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/vi.json'
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'tieude', name: 'tieude' },
            { data: 'noidung', name: 'noidung' },
            { data: 'nguoigui', name: 'nguoigui' },
            { data: 'created_at', name: 'created_at' },
            { data: 'trangthai', name: 'trangthai' },
            { data: 'action', name: 'action' },
        ],
        order:[[4, 'desc']],
    });
});
</script> --}}


@endsection