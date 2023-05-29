<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

use App\Models\PhongBans;
use App\Models\BaoCao;
use App\Models\FileBaoCao;
use App\Models\NguoiNhanBaoCao;
use App\Models\PhanHoiBaoCao;
use App\Models\FilePhanHoiBaoCao;
use App\Models\User;
use DB;

class BaoCaoController extends Controller
{
    public function __construct(){
        $this->middleware(['permission:add baocao| edit baocao | delete baocao ']);
        // theo per
        // $this->middleware('permission:add user', ['only' => ['create', 'store']]);
    }

    //
    public function index(){

        return view('admincp.baocao.index');
    }

    // Trang yêu cầu cáo
    public function add(){
        $all_users = DB::table('users')
        ->join('phongban_user', 'phongban_user.user_id', '=', 'users.id')
        ->join('phongbans', 'phongbans.id', '=', 'phongban_user.phongban_id')
        ->get();

        $phongbans = PhongBans::all();

        return view('admincp.baocao.add')->with(compact([
            'all_users',
            'phongbans',
        ]));
    }

    // Lưu báo cáo
    public function store(Request $request){
        //zip 7z tar gz bz rar doc docx bmp png jpeg jpg pdf pps ppsx ppt pptx txt wav xls xml xlsm xlsx
        $data = $request->validate([
            'tenbaocao' => 'required',
            'noidung' => 'required',
            'date' => 'required',
            'file.*' => 'nullable|mimes:zip,7z,tar,gz,bz,rar,doc,docx,bmp,png,jpeg,jpg,pdf,pps,ppt,pptx,txt,wav,xls,xml,xlsm, xlsx',
            'friend' => 'required',
        ], [
            'tenbaocao.required' => 'Yêu cầu có tên công văn',
            'noidung.required' => 'Yêu cầu có nội dung',
            'date.required' => 'Yêu cầu thời hạn',
            'file.*.mimes' => 'File không đúng định dạng cho phép',
            'friend.required' => 'Yêu cầu có phòng ban được nhận',
        ]); 

        try {
            // Xử lý tạo thư mục chứa file upload
            if (! File::exists(public_path('files'))) {
                File::makeDirectory(public_path('files'));
            }
            
            // Xử lý file upload
            $arrFile = [];
            
            if(isset($data['file'])){
                //dd($data['file']);
                foreach($data['file'] as $key => $file)
                {
                    $path = $file->store('public/files');
                    $name = time().'-'. trim($file->getClientOriginalName());
                    $file->move('public/files', $name);


                    array_push($arrFile, $name);

                }
            }

            $baocao = new BaoCao();
            $baocao->id_nguoigui = auth()->user()->id;
            $baocao->tieude = $data['tenbaocao'];
            $baocao->noidung = $data['noidung'];
            $baocao->thoihan = $data['date'];
            $baocao->save();

            // Xử lý đối tượng file công văn
            $filebc = [];

            foreach($arrFile as $key => $fbc){
                $ff = new FileBaoCao();
                $ff->id_baocao = $baocao->id;
                $ff->name = $fbc;
                array_push($filebc, $ff);
            }

            // Xử lý đối tượng người nhận công văn
            $arrFr = [];

            foreach($data['friend'] as $key => $fr){
                $frbc = new NguoiNhanBaoCao();
                $frbc->id_baocao = $baocao->id;
                $frbc->id_nguoinhan = $fr;
                $frbc->trangthai = 0;
                array_push($arrFr, $frbc);
            }


            $baocao->filebaocao()->saveMany($filebc);
            $baocao->nguoinhanbaocao()->saveMany($arrFr);

            return redirect()->back()->with('success', 'Gửi thành công');
        } catch (Exception $e) {
            return redirect()->back()->with('success', 'Gửi thất bại');
        }

        return redirect()->back();
    }

