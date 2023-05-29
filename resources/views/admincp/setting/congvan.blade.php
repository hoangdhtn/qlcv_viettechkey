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
                    <h3 class="panel-title">Cài đặt công văn</h3>
                </header>
                <form action="" method="post">
                    <div class="panel-body">
                        <table class="table table-hover" data-plugin="selectable" data-row-selectable="true">
                            <thead>
                                <tr>
                                    <th class="w-50">
                                        <span class="checkbox-custom checkbox-primary">
                                            <input class="selectable-all" type="checkbox" name='ckCv[]'>
                                            <label></label>
                                        </span>
                                    </th>
                                    <th>
                                        @sortablelink('id', 'ID')
                                    </th>
                                    <th>
                                        @sortablelink('id_nguoigui', 'Người gửi')
                                    </th>
                                    <th>
                                        @sortablelink('tieude', 'Tiêu đề')
                                    </th>
                                    <th>
                                        @sortablelink('created_at', 'Tạo ngày')
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
    
                                @foreach($congvans as $key => $congvan)
                                <tr>
                                    <td>
                                        <span class="checkbox-custom checkbox-primary">
                                            <input class="selectable-item" type="checkbox" id="row-619" value="{{ $congvan->id}}" name='ckCv[]'>
                                            <label for="row-619"></label>
                                        </span>
                                    </td>
                                    <td>{{ $congvan->id}}</td>
                                    <td>
                                        @foreach($users as $key => $u)
                                            @if($congvan->id_nguoigui == $u->id)
                                                {{$u->name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ $congvan->tieude}}
                                    </td>
                                    <td>
                                        {{ $congvan->created_at}}
                                    </td>
                                </tr>
                                @endforeach
    
                            </tbody>
                        </table>
                        {{ $congvans->render('layouts.pagination') }}
                    </div>
                </form>
                
            </div>
        </div>

    </div>
</div>


@endsection