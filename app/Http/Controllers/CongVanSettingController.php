<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\PhongBans;
use App\Models\CongVan;
use App\Models\FileCongVan;
use App\Models\NguoiNhanCongVan;
use App\Models\PhanHoiCongVan;
use App\Models\User;
use DB;

class CongVanSettingController extends Controller
{
    public function __construct(){
        $this->middleware(['role:super admin']);
        // theo per
        // $this->middleware('permission:add user', ['only' => ['create', 'store']]);
    }

    public function index(){
        $congvans = CongVan::sortable()
                    ->paginate(10);
        $users = User::all();
        return view('admincp.setting.congvan')->with(compact(['congvans', 'users' ]));
    }
}