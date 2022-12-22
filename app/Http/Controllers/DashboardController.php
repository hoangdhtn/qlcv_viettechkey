<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;

use App\Models\PhongBans;
use App\Models\CongVan;
use App\Models\FileCongVan;
use App\Models\NguoiNhanCongVan;
use App\Models\PhanHoiCongVan;

use App\Models\BaoCao;
use App\Models\FileBaoCao;
use App\Models\NguoiNhanBaoCao;
use App\Models\PhanHoiBaoCao;
use App\Models\FilePhanHoiBaoCao;

use DB;



class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $congvanchuaxem = NguoiNhanCongVan::where('id_nguoinhan', '=', auth()->user()->id)->where('trangthai', '=','0')->get();
        $phanhoicongvancuatoi = CongVan::join('phanhoicongvan', 'phanhoicongvan.id_congvan', '=', 'congvan.id')->where('congvan.id_nguoigui', '=', auth()->user()->id)->where('phanhoicongvan.trangthai', '=', 0)->get();

        $baocaochuanop = NguoiNhanBaoCao::where('id_nguoinhan', '=', auth()->user()->id)->where('trangthai', '=','0')->get();

        //dd($phanhoicongvancuatoi);
        //
        // $user = User::find(auth()->user()->id);
        // if($user->hasRole('admin|super admin')){
        //     $listUsers = User::all();    
        //     return view('admincp.dashboard')->with(compact(['listUsers']));
        // }else{
        //     return view('usercp.index', ['id' => auth()->user()->id])->with(compact('user'));
        // }
        return view('admincp.dashboard')->with(compact([
            'congvanchuaxem',
            'phanhoicongvancuatoi',
            'baocaochuanop',
        ]));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
