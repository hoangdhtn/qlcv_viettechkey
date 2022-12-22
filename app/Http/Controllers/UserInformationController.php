<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// Model
use App\Models\User;
use Auth;

class UserInformationController extends Controller
{
    public function __construct(){
        $this->middleware(['permission:edit information']);
        // theo per
        // $this->middleware('permission:add user', ['only' => ['create', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = User::find($id);
        return view('usercp.index')->with(compact('user'));
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
        $user = User::find($id);
        $data = $request->validate([
            'name' => 'required|max:200|min:6',
            'email' => 'required|email|unique:users,email,'.$user->id,
            // 'username' => 'required|max:200|min:6|exists:users,username',
            'password' => 'required|min:8',
        ], [
            'name.required' => 'Tên không hợp lệ',
            'email.required' => 'Email không hợp lệ hoặc đã tồn tại',
            'email.unique' => 'Email không hợp lệ hoặc đã tồn tại',
            // 'username.required' => 'Tài khoản không hợp lệ hoặc đã tồn tại',
            'password.required' => 'Mật khẩu không hợp lệ',
        ]); 
        

       try {
            
            if(User::where('email', '=', $data['name'])->count() > 0){
                return redirect()->back()->with('fail', 'Email đã tồn tại');
                
            }else{
                $user->email = $data['email'];
            }
            $user->name = $data['name'];
            $user->password = Hash::make($data['password']);
            $user->update();
            return redirect()->back()->with('success', 'Cập nhật thành công');
       } catch (Exception $e) {
           return redirect()->back()->with('fail', 'Cập nhật thất bại');
       }
       return redirect()->back();
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
