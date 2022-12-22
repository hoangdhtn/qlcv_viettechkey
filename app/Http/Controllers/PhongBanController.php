<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
// Model
use App\Models\PhongBans;

class PhongBanController extends Controller
{
    //
    public function __construct(){
        $this->middleware(['permission:add phongban| edit phongban | delete phongban ']);
        // theo per
        // $this->middleware('permission:add user', ['only' => ['create', 'store']]);
    }


    public function indexPhongBan(){

        return view('admincp.phongban.index');

    }

    public function phongbansData(){
        $phongbans = PhongBans::all();

        return Datatables::of($phongbans)
        ->addColumn('action', function (PhongBans $data) {
          if(auth()->user()->can('add phongban') && auth()->user()->can('edit phongban') && auth()->user()->can('delete phongban')){
            return '<a href="'. route('showphongban', $data->id) .'" class="btn btn-success m-3"><i class="icon md-eye" aria-hidden="true"></i>Chỉnh sửa</a> 
            <a href="'. route('deletephongban', $data->id) .'" class="btn btn-danger m-3"><i class="icon md-delete" aria-hidden="true"></i>Xóa</a>
            ';
          }
        })->addIndexColumn()
        ->rawColumns(['action'])->make(true);
    }

    public function addPhongBan(Request $request){
        $data = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ], [
            'name.required' => 'Tên không hợp lệ',
            'name.max' => 'Tên không dài quá 255 kí tự',
            'description.required' => 'Mô tả không hợp lệ',
        ]); 
        

        try {
            $pb = new PhongBans();
            $pb->name = $data['name'];
            $pb->description = $data['description'];
            $pb->save();
            return redirect()->back()->with('success', 'Thêm thành công');
        } catch (Exception $e) {
            return redirect()->back()->with('fail', 'Thêm thất bại');
        }
        return redirect()->back();
    }

    public function showPhongBan($id){
        $pb = PhongBans::find($id);

        return view('admincp.phongban.show')->with(compact('pb'));

    }

    public function updatePhongBan(Request $request, $id){
        $pb = PhongBans::find($id);

        $data = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ], [
            'name.required' => 'Tên không hợp lệ',
            'name.max' => 'Tên không dài quá 255 kí tự',
            'description.required' => 'Mô tả không hợp lệ',
        ]); 

        try {
            $pb->name = $data['name'];
            $pb->description = $data['description'];
            $pb->update();
            return redirect()->back()->with('success', 'Cập nhật thành công');
        } catch (Exception $e) {
            return redirect()->back()->with('fail', 'Cập nhật thất bại');
        }
        return redirect()->back();
    }

    public function deletePhongBan($id){
        try {
            $pb = PhongBans::find($id);
            $pb->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        } catch (Exception $e) {
            return redirect()->back()->with('fail', 'Xóa thất bại');
        }
        return redirect()->back();
    }
}
