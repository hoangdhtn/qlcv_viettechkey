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
          <h3 class="panel-title">Chi tiết công văn: {{$congvan->tieude}}</h3>

        </header>
        <div class="panel-body">
          <div class="form-group form-material" data-plugin="formMaterial">
            <label class="form-control-label" for="inputText">Tiêu đề</label>
            <input type="text" class="form-control" id="inputText" name="tieude" disabled value="{{$congvan->tieude}}"
            />
          </div>
          <div class="form-group form-material" data-plugin="formMaterial">
            <label class="form-control-label" for="inputText">Người gửi</label>
            <input type="text" class="form-control" id="inputText" name="nguoigui" disabled value="{{$nguoigui->name_dislay}}"
            />
          </div>
          <div class="form-group form-material" data-plugin="formMaterial">
            <label class="form-control-label" for="inputText">Ngày nhận được</label>
            <input type="text" class="form-control" id="inputText" name="ngaynhanduoc" disabled value="{{$ngaynhan}}"
            />
          </div>
          <div class="form-group form-material" data-plugin="formMaterial">
            <label class="form-control-label" for="inputText">Nội dung</label>
            <textarea style="height: 100px" class="form-control " name="noidung" id="noidung" disabled>{{$congvan->noidung}}</textarea>
          </div>
          <div class="form-group form-material" >
            <label class="form-control-label" >Tài liệu</label>
            @foreach($filecongvan as $file)
            <div class="row p-12">
              <p class=" col-lg-4">{{$file->name}}</p>
              <br/>

            </div>
            <a style="color: #ffffff;" href="{{ route('files', $file->name) }}" class="btn btn-primary"><i class="icon md-download" aria-hidden="true"></i> Tải về</a>
            <div style="margin: 10px;"></div>
            <a target="_blank" style="color: #ffffff;" href="{{ route('reviewfile', $file->name) }}" class="btn btn-success"><i class="icon md-eye" aria-hidden="true"></i> Xem file</a>
            <div style="margin: 10px;"></div>
           {{-- <embed src="{{ storage_path() .'/files/'. $file->name }}" width="600" height="500" alt="pdf" /> --}}
            {{-- <iframe src='https://docs.google.com/gview?url={{ storage_path() .'/files/'. $file->name }}&embedded=true' width='1366px' height='623px' frameborder='0'>This is an embedded <a target='_blank' href='http://office.com'>Microsoft Office</a> document, powered by <a target='_blank' href='http://office.com/webapps'>Office Online</a>.</iframe> --}}


            @endforeach
          </div>
          <div class="form-group form-material" data-plugin="formMaterial">
            <label class="form-control-label" for="inputText">Phản hồi của bạn</label>
            @foreach($phanhoi as $key => $ph)

            <div class="comment media">
              <div class="comment-body media-body">
                <a class="comment-author" href="javascript:void(0)">@php echo $ph->noidung; @endphp</a>
                <div class="comment-meta">
                  Trạng thái: 
                  @if($ph->trangthai == 1)
                  <span class="badge badge-success">
                    Đã được xử lý
                  </span>
                  @else
                  <span class="badge badge-danger">
                    Chưa được xử lý
                  </span>
                  @endif
                </div>
              </div>
            </div>

            @endforeach
            <button class="btn btn-block btn-primary waves-effect waves-classic" data-target="#exampleFormModal" data-toggle="modal"
            type="button">Phản hồi công văn</button>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="exampleFormModal" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
          role="dialog" tabindex="-1">
          <div class="modal-dialog modal-simple">
            <form method="POST" action="{{ route('phanhoicongvan', $congvan->id) }}" class="modal-content">
              @method('POST')
              @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="exampleFormModalLabel">Phản hồi công văn</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-xl-12 form-group">
                    <textarea  style="height: 100px" type="text" id="noidung" class="form-control" name="noidungphanhoi" placeholder="Nội dung phản hồi"> </textarea>
                  </div>
                  <div class="col-md-12 float-left">
                    <button class="btn btn-primary float-right" type="submit">Gửi</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- End Modal -->
      </div>
    </div>
  </div>

</div>
</div>


<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>

<script>

// $(function() {
//     $('#users-table').DataTable({
//         processing: true,
//         serverSide: true,
//         ajax: '{!! route('dataCongVanNhan') !!}',
//  		language: {
//             url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/vi.json'
//         },
//         columns: [
//             { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
//             { data: 'tieude', name: 'tieude' },
//             { data: 'noidung', name: 'noidung' },
//             { data: 'nguoigui', name: 'nguoigui' },
//             { data: 'created_at', name: 'created_at' },
//             { data: 'trangthai', name: 'trangthai' },
//             { data: 'action', name: 'action' },
//         ],
//         order:[[4, 'desc']],
//     });
// });
</script>


@endsection
