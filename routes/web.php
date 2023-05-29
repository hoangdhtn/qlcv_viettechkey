<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');

// })->middleware(['auth'])->name('dashboard');



Route::group(['middleware' => 'auth'], function () {

    // Tải xuống 
    Route::get('/downloadfiles/{filename}', [App\Http\Controllers\DownloadFileController::class, 'downloadfile'])->name('files');
    // Review file
     Route::get('/reviewfile/{filename}', [App\Http\Controllers\DownloadFileController::class, 'reviewfile'])->name('reviewfile');

    // User
    Route::resource('userinfo', App\Http\Controllers\UserInformationController::class);

    //Backend
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    //Manager Users
    Route::resource('users', App\Http\Controllers\UsersController::class);
    Route::get('/deleteuser/{id}', [App\Http\Controllers\UsersController::class, 'deleteUser'])->name('deleteuser');
    Route::get('/usersData', [App\Http\Controllers\UsersController::class, 'usersData'])->name('usersData');
    Route::get('/roleandper/{id}', [App\Http\Controllers\UsersController::class, 'roleAndPer'])->name('roleandper');
    Route::post('/updateroleandper/{id}', [App\Http\Controllers\UsersController::class, 'updateRoleAndPer'])->name('updateroleandper');
    //Roles and permission
    Route::resource('rolesandpers', App\Http\Controllers\RolesAndPerController::class);
    Route::get('/rolesData', [App\Http\Controllers\RolesAndPerController::class, 'rolesData'])->name('rolesData');
    Route::get('/persData', [App\Http\Controllers\RolesAndPerController::class, 'persData'])->name('persData');
    Route::get('/addrole', [App\Http\Controllers\RolesAndPerController::class, 'addRole'])->name('addrole');
    // Save permission
    Route::post('/savepermission', [App\Http\Controllers\RolesAndPerController::class, 'savePermission'])->name('savepermission');
    // Save role
    Route::post('/saverole', [App\Http\Controllers\RolesAndPerController::class, 'saveRole'])->name('saverole');
    // Show role
    Route::get('/editrole/{id}', [App\Http\Controllers\RolesAndPerController::class, 'editRole'])->name('editrole');
    // Update role
    Route::post('/updaterole/{id}', [App\Http\Controllers\RolesAndPerController::class, 'updateRole'])->name('updaterole');
    // Delete role
    Route::get('/deleterole/{id}', [App\Http\Controllers\RolesAndPerController::class, 'deleteRole'])->name('deleterole');
    // Show page Permission
    Route::get('/permission', [App\Http\Controllers\RolesAndPerController::class, 'pagePermission'])->name('permission');
    // Delete permission
    Route::get('/deleteper/{id}', [App\Http\Controllers\RolesAndPerController::class, 'deletePer'])->name('deleteper');

    //====================== PHÒNG BAN ===============================
    Route::get('/phongbansData', [App\Http\Controllers\PhongBanController::class, 'phongbansData'])->name('phongbansData');
    Route::get('/phongbans', [App\Http\Controllers\PhongBanController::class, 'indexPhongBan'])->name('phongbans');
    Route::post('/addphongban', [App\Http\Controllers\PhongBanController::class, 'addPhongBan'])->name('addphongban');
    Route::get('/deletephongban/{id}', [App\Http\Controllers\PhongBanController::class, 'deletePhongBan'])->name('deletephongban');
    Route::get('/showphongban/{id}', [App\Http\Controllers\PhongBanController::class, 'showPhongBan'])->name('showphongban');
    Route::put('/updatephongban/{id}', [App\Http\Controllers\PhongBanController::class, 'updatePhongBan'])->name('updatephongban');

    //====================== CÔNG VĂN===============================
    Route::get('/congvan', [App\Http\Controllers\CongVanController::class, 'index'])->name('congvan');
    Route::get('/addcongvan', [App\Http\Controllers\CongVanController::class, 'add'])->name('addcongvan');
    Route::post('/storecongvan', [App\Http\Controllers\CongVanController::class, 'store'])->name('storecongvan');
    //Công văn nhận được
    Route::get('/dataCongVanNhan', [App\Http\Controllers\CongVanController::class, 'dataCongVanNhan'])->name('dataCongVanNhan');
    // Phản hồi công văn
    Route::post('/phanhoicongvan/{id}', [App\Http\Controllers\CongVanController::class, 'PhanHoiCongVan'])->name('phanhoicongvan');
    // Chi tiết công văn nhận được
    Route::get('/xemcongvannhan/{id}', [App\Http\Controllers\CongVanController::class, 'xemCongVanNhan'])->name('xemcongvannhan');
    // Công văn đi
    Route::get('/dataCongVanDi', [App\Http\Controllers\CongVanController::class, 'dataCongVanDi'])->name('dataCongVanDi');
    Route::get('/showcongvandi', [App\Http\Controllers\CongVanController::class, 'showCongVanDi'])->name('showcongvandi');
    Route::get('/chitietcongvandi/{id}', [App\Http\Controllers\CongVanController::class, 'xemCongVanDi'])->name('chitietcongvandi');
    // Xóa file công văn 
    Route::get('/deletefilecongvandi/{id}', [App\Http\Controllers\CongVanController::class, 'deleteFileCongVanDi'])->name('deletefilecongvandi');
    // Phản hồi công văn 
    Route::get('/replyphanhoicongvan/{id_phanhoi}/{id_congvan}', [App\Http\Controllers\CongVanController::class, 'replyPhanHoiCongVan'])->name('replyphanhoicongvan');
    // Update công văn
    Route::post('/updatecongvan/{id}', [App\Http\Controllers\CongVanController::class, 'updateCongVan'])->name('updatecongvan');
    // Xóa công văn
    Route::get('/deletecongvan/{id}', [App\Http\Controllers\CongVanController::class, 'deleteCongVan'])->name('deletecongvan');

    //====================== BÁO CÁO===============================
    Route::get('/baocao', [App\Http\Controllers\BaoCaoController::class, 'index'])->name('baocao');
    Route::get('/addbaocao', [App\Http\Controllers\BaoCaoController::class, 'add'])->name('addbaocao');
    Route::post('/storebaocao', [App\Http\Controllers\BaoCaoController::class, 'store'])->name('storebaocao');
    // Yêu cầu báo cáo đã nhận
     Route::get('/dataycbaocao', [App\Http\Controllers\BaoCaoController::class, 'dataYcBaoCaoDaNhan'])->name('dataycbaocao');
    // Nộp báo cáo
    Route::get('/nopbaocao/{id_baobao}', [App\Http\Controllers\BaoCaoController::class, 'nopBaoCao'])->name('nopbaocao');
    // Lưu nộp báo cáo
    Route::post('/storephbaocao/{id_baocao}', [App\Http\Controllers\BaoCaoController::class, 'storeNopBaoCao'])->name('storephbaocao');
    // Xóa Phản hồi báo cáo
    Route::get('/deletephbc/{id_phbaocao}', [App\Http\Controllers\BaoCaoController::class, 'deletePhanHoiBaoCao'])->name('deletephbc');
    // Báo cáo của tôi
    Route::get('/myycbaocao', [App\Http\Controllers\BaoCaoController::class, 'myYcBaoCao'])->name('myycbaocao');
    // Data báo cáo của tôi
    Route::get('/datamyycbaocao', [App\Http\Controllers\BaoCaoController::class, 'DatamyYcBaoCao'])->name('datamyycbaocao');
    // Xem mai yêu cầu báo cáo
    Route::get('/xemmyycbaocao/{id}', [App\Http\Controllers\BaoCaoController::class, 'xemMyYCBaobao'])->name('xemmyycbaocao');
    // Xem báo cáo đã nộp của yêu cầu báo cáo
    Route::get('/datachitietbcnop/{id}', [App\Http\Controllers\BaoCaoController::class, 'dataChitietBCNop'])->name('datachitietbcnop');
    // Xem chi tiết nội dung báo cáo đã nhận 
    Route::get('/showchitietdanhanbaoCao/{id}', [App\Http\Controllers\BaoCaoController::class, 'showChiTietDaNhanBaoCao'])->name('showchitietdanhanbaoCao');
    // Xóa yêu cầu báo cáo deleteYCBaoCao
    Route::get('/deleteycbaocao/{id}', [App\Http\Controllers\BaoCaoController::class, 'deleteYCBaoCao'])->name('deleteycbaocao');
    // Danh sách báo cáo đã nộp 
    Route::get('/baocaodanop', [App\Http\Controllers\BaoCaoController::class, 'baoCaoDaNop'])->name('baocaodanop');
    // Data danh sách báo cáo đã nộp 
    Route::get('/dataBaoCaoDaNop', [App\Http\Controllers\BaoCaoController::class, 'dataBaoCaoDaNop'])->name('dataBaoCaoDaNop');
    // Danh sách báo cáo chưa nộp 
    Route::get('/baocaochuanop', [App\Http\Controllers\BaoCaoController::class, 'baoCaoChuaNop'])->name('baocaochuanop');
    // Data danh sách báo cáo chưa nộp 
    Route::get('/dataBaoCaoChuaNop', [App\Http\Controllers\BaoCaoController::class, 'dataBaoCaoChuaNop'])->name('dataBaoCaoChuaNop');

    //====================== SETTING ===============================
    Route::get('/setting', [App\Http\Controllers\SettingController::class, 'index'])->name('indexsetting');
    Route::get('/setting-congvan', [App\Http\Controllers\CongVanSettingController::class, 'index'])->name('congvansetting');
});

require __DIR__.'/auth.php';
