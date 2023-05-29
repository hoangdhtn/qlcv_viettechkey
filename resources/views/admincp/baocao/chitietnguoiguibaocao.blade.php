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
      <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">Báo cáo đã nhận: {{$baocao->tieude}}</h3>

        </header>
        <div class="panel-body">
          <div class="form-group form-material" data-plugin="formMaterial">
            <label class="form-control-label" for="inputText">Người nộp</label>
            <input type="text" class="form-control" disabled id="inputText" name="tieude"  value="{{$nguoigui->name_dislay}}"
            />
          </div>
          <div class="form-group form-material" data-plugin="formMaterial">
            <label class="form-control-label" for="inputText">Tiêu đề</label>
            <input type="text" class="form-control" disabled id="inputText" name="tieude"  value="{{$baocao->tieude}}"
            />
          </div>
          <div class="form-group form-material" data-plugin="formMaterial">
            <label class="form-control-label" for="inputText">Ngày nộp</label>
            <input disabled type="text" class="form-control" id="inputText" name="ngaytao"  value="{{$baocao->created_at}}"
            />
          </div>
          <div class="form-group form-material" data-plugin="formMaterial">
            <label class="form-control-label" for="inputText">Nội dung</label>
            <textarea  style="height: 100px" class="form-control" disabled  name="noidung" id="noidung">{{$baocao->noidung}}</textarea>
          </div>
          <div class="form-group form-material" >
            <label class="form-control-label" >Tài liệu</label>
            @foreach($filebaocao as $file)
            <div class="row p-5">
              <p class=" col-lg-4">{{$file->name}}</p>
            </div>
            <a style="color: #ffffff;" href="{{ route('files', $file->name) }}" class="btn btn-primary"><i class="icon md-download" aria-hidden="true"></i> Tải về</a>
            <div style="margin: 10px;"></div>
            <a target="_blank" style="color: #ffffff;" href="{{ route('reviewfile', $file->name) }}" class="btn btn-success"><i class="icon md-eye" aria-hidden="true"></i> Xem file</a>
            <div style="margin: 10px;"></div>
            @endforeach
          </div>
    </div>
  </div>
  </form>
</div>

</div>
</div>


<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
<script>

// $(function() {
//     $('#users-table').DataTable({
//         processing: true,
//         serverSide: true,
//         ajax: '{!! route('datachitietbcnop', 6) !!}',
//     language: {
//             url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/vi.json'
//         },
//         columns: [
//             { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
//             { data: 'baocao.tieude', name: 'baocao.tieude' },
//             { data: 'baocao.noidung', name: 'baocao.noidung' },
//             { data: 'baocao.id_nguoigui', name: 'baocao.id_nguoigui' },
//             { data: 'baocao.created_at', name: 'baocao.created_at' },
//             { data: 'filebc', name: 'filebc' },
//             { data: 'action', name: 'action' },
//         ],
//         order:[[4, 'desc']],
//     });
// });
</script>


@endsection
