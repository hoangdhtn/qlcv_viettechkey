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
       <div class="col-xl-12 col-lg-12">
            <div class="row">
              <div class="col-lg-6">
                <!-- Card -->
                <div style="margin-top: 0px;" class="card p-30 flex-row justify-content-between">
                  <div class="white">
                    <i class="icon icon-circle icon-2x md-assignment bg-red-600" aria-hidden="true"></i>
                  </div>
                  <div class="counter counter-md counter text-right">
                    <div class="counter-number-group">
                      <span class="counter-number">Có @php echo count($congvanchuaxem); @endphp công văn chưa xem</span>
                      <span class="counter-number-related text-capitalize"></span>
                    </div>
                    <a href="{{ route('congvan') }}" class="counter-label text-capitalize font-size-16">Xem ngay</a>
                  </div>
                </div>
                <!-- End Card -->
              </div>

              <div class="col-lg-6">
                <!-- Card -->
                <div style="margin-top: 0px;" class="card p-30 flex-row justify-content-between">
                  <div class="white">
                    <i class="icon icon-circle icon-2x md-assignment bg-red-600" aria-hidden="true"></i>
                  </div>
                  <div class="counter counter-md counter text-right">
                    <div class="counter-number-group">
                      <span class="counter-number">Có @php echo count($phanhoicongvancuatoi); @endphp phản hồi công văn chưa xử lý</span>
                      <span class="counter-number-related text-capitalize"></span>
                    </div>
                    <a href="{{ route('showcongvandi') }}" class="counter-label text-capitalize font-size-16">Xem ngay</a>
                  </div>
                </div>
                <!-- End Card -->
              </div>


               <div class="col-lg-6">
                <!-- Card -->
                <div style="margin-top: 0px;" class="card p-30 flex-row justify-content-between">
                  <div class="white">
                    <i class="icon icon-circle icon-2x md-assignment-alert bg-red-600" aria-hidden="true"></i>
                  </div>
                  <div class="counter counter-md counter text-right">
                    <div class="counter-number-group">
                      <span class="counter-number">Có @php echo count($baocaochuanop); @endphp báo cáo chưa nộp</span>
                      <span class="counter-number-related text-capitalize"></span>
                    </div>
                    <a href="{{ route('baocaochuanop') }}" class="counter-label text-capitalize font-size-16">Xem ngay</a>
                  </div>
                </div>
                <!-- End Card -->
              </div>


              {{--<div class="col-lg-6">
                <!-- Card -->
                <div  style="margin-top: 0px;" class="card p-30 flex-row justify-content-between">
                  <div class="counter counter-md text-left">
                    <div class="counter-number-group">
                      <span class="counter-number">42</span>
                      <span class="counter-number-related text-capitalize">people</span>
                    </div>
                    <div class="counter-label text-capitalize font-size-16">in room</div>
                  </div>
                  <div class="white">
                    <i class="icon icon-circle icon-2x md-accounts bg-blue-600" aria-hidden="true"></i>
                  </div>
                </div>
                <!-- End Card -->
              </div> --}}
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
//     language: {
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