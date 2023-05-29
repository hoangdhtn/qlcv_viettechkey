<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
// Model
use App\Models\User;
use App\Models\PhongBans;
// Spatie ROLE
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Auth;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware(['permission:add user| edit user | delete user | publish user']);
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
        // thêm role và thêm per
        // $role = Role::create(['name' => 'admin']);
        // $permission = Permission::create(['name' => 'publish user']);

        
        // $role = Role::find(2);
        // $permission = Permission::find(5);
        // thêm per cho role
        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);

        // thêm per mới đè lên per cũ nếu trùng lặp
        //$permission->syncRoles($role);

        // xóa per của role
        //$role->revokePermissionTo($permission);

        // xóa role của per
        //$permission->removeRole($role);

        // gán quyền cho user
        //auth()->user()->assignRole('admin');
        //auth()->user()->assignRole(['admin', 'admin']);
        // dùng cho mutl (Thêm quyền cho user) thay vì dùng dùng assign thì dùng sync (Xóa hết cũ thay bằng mới) cũng được
        // $role->syncPermissions($permissions);
        // $permission->syncRoles($roles);
        //dd(auth()->user());
        // hoặc
        //$user = User::find(2);
        // $user->assignRole('admin')

        // xóa quyền
        //auth()->user()->removeRole('admin');

        //Direct Permissions (quyền trực tiếp) bảng model_has_permissions
        //$user->givePermissionTo('add user');

        // You can also give multiple permission at once
        //$user->givePermissionTo('edit articles', 'delete articles');

        // You may also pass an array
        //$user->givePermissionTo(['edit articles', 'delete articles']);

        // Kiểm tra role
        // $user = User::find(1);
        // if($user->hasRole('admin')){
        //     echo "có";
        // }else{
        //     echo "ko";
        // }

        // Xuất ra mảng vai trò của user
        // $user = User::find(1);
        // $per = $user->getPermissionsViaRoles();
        // dd($per);

        // Xuất ra mảng quyền của user
        // $user = User::find(2);
        // $per = $user->getAllPermissions();
        // dd($per);

        $column_roles = Role::where('name', '!=', 'super admin')->get();
        $column_phongbans = PhongBans::all();
        //dd($column_phongbans);
        return view('admincp.user.index')->with(compact([
            'column_roles',
            'column_phongbans',
        ]));
    }

    
    public function usersData()
    {
        $users = Auth::id() == 1 ? User::orderBy('id', 'DESC')->get() : User::where('id','!=', 1)->orderBy('id', 'DESC')->get();

        //dd($users);
        return Datatables::of($users)->addColumn('role', function (User $data) {
            $text = '';
            $roles = $data->getRoleNames();
            foreach($roles as $role){
                $a = '<span class="badge badge-primary">'.$role.'</span> ';
                $text .= $a;
            }
            return $text;
        })->addIndexColumn()->addColumn('action', function (User $data) {
            return '<a href="'. route('users.show', $data->id) .'" class="btn btn-success m-3"><i class="icon md-eye" aria-hidden="true"></i>Xem</a> 
            <a href="'. route('deleteuser', $data->id) .'" class="btn btn-danger m-3"><i class="icon md-delete" aria-hidden="true"></i>Xóa</a>
            <a href="'. route('roleandper', $data->id) .'" class="btn btn-info m-3"><i class="icon md-account" aria-hidden="true"></i>Quyền</a>';
        })->editColumn('created_at', function (User $data) {
            $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d/m/Y - H:s'); 
            return $formatedDate;
        })->editColumn('updated_at', function (User $data) {
            $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->updated_at)->format('d/m/Y - H:s'); 
            return $formatedDate;
        })->editColumn('enabled', function (User $data) {
            $text = '';
            $ena = $data->enabled;
            if($ena == 1){
                return '<span class="badge badge-success">Hoạt động</span> ';
            }else{
                return '<span class="badge badge-danger">Tạm khóa</span> ';
            }
        })->rawColumns(['enabled','updated_at','created_at','role','action'])->make(true);
    }

    public function roleAndPer($id){
        $column_roles = Role::all();
        $column_permissions = Permission::all();
        //dd($column_roles);

        $userRolesPers = User::with('roles','permissions')->where('id', $id)->first();

        $user = User::find($id);
        $persUser = $user->getAllPermissions();
        // $rolesUser = $user->getRoleNames();
        // dd($rolesUser);
        return view('admincp.user.roleandper')->with(
            compact([
                'column_roles', 
                'column_permissions',
                'userRolesPers',
                'persUser',
                'user',
            ]));
    }

    public function updateRoleAndPer(Request $request, $id){
        $data = $request;
        $user = User::find($id);

       try {
            // Quyền ADMIN cao nhất
            if(auth()->user()->hasRole('super admin') && $user->id == 1){
                return redirect()->back()->with('success', 'Bạn đã có quyền cao nhất! Không thể chỉnh sửa');
            }else{
                // Xóa vai trò và quyền cũ thay thế bằng mới
                $user->syncPermissions($data['ckPer']);
                $user->syncRoles($data['ckRole']);
                return redirect()->back()->with('success', 'Cập nhật thành công');
            }

       } catch (Exception $e) {
           return redirect()->back()->with('fail', 'Thêm thất bại');
       }
        return redirect()->back();
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
        // $data = $request->validate([
        //     'name' => 'required|max:200|min:8',
        //     'email' => 'required|email:rfc,dns',
        //     'password' => 'required|min:8',
        // ], [
        //     'name.required' => 'Tên không hợp lệ',
        //     'email.required' => 'Email không hợp lệ',
        //     'password.required' => 'Mật khẩu không hợp lệ',
        // ]); 
        // // dd($data);
        // try {
        //     $user = new User();
        //     $user->name = $data['name'];
        //     $user->email = $data['email'];
        //     $user->password = Hash::make($data['password']);
        //     $user->assignRole('user');
        //     $user->save();

        //     return redirect()->back()->with('success', 'Thêm thành công');
        // } catch (Exception $e) {
        //      return redirect()->back()->with('fail', 'Thêm thất bại');
        // }
        // return redirect()->back();


        // $user = User::find(3);
        // $user->phongbans()->sync(1);

        $data = $request->validate([
            'name' => 'required|max:255',
            'namedislay' => 'required|max:255',
            'email' => 'required|unique:users,email',
            'username' => 'required|string|regex:/\w*$/|max:255|unique:users,username',
            'password' => 'required|min:8',
            'phone' => '',
            'phongban' => 'required',
            'role' => 'required',
            'enabled' => 'required',
        ], [
            'name.required' => 'Tên không hợp lệ',
            'name.max' => 'Tên không dài quá 255 kí tự',
            'name.min' => 'Tên không ngắn quá 8 kí tự',
            'name.required' => 'Tên hiển thị không hợp lệ',
            'name.max' => 'Tên hiển thị không dài quá 255 kí tự',
            'name.min' => 'Tên hiển thị không ngắn quá 8 kí tự',
            'email.required' => 'Email không hợp lệ',
            'username.required' => 'Tài khoản không hợp lệ',
            'username.regex' => 'Tài khoản không hợp lệ',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu không hợp lệ',
            'role.required' => 'Bạn phải chọn quyền cho người dùng',
            'enabled.required' => 'Bạn phải chọn trạng thái cho tài khoản'
        ]); 
        //dd($data);
        try {
            $user = new User();
            $user->name = $data['name'];
            $user->name_dislay = $data['namedislay'];
            $user->email = $data['email'];
            $user->username = $data['username'];
            $user->password = Hash::make($data['password']);
            $user->phone = $data['phone'];
            
            $user->syncRoles($data['role']);
            $user->enabled = $data['enabled'];
            $user->save();
            $user->phongbans()->sync($data['phongban'], $user->id);

            return redirect()->back()->with('success', 'Thêm thành công');
        } catch (Exception $e) {
             return redirect()->back()->with('fail', 'Thêm thất bại');
        }
        return redirect()->back();
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
        $column_phongbans = PhongBans::all();
        $pb_users = $user->phongbans()->get();

        //dd($pb_user);

        return view('admincp.user.show')->with(compact(['user', 'column_phongbans', 'pb_users']));
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
            'name' => 'required|max:255',
            'namedislay' => 'required|max:255|unique:users,name_dislay,'.$user->id,
            'email' => 'required|unique:users,email,'.$user->id,
            'username' => 'required|string|regex:/\w*$/|max:255|unique:users,username,'.$user->id,
            'password' => 'required|min:8',
            'phone' => '',
            'phongban' => 'required',
            'enabled' => 'required',
        ], [
            'name.required' => 'Tên không hợp lệ',
            'name.max' => 'Tên không dài quá 255 kí tự',
            'namedislay.required' => 'Tên hiển thị không hợp lệ',
            'namedislay.max' => 'Tên hiển thị không dài quá 255 kí tự',
            'namedislay.min' => 'Tên hiển thị không ngắn quá 8 kí tự',
            'email.required' => 'Email không hợp lệ',
            'username.required' => 'Tài khoản không hợp lệ',
            'username.regex' => 'Tài khoản không hợp lệ',
            'username.unique' => 'Tài khoản đã tồn tại',
            'namedislay.unique' => 'Tên hiển thị đã tồn tại',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu không hợp lệ',
            'phongban.required' => 'Người dùng buộc phải có phòng ban',
            'enabled.required' => 'Bạn phải chọn trạng thái cho tài khoản'
        ]); 
        //dd($data);
        try {
            
            $user->name = $data['name'];
            $user->name_dislay = $data['namedislay'];
            $user->email = $data['email'];
            $user->username = $data['username'];
            $user->password = Hash::make($data['password']);
            $user->phone = $data['phone'];
            
            $user->enabled = $data['enabled'];
            $user->update();
            $user->phongbans()->sync($data['phongban'], $user->id);

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

    public function deleteUser($id)
    {
        //
        
        try {
            $user = User::find($id);
            //delete permission
            if($user->hasRole('super admin')){
                redirect()->back()->with('fail', 'Bạn không thể xóa người dùng này');
            }else{
                $user->syncPermissions([]);
                $user->syncRoles([]);
                $user->delete();
                return redirect()->back()->with('success', 'Xóa thành công');
            }
           
        } catch (Exception $e) {
             return redirect()->back()->with('fail', 'Xóa thất bại');
        }
        return redirect()->back()->with('fail', 'Xóa thất bại');

    }
}
