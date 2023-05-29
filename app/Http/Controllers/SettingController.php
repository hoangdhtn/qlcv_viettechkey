<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function __construct(){
        $this->middleware(['role:super admin']);
        // theo per
        // $this->middleware('permission:add user', ['only' => ['create', 'store']]);
    }

    public function index(){
        return view('admincp.setting.index');
    }
}
