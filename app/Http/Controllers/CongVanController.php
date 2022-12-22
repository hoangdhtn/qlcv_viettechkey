<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

use App\Models\PhongBans;
use App\Models\CongVan;
use App\Models\FileCongVan;
use App\Models\NguoiNhanCongVan;
use App\Models\PhanHoiCongVan;
use DB;

class CongVanController extends Controller
{
    //
    public function __construct(){
        $this->middleware(['permission:add congvan| edit congvan | delete congvan ']);
        // theo per
        // $this->middleware('permission:add user', ['only' => ['create', 'store']]);
    }


    public function index(){

        return view('admincp.congvan.index');
    }

    public function xemCongVanNhan($id){
        $nguoinhancongvan = NguoiNhanCongVan::where('id_congvan', '=', $id)->where('id_nguoinhan', '=', auth()->user()->id)->first();
        $nguoinhancongvan->trangthai = 1;
        $nguoinhancongvan->update();


        $congvan = CongVan::find($id);

        $phanhoi = $congvan->phanhoicongvan()->where('id_nguoigui', '=', auth()->user()->id)->get();

        $filecongvan = CongVan::find($id)->filecongvan()->get();

        $nguoigui = DB::table('congvan')
        ->join('users', 'users.id', '=', 'congvan.id_nguoigui')
        ->where('congvan.id', '=', $id)
        ->select('users.name_dislay')->first();

        $ngaynhan =  Carbon::createFromFormat('Y-m-d H:i:s', $nguoinhancongvan->created_at)->format('d/m/Y');
        return view('admincp.congvan.show')->with(compact([
            'congvan',
            'filecongvan',
            'nguoigui',
            'ngaynhan',
            'phanhoi',
        ]));
    }

    public function dataCongVanNhan(){
        $mycongvan = DB::table('congvan')
        ->join('nguoinhancongvan', 'nguoinhancongvan.id_congvan', '=', 'congvan.id')
        ->join('users', 'users.id', '=', 'congvan.id_nguoigui')
        ->where('nguoinhancongvan.id_nguoinhan', '=', auth()->user()->id)
        ->select('congvan.id', 'congvan.tieude', 'congvan.noidung', 'nguoinhancongvan.created_at','nguoinhancongvan.trangthai', 'users.name_dislay as nguoigui')
        ->orderBy('congvan.id', 'DESC')
        ->get();

        //dd($mycongvan);
        return Datatables::of($mycongvan)
        ->addIndexColumn()
        ->addColumn('action', function ($mycongvan) {
            return '<a href="'.  route('xemcongvannhan', $mycongvan->id) .'" class="btn btn-success m-3"><i class="icon md-eye" aria-hidden="true"></i>Xem</a>
            ';

        })->editColumn('noidung', function ($mycongvan) {
            if(strlen($mycongvan->noidung) > 30){
                return substr($mycongvan->noidung, 0,20) . '...';
            }
            return $mycongvan->noidung;
        })->editColumn('tieude', function ($mycongvan) {
            if(strlen($mycongvan->tieude) > 30){
                return substr($mycongvan->tieude, 0,20) . '...';
            }
            return $mycongvan->tieude;
        })->editColumn('created_at', function ($mycongvan) {
            $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $mycongvan->created_at)->format('d/m/Y'); 
            return $formatedDate;
        })->editColumn('trangthai', function ($mycongvan) {
            $ena = $mycongvan->trangthai;
            if($ena == 1){
                return '<span class="badge badge-success"><i class="icon md-eye" aria-hidden="true"></i> Đã xem</span> ';
            }else{
                return '<span class="badge badge-danger"><i class="icon md-eye" aria-hidden="true"></i> Chưa xem</span> ';
            }
        })->rawColumns(['trangthai','noidung','created_at','action'])->make(true);

    }

    public function showCongVanDi(){
        return view('admincp.congvan.congvandi');
    }

    public function dataCongVanDi(){
        $mycongvan = DB::table('congvan')
        ->where('congvan.id_nguoigui', '=', auth()->user()->id)
        ->get();

        
        $arrMycongvan = [];
        foreach ($mycongvan as $key => $mcv) {
            $tongluotxem = 0;
            $nguoinhan = DB::table('nguoinhancongvan')
            ->join('users', 'nguoinhancongvan.id_nguoinhan', '=', 'users.id' )
            ->where('nguoinhancongvan.id_congvan', '=', $mcv->id)
            ->select('users.name_dislay', 'nguoinhancongvan.trangthai')
            ->get();

            $phanhoicv = PhanHoiCongVan::where('id_congvan', '=', $mcv->id)->get()->count();

            foreach ($nguoinhan as $key => $nn) {
                if($nn->trangthai == 1){
                    $tongluotxem++;
                }
            }

            $arrNguoinhan = array(
                'congvan' => $mcv,
                'nguoinhan' => $nguoinhan,
                'tongluotxem' => $tongluotxem,
                'tongluotphanhoi' => $phanhoicv,
            );

            array_push($arrMycongvan, $arrNguoinhan);

        }
        
        //dd($arrMycongvan);
        $data= json_decode( json_encode($arrMycongvan), true);
        //print_r($data);

        return Datatables::of($data)
        ->addIndexColumn()
        ->editColumn('congvan.noidung', function ($data) {

            return $data['congvan']['noidung'];
        })
        ->editColumn('congvan.tieude', function ($data) {
            if(strlen($data['congvan']['tieude']) > 30){
                return substr($data['congvan']['tieude'], 0,20) . '...';
            }
            return $data['congvan']['tieude'];
        })
        ->editColumn('congvan.noidung', function ($data) {
            if(strlen($data['congvan']['noidung']) > 30){
                return substr($data['congvan']['noidung'], 0,20) . '...';
            }
            return $data['congvan']['noidung'];
        })
        ->editColumn('nguoinhan', function ($data) {
            $text = '';
            $i = 0;
            
            foreach ($data['nguoinhan'] as $key => $v) {
                //dd($v['name_dislay']);
                $text .= $v['name_dislay']. ', ';
                $i++;
                if($i == 3){
                    break;
                    return $text . '...';
                }
            }
            return $text;
            
        })
        ->editColumn('congvan.created_at', function ($data) {
            $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data['congvan']['created_at'])->format('d/m/Y'); 
            return $formatedDate;
        })
        ->addColumn('action', function ($data) {
            return '<a href="'.  route('chitietcongvandi', $data['congvan']['id']) .'" class="btn btn-success m-3"><i class="icon md-eye" aria-hidden="true"></i>Xem</a>
            <a href="'.  route('deletecongvan', $data['congvan']['id']) .'" class="btn btn-danger m-3"><i class="icon md-delete" aria-hidden="true"></i>Xóa</a>
            ';

        })->rawColumns(['congvan.noidung','action'])->make(true);
    }

    public function xemCongVanDi($id){
        $congvan = CongVan::find($id);

        if($congvan->id_nguoigui == auth()->user()->id){
            $phanhoi = $congvan->phanhoicongvan()->get();
        //dd($phanhoi);

            $filecongvan = CongVan::find($id)->filecongvan()->get();

            $phongbans = PhongBans::all();

            $ngaynhan =  Carbon::createFromFormat('Y-m-d H:i:s', $congvan->created_at)->format('d/m/Y');

            $all_users = DB::table('users')
            ->join('phongban_user', 'phongban_user.user_id', '=', 'users.id')
            ->join('phongbans', 'phongbans.id', '=', 'phongban_user.phongban_id')
            ->get();

            $nguoinhancongvan = NguoiNhanCongVan::where('id_congvan', '=', $id)->get();
        //dd($nguoinhancongvan);

            return view('admincp.congvan.showcongvandi')->with(compact([
                'congvan',
                'filecongvan',
                'ngaynhan',
                'phanhoi',
                'phongbans',
                'all_users',
                'nguoinhancongvan',
            ]));
        }else{
            return abort(404);
        }
    }

    public function deleteFileCongVanDi($id){
        try {
            $congvan = DB::table('congvan')
            ->join('filecongvan' ,'filecongvan.id_congvan', '=', 'congvan.id')
            ->where('congvan.id_nguoigui', '=', auth()->user()->id)
            ->where('filecongvan.id', '=', $id)
            ->first();

            // dd($congvan);

            if($congvan->id_nguoigui == auth()->user()->id){
                unlink(storage_path('files/'.$congvan->name));

                $fcv = FileCongVan::find($congvan->id);
                $fcv->delete();
                return redirect()->back()->with('success', 'Xóa file thành công');
            }else{
                return abort(404);
            }
        } catch (Exception $e) {
            return redirect()->back()->with('fail', 'Xóa file thất bại');
        }
        return redirect()->back();
    }

    public function replyPhanHoiCongVan($id_phanhoi, $id_congvan){
        $congvan = CongVan::find($id_congvan);

        try {
            if($congvan->id_nguoigui == auth()->user()->id){
                $phcv = PhanHoiCongVan::find($id_phanhoi);
                $phcv->trangthai = 1;
                $phcv->update();
                return redirect()->back()->with('success', 'Phản hồi thành công');
            }else{
                return abort(404);
            }
            
        } catch (Exception $e) {
            return redirect()->back()->with('fail', 'Phản hồi thất bại');
        }
        return redirect()->back();
    }

    public function add(){
        $all_users = DB::table('users')
        ->join('phongban_user', 'phongban_user.user_id', '=', 'users.id')
        ->join('phongbans', 'phongbans.id', '=', 'phongban_user.phongban_id')
        ->get();

        $phongbans = PhongBans::all();

        return view('admincp.congvan.add')->with(compact([
            'all_users',
            'phongbans',
        ]));
    }

    //Update công văn
    public function updateCongVan(Request $request, $id){
        //zip 7z tar gz bz rar doc docx bmp png jpeg jpg pdf pps ppsx ppt pptx txt wav xls xml xlsm xlsx
        $congvan = CongVan::find($id);
        
        if($congvan->id_nguoigui == auth()->user()->id){
            $data = $request->validate([
                'tieude' => 'required',
                'noidung' => 'required',
                'file.*' => 'nullable|mimes:zip,7z,tar,gz,bz,rar,doc,docx,bmp,png,jpeg,jpg,pdf,pps,ppt,pptx,txt,wav,xls,xml,xlsm, xlsx',
                'friend' => 'required',
            ], [
                'tieude.required' => 'Yêu cầu có tên công văn',
                'noidung.required' => 'Yêu cầu có nội dung',
                'file.*.mimes' => 'File không đúng định dạng cho phép',
                'friend.required' => 'Yêu cầu có phòng ban được nhận',
            ]); 

        //dd($data);

            try {
            // Xử lý tạo thư mục chứa file upload
                if (! File::exists(storage_path('files'))) {
                    File::makeDirectory(storage_path('files'));
                }

            // Xử lý file upload
                $arrFile = [];

                if(isset($data['file'])){
                    foreach($data['file'] as $key => $file)
                    {

                        if($file != null){
                            $path = $file->store('storage/files');
                            $name = time().'-'. trim($file->getClientOriginalName());
                            $file->move('storage/files', $name);


                            array_push($arrFile, $name);
                        }

                    }
                }



                $congvan->tieude = $data['tieude'];
                $congvan->noidung = $data['noidung'];
                $congvan->update();

            // Xử lý đối tượng file công văn
                $filecv = [];

                if ($arrFile != []) {
                    foreach($arrFile as $key => $fcv){
                        $ff = new FileCongVan();
                        $ff->id_congvan = $congvan->id;
                        $ff->name = $fcv;
                        array_push($filecv, $ff);
                    }

                }
            // Xử lý đối tượng người nhận công văn
                $arrFr = [];

                foreach($data['friend'] as $key => $fr){
                    $frcv = new NguoiNhanCongVan();
                    $frcv->id_congvan = $congvan->id;
                    $frcv->id_nguoinhan = $fr;
                    $frcv->trangthai = 0;
                    array_push($arrFr, $frcv);
                }

                $congvan->nguoinhancongvan()->delete();

                $congvan->filecongvan()->saveMany($filecv);
                $congvan->nguoinhancongvan()->saveMany($arrFr);

                return redirect()->back()->with('success', 'Gửi thành công');
            } catch (Exception $e) {
                return redirect()->back()->with('fail', 'Gửi thất bại');
            }
        }else{
            return abort(404);
        }

        return redirect()->back();
    }

    // Xóa file công văn
    public function deleteCongVan($id){
        try {
            $congvan = DB::table('congvan')
            ->join('filecongvan' ,'filecongvan.id_congvan', '=', 'congvan.id')
            ->where('congvan.id_nguoigui', '=', auth()->user()->id)
            ->where('congvan.id', '=', $id)
            ->get();

            $cvdelete = CongVan::find($id);

            if($cvdelete->id_nguoigui == auth()->user()->id){
                // Xóa file
                foreach ($congvan as $key => $cv) {
                    unlink(storage_path('files/'.$cv->name));

                    $fcv = FileCongVan::find($cv->id);
                    $fcv->delete();
                }

                $cvdelete->filecongvan()->delete();
                $cvdelete->nguoinhancongvan()->delete();
                $cvdelete->phanhoicongvan()->delete();
                $cvdelete->delete();

                return redirect()->back()->with('success', 'Xóa thành công');
            }else{
                return abort(404);
            }
        } catch (Exception $e) {
            return redirect()->back()->with('fail', 'Xóa file thất bại');
        }
        return redirect()->back();
    }


    // Lưu công văn
    public function store(Request $request){
        //zip 7z tar gz bz rar doc docx bmp png jpeg jpg pdf pps ppsx ppt pptx txt wav xls xml xlsm xlsx
        $data = $request->validate([
            'tencongvan' => 'required',
            'noidung' => 'required',
            'file.*' => 'nullable|mimes:zip,7z,tar,gz,bz,rar,doc,docx,bmp,png,jpeg,jpg,pdf,pps,ppt,pptx,txt,wav,xls,xml,xlsm, xlsx',
            'friend' => 'required',
        ], [
            'tencongvan.required' => 'Yêu cầu có tên công văn',
            'noidung.required' => 'Yêu cầu có nội dung',
            'file.*.mimes' => 'File không đúng định dạng cho phép',
            'friend.required' => 'Yêu cầu có phòng ban được nhận',
        ]); 

        

        try {
            // Xử lý tạo thư mục chứa file upload
            if (! File::exists(storage_path('files'))) {
                File::makeDirectory(storage_path('files'));
            }
            
            // Xử lý file upload
            $arrFile = [];
            
            if(isset($data['file'])){
                //dd($data['file']);
                foreach($data['file'] as $key => $file)
                {
                    $path = $file->store('storage/files');
                    $name = time().'-'. trim($file->getClientOriginalName());
                    $file->move('storage/files', $name);


                    array_push($arrFile, $name);

                }
            }




            $congvan = new CongVan();
            $congvan->id_nguoigui = auth()->user()->id;
            $congvan->tieude = $data['tencongvan'];
            $congvan->noidung = $data['noidung'];
            $congvan->save();

            // Xử lý đối tượng file công văn
            $filecv = [];

            foreach($arrFile as $key => $fcv){
                $ff = new FileCongVan();
                $ff->id_congvan = $congvan->id;
                $ff->name = $fcv;
                array_push($filecv, $ff);
            }

            // Xử lý đối tượng người nhận công văn
            $arrFr = [];

            foreach($data['friend'] as $key => $fr){
                $frcv = new NguoiNhanCongVan();
                $frcv->id_congvan = $congvan->id;
                $frcv->id_nguoinhan = $fr;
                $frcv->trangthai = 0;
                array_push($arrFr, $frcv);
            }


            $congvan->filecongvan()->saveMany($filecv);
            $congvan->nguoinhancongvan()->saveMany($arrFr);

            return redirect()->back()->with('success', 'Gửi thành công');
        } catch (Exception $e) {
            return redirect()->back()->with('success', 'Gửi thất bại');
        }

        return redirect()->back();
    }

    // Phản hồi công văn
    public function PhanHoiCongVan(Request $request, $id){
        $congvan = CongVan::find($id);

        $data = $request->validate([
            'noidungphanhoi' => 'required',
        ], [
            'noidungphanhoi.required' => 'Yêu cầu có nội dung phản hồi',
        ]); 
        //dd($congvan);
        try {
            $arrPhanHoi = [];

            $phanhoi = new PhanHoiCongVan();
            $phanhoi->id_congvan = $id;
            $phanhoi->id_nguoigui= auth()->user()->id;
            $phanhoi->noidung = $data['noidungphanhoi'];
            $phanhoi->trangthai = 0;
            array_push($arrPhanHoi, $phanhoi);

            $congvan->phanhoicongvan()->saveMany($arrPhanHoi);

            return redirect()->back()->with('success', 'Gửi thành công');
        } catch (Exception $e) {
            return redirect()->back()->with('fail', 'Gửi thất bại');
        }

        return redirect()->back();
    }
}