    // Báo cáo đã nhận
    public function dataYcBaoCaoDaNhan(){
       $all_bc = DB::table('nguoinhanbaocao')
       ->join('baocao', 'nguoinhanbaocao.id_baocao', '=', 'baocao.id')
       ->join('users', 'baocao.id_nguoigui', '=', 'users.id')
       ->where('nguoinhanbaocao.id_nguoinhan', '=', auth()->user()->id)
       ->select('baocao.tieude', 'baocao.noidung', 'users.name_dislay', 'baocao.created_at','baocao.thoihan', 'nguoinhanbaocao.trangthai', 'baocao.id')
       ->get();

        //dd($all_bc);

       return Datatables::of($all_bc)
           ->addIndexColumn()
           ->addColumn('action', function ($all_bc) {
            return '<a href="'.  route('nopbaocao', $all_bc->id) .'" class="btn btn-success m-3"><i class="icon md-eye" aria-hidden="true"></i>Chi tiết</a>
            ';

        })->editColumn('noidung', function ($all_bc) {
            if(strlen($all_bc->noidung) > 30){
                return substr($all_bc->noidung, 0,20) . '...';
            }
            return $all_bc->noidung;
        })->editColumn('tieude', function ($all_bc) {
            if(strlen($all_bc->tieude) > 30){
                return substr($all_bc->tieude, 0,20) . '...';
            }
            return $all_bc->tieude;
        })->editColumn('created_at', function ($all_bc) {
            $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $all_bc->created_at)->format('d/m/Y'); 
            return $formatedDate;
        })->editColumn('thoihan', function ($all_bc) {
            $formatedDate = Carbon::createFromFormat('Y-m-d', $all_bc->thoihan)->format('d/m/Y'); 
            return $formatedDate;
        })->editColumn('trangthai', function ($all_bc) {
            $ena = $all_bc->trangthai;
            if($ena == 1){
                return '<span class="badge badge-success"> Đã nộp</span> ';
            }else{
                return '<span class="badge badge-danger"> Chưa nộp</span> ';
            }
        })->rawColumns(['trangthai','noidung','created_at','action','thoihan'])->make(true);
    }


    public function nopBaoCao($id_baobao){
        $baocao = BaoCao::find($id_baobao);


         $filebaocao = $baocao->filebaocao()->get();
        //dd($filebaocao);

        $arr = [];
        if(count($baocao->phanhoibaocao()->get()) > 0){
            $phbc = $baocao->phanhoibaocao()->oldest()->first();
            $filePhbc = $phbc->filephanhoibaocao()->get();
            $a = array(
                'baocao' => $phbc,
                'filebaocao' => $filePhbc,
            );
            array_push($arr, $a);
        }

        return view('admincp.baocao.nopbaocao')->with(compact([
            'baocao',
            'arr',
            'filebaocao',
        ]));
    }

    public function storeNopBaoCao(Request $request, $id_baocao){
            //zip 7z tar gz bz rar doc docx bmp png jpeg jpg pdf pps ppsx ppt pptx txt wav xls xml xlsm xlsx
        $data = $request->validate([
            'tenbaocao' => 'required',
            'noidung' => 'required',
            'file.*' => 'nullable|mimes:zip,7z,tar,gz,bz,rar,doc,docx,bmp,png,jpeg,jpg,pdf,pps,ppt,pptx,txt,wav,xls,xml,xlsm, xlsx',
        ], [
            'tenbaocao.required' => 'Yêu cầu có tên công văn',
            'noidung.required' => 'Yêu cầu có nội dung',
            'file.*.mimes' => 'File không đúng định dạng cho phép',
        ]); 

        try {
            $baocao = BaoCao::find($id_baocao);

            if(count($baocao->phanhoibaocao()->get()) <= 0){

                // Xử lý tạo thư mục chứa file upload
                if (! File::exists(public_path('files'))) {
                    File::makeDirectory(public_path('files'));
                }
                
                // Xử lý file upload
                $arrFile = [];
                
                if(isset($data['file'])){
                    //dd($data['file']);
                    foreach($data['file'] as $key => $file)
                    {
                        $path = $file->store('public/files');
                        $name = time().'-'. trim($file->getClientOriginalName());
                        $file->move('public/files', $name);


                        array_push($arrFile, $name);

                    }
                }
                $arrPhanHoi = [];

                $phbaocao = new PhanHoiBaoCao();
                $phbaocao->id_nguoigui = auth()->user()->id;
                $phbaocao->id_baocao = $id_baocao;
                $phbaocao->tieude = $data['tenbaocao'];
                $phbaocao->noidung = $data['noidung'];
                $phbaocao->trangthai = 0;
                array_push($arrPhanHoi, $phbaocao);

                $baocao->phanhoibaocao()->saveMany($arrPhanHoi);

                // Xử lý đối tượng file báo cáo
                $filebc = [];

                foreach($arrFile as $key => $fbc){
                    $ff = new FilePhanHoiBaoCao();
                    $ff->id_phanhoibaocao = $phbaocao->id;
                    $ff->name = $fbc;
                    array_push($filebc, $ff);
                }

                $getphbaocao = $baocao->phanhoibaocao()->oldest()->first();
             
                $phbcfile = PhanHoiBaoCao::find($getphbaocao);

                $getphbaocao->filephanhoibaocao()->saveMany($filebc);

                $nguoinhanbaocao  = NguoiNhanBaoCao::where('id_nguoinhan', '=', auth()->user()->id)->first();
                $nguoinhanbaocao->trangthai = 1;
                $nguoinhanbaocao->update();

                return redirect()->back()->with('success', 'Nộp thành công');
            }else{
                return redirect()->back()->with('fail', 'Bạn đã nộp báo cáo rồi');
            }

           
        } catch (Exception $e) {
            return redirect()->back()->with('fail', 'Nộp thất bại');
        }

        return redirect()->back();
    }

    // Xóa phản hồi báo cáo
    public function deletePhanHoiBaoCao($id_phbaocao){

        try {
            $phbaocao = PhanHoiBaoCao::find($id_phbaocao);



            if($phbaocao->id_nguoigui == auth()->user()->id){

                $filebaocao = $phbaocao->filephanhoibaocao()->get();

                // Xóa file
                foreach ($filebaocao as $key => $cv) {
                    unlink(public_path('files/'.$cv->name));

                    $fcv = FilePhanHoiBaoCao::find($cv->id);
                    $fcv->delete();
                }

                $phbaocao->filephanhoibaocao()->delete();
                $phbaocao->delete();

                $nguoinhanbaocao  = NguoiNhanBaoCao::where('id_nguoinhan', '=', auth()->user()->id)->first();
                $nguoinhanbaocao->trangthai = 0;
                $nguoinhanbaocao->update();

                return redirect()->back()->with('success', 'Xóa thành công');
            }else{
                return abort(404);
            }

        } catch (Exception $e) {
            return redirect()->back()->with('success', 'Xóa thất bại');
        }
    }

    // YC Báo cáo của tôi
    public function myYcBaoCao(){

        return view('admincp.baocao.myycbaocao');
    }

    // Data YC báo cáo
    public function DatamyYcBaoCao(){

        $baocaos = BaoCao::where('id_nguoigui', '=', auth()->user()->id)->get();




        //dd($baocaos);


        return Datatables::of($baocaos)
       ->addIndexColumn()
       ->addColumn('action', function ($baocaos) {
        return '<a href="'.  route('xemmyycbaocao', $baocaos->id) .'" class="btn btn-success m-3"><i class="icon md-eye" aria-hidden="true"></i>Chi tiết</a>
        ';

        })->editColumn('noidung', function ($baocaos) {
            if(strlen($baocaos->noidung) > 30){
                return substr($baocaos->noidung, 0,20) . '...';
            }
            return $baocaos->noidung;
        })->editColumn('tieude', function ($baocaos) {
            if(strlen($baocaos->tieude) > 30){
                return substr($baocaos->tieude, 0,20) . '...';
            }
            return $baocaos->tieude;
        })->editColumn('created_at', function ($baocaos) {
            $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $baocaos->created_at)->format('d/m/Y'); 
            return $formatedDate;
        })->editColumn('thoihan', function ($baocaos) {
            $formatedDate = Carbon::createFromFormat('Y-m-d', $baocaos->thoihan)->format('d/m/Y'); 
            return $formatedDate;
        })->rawColumns(['noidung','created_at','action','thoihan'])->make(true);
    }

    // Xem chi tiết yêu cầu báo cáo của tôi
    public function xemMyYCBaobao($id){
        $baocao = BaoCao::find($id);

        if($baocao->id_nguoigui == auth()->user()->id){
            $phanhoi = $baocao->phanhoibaocao()->get();
            
            

            $filebaocao = Baocao::find($id)->filebaocao()->get();



            $phongbans = PhongBans::all();



            $ngaynhan =  Carbon::createFromFormat('Y-m-d H:i:s', $baocao->created_at)->format('d/m/Y');

            

            $all_users = DB::table('users')
            ->join('phongban_user', 'phongban_user.user_id', '=', 'users.id')
            ->join('phongbans', 'phongbans.id', '=', 'phongban_user.phongban_id')
            ->get();



            $nguoinhanbaocao = NguoiNhanBaoCao::where('id_baocao', '=', $id)->get();

            //  dd($nguoinhanbaocao);

            return view('admincp.baocao.showmyycbaocao')->with(compact([
                'baocao',
                'filebaocao',
                'ngaynhan',
                'phanhoi',
                'phongbans',
                'all_users',
                'nguoinhanbaocao',
            ]));
        }else{
            return abort(404);
        }
    }

    public function dataChitietBCNop($id){
        
        $arrKQ = [];

        $check = BaoCao::find($id);
        if($check->id_nguoigui == auth()->user()->id){
            $phanhoibaocao = BaoCao::find($id)->phanhoibaocao()->get();

            foreach($phanhoibaocao as $key => $ph){
                $filebc = FilePhanHoiBaoCao::where('id_phanhoibaocao', '=', $ph->id)->first();
                $arr = array(
                    'baocao' => $ph,
                    'filebc' => $filebc,
                );

                array_push($arrKQ, $arr);
            }

            //dd($arrKQ);


            return Datatables::of($arrKQ)
           ->addIndexColumn()
           ->addColumn('action', function ($arrKQ) {
            return '<a href="'.  route('showchitietdanhanbaoCao', $arrKQ['baocao']['id']) .'" class="btn btn-success m-3"><i class="icon md-eye" aria-hidden="true"></i>Chi tiết</a>
            ';

            })->editColumn('baocao.noidung', function ($arrKQ) {
                if(strlen($arrKQ['baocao']['noidung']) > 30){
                    return substr($arrKQ['baocao']['noidung'], 0,20) . '...';
                }
                return $arrKQ['baocao']['noidung'];
            })->editColumn('baocao.tieude', function ($arrKQ) {
                if(strlen($arrKQ['baocao']['tieude']) > 30){
                    return substr($arrKQ['baocao']['tieude'], 0,20) . '...';
                }
                return $arrKQ['baocao']['tieude'];
            })->editColumn('baocao.created_at', function ($arrKQ) {
                $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $arrKQ['baocao']['created_at'])->format('d/m/Y'); 
                return $formatedDate;
            })->editColumn('baocao.id_nguoigui', function ($arrKQ) {
                $name = User::find($arrKQ['baocao']['id_nguoigui']);

                return $name->name_dislay;
            })->editColumn('filebc', function ($arrKQ) {
                
                if($arrKQ['filebc']){
                    $text = '<a style="color: #ffffff;" href="'.route('files', $arrKQ['filebc']['name']) . '" class="btn btn-primary m-3"> Tải về</a>';
                }else{
                    $text = '';
                }
                return $text;
            })->rawColumns(['action','baocao.noidung','baocao.tieude', 'baocao.created_at', 'baocao.id_nguoigui', 'filebc'])->make(true);
       }else{   
         return abort(404);
       }
    }


    public function showChiTietDaNhanBaoCao($id){
        $baocao = PhanHoiBaoCao::find($id);


        $filebaocao = $baocao->filephanhoibaocao()->get();

        $nguoigui = User::find($baocao->id_nguoigui);

        // dd($filebaocao);

        return view('admincp.baocao.chitietnguoiguibaocao')->with(compact(['baocao', 'filebaocao', 'nguoigui']));
    }


    public function deleteYCBaoCao($id){
            $bcdelete = BaoCao::find($id);

        if($bcdelete->id_nguoigui == auth()->user()->id){
            // Xóa file
            $filebc = $bcdelete->filebaocao()->get();
            foreach ($filebc as $key => $cv) {
                unlink(storage_path('files/'.$cv->name));

                $fcv = FileBaoCao::find($cv->id);
                $fcv->delete();
            }

            $phbc = $bcdelete->phanhoibaocao()->get();

            foreach ($phbc as $key => $a) {
                $file = $a->filephanhoibaocao()->first();
                unlink(storage_path('files/'.$file->name));

                $fcv = FilePhanHoiBaoCao::find($file->id);
                $fcv->delete();
            }

            $bcdelete->filebaocao()->delete();
            $bcdelete->nguoinhanbaocao()->delete();
            $bcdelete->phanhoibaocao()->delete();
            $bcdelete->delete();

            return view('admincp.baocao.myycbaocao')->with('success', 'Xóa thành công');
        }else{
            return abort(404);
        }
        return redirect()->back()->with('fail', 'Xóa thất bại');
    }


    // Danh sách báo cáo đã nộp
    public function baoCaoDaNop(){
        return view('admincp.baocao.dsbaocaodanop');
    }

    // Data báo cáo đã nộp
    public function dataBaoCaoDaNop(){
       $all_bc = DB::table('nguoinhanbaocao')
       ->join('baocao', 'nguoinhanbaocao.id_baocao', '=', 'baocao.id')
       ->join('users', 'baocao.id_nguoigui', '=', 'users.id')
       ->where('nguoinhanbaocao.id_nguoinhan', '=', auth()->user()->id)
       ->where('nguoinhanbaocao.trangthai', '=', 1)
       ->select('baocao.tieude', 'baocao.noidung', 'users.name_dislay', 'baocao.created_at','baocao.thoihan', 'nguoinhanbaocao.trangthai', 'baocao.id')
       ->get();

        //dd($all_bc);

       return Datatables::of($all_bc)
           ->addIndexColumn()
           ->addColumn('action', function ($all_bc) {
            return '<a href="'.  route('nopbaocao', $all_bc->id) .'" class="btn btn-success m-3"><i class="icon md-eye" aria-hidden="true"></i>Chi tiết</a>
            ';

        })->editColumn('noidung', function ($all_bc) {
            if(strlen($all_bc->noidung) > 30){
                return substr($all_bc->noidung, 0,20) . '...';
            }
            return $all_bc->noidung;
        })->editColumn('tieude', function ($all_bc) {
            if(strlen($all_bc->tieude) > 30){
                return substr($all_bc->tieude, 0,20) . '...';
            }
            return $all_bc->tieude;
        })->editColumn('created_at', function ($all_bc) {
            $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $all_bc->created_at)->format('d/m/Y'); 
            return $formatedDate;
        })->editColumn('thoihan', function ($all_bc) {
            $formatedDate = Carbon::createFromFormat('Y-m-d', $all_bc->thoihan)->format('d/m/Y'); 
            return $formatedDate;
        })->editColumn('trangthai', function ($all_bc) {
            $ena = $all_bc->trangthai;
            if($ena == 1){
                return '<span class="badge badge-success"> Đã nộp</span> ';
            }else{
                return '<span class="badge badge-danger"> Chưa nộp</span> ';
            }
        })->rawColumns(['trangthai','noidung','created_at','action','thoihan'])->make(true);
    }

    // Danh sách báo cáo đã nộp
    public function baoCaoChuaNop(){
        return view('admincp.baocao.dsbaocaochuanop');
    }

    // Data báo cáo đã nộp
    public function dataBaoCaoChuaNop(){
       $all_bc = DB::table('nguoinhanbaocao')
       ->join('baocao', 'nguoinhanbaocao.id_baocao', '=', 'baocao.id')
       ->join('users', 'baocao.id_nguoigui', '=', 'users.id')
       ->where('nguoinhanbaocao.id_nguoinhan', '=', auth()->user()->id)
       ->where('nguoinhanbaocao.trangthai', '=', 0)
       ->select('baocao.tieude', 'baocao.noidung', 'users.name_dislay', 'baocao.created_at','baocao.thoihan', 'nguoinhanbaocao.trangthai', 'baocao.id')
       ->get();

        //dd($all_bc);

       return Datatables::of($all_bc)
           ->addIndexColumn()
           ->addColumn('action', function ($all_bc) {
            return '<a href="'.  route('nopbaocao', $all_bc->id) .'" class="btn btn-success m-3"><i class="icon md-eye" aria-hidden="true"></i>Chi tiết</a>
            ';

        })->editColumn('noidung', function ($all_bc) {
            if(strlen($all_bc->noidung) > 30){
                return substr($all_bc->noidung, 0,20) . '...';
            }
            return $all_bc->noidung;
        })->editColumn('tieude', function ($all_bc) {
            if(strlen($all_bc->tieude) > 30){
                return substr($all_bc->tieude, 0,20) . '...';
            }
            return $all_bc->tieude;
        })->editColumn('created_at', function ($all_bc) {
            $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $all_bc->created_at)->format('d/m/Y'); 
            return $formatedDate;
        })->editColumn('thoihan', function ($all_bc) {
            $formatedDate = Carbon::createFromFormat('Y-m-d', $all_bc->thoihan)->format('d/m/Y'); 
            return $formatedDate;

            // $startDate = Carbon::parse(Carbon::now()->format('d-m-Y'));
            // $endDate = Carbon::parse(Carbon::createFromFormat('Y-m-d', $all_bc->thoihan)->format('d-m-Y'));
            
            // $weekdays = $startDate->diffInWeekdays($endDate);
            // // dd($weekdays);
            // return $weekdays;

        })->editColumn('trangthai', function ($all_bc) {
            $ena = $all_bc->trangthai;
            if($ena == 1){
                return '<span class="badge badge-success"> Đã nộp</span> ';
            }else{
                return '<span class="badge badge-danger"> Chưa nộp</span> ';
            }
        })->rawColumns(['trangthai','noidung','created_at','action','thoihan'])->make(true);
    }
}
