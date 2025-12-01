<?php

use Illuminate\Support\Facades\Route;

// controller
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'proses'])->name('login.proses');
// Logout admin
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('logout');

// DASHBOARD ------------------------------------------------------------------------------------------------------
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// USER MANAGE -----------------------------------------------------------------------------------------------------
Route::get('/admin/user_manage', [UserController::class, 'ShowUserManage'])
->name('admin.user');

Route::get('/admin/user_manage/add', [UserController::class, 'adduser'])
->name('admin.user.add');

Route::post('/admin/user_manage/store', [UserController::class, 'saveuser'])
->name('admin.user.store');

Route::get('/admin/user_manage/edit/{id}', [UserController::class, 'edituser'])
->name('admin.user.edit');

Route::post('/admin/user_manage/update/{id}', [UserController::class, 'updateuser'])
->name('admin.user.update');

Route::delete('/admin/user_manage/delete/{id}', [UserController::class, 'deleteuser'])
->name('admin.user.delete');

// MEMBER MANAGE ---------------------------------------------------------------------------------------------------
Route::get('/admin/member_manage', [MemberController::class, 'ShowMemberManage'])
->name('admin.member');

Route::get('/admin/member_manage/add', [MemberController::class, 'add'])
->name('admin.member.add');

Route::post('/admin/member_manage/store', [MemberController::class, 'store'])
->name('admin.member.store');

Route::get('/admin/member_manage/edit/{id}', [MemberController::class, 'edit'])
->name('admin.member.edit');

Route::post('/admin/member_manage/update/{id}', [MemberController::class, 'update'])
->name('admin.member.update');

Route::delete('/admin/member_manage/delete/{id}', [MemberController::class, 'delete'])
->name('admin.member.delete');

// Barang Management -----------------------------------------------------------------------------------------------
Route::get('/admin/barang_manage', [BarangController::class, 'ShowBarangManage'])
->name('admin.barang');

Route::get('/admin/barang_manage/add', [BarangController::class, 'create'])
->name('admin.barang.add');

Route::post('/admin/barang_manage/store', [BarangController::class, 'store'])
->name('admin.barang.store');

Route::get('/admin/barang_manage/edit/{id}', [BarangController::class, 'edit'])
->name('admin.barang.edit');

Route::post('/admin/barang_manage/update/{id}', [BarangController::class, 'update'])
->name('admin.barang.update');

Route::delete('/admin/barang_manage/delete/{id}', [BarangController::class, 'destroy'])
->name('admin.barang.delete');


// TRANSAKSI kasir -----------------------------------------------------------------------------------------------
Route::get('/kasir/transaksi', [TransaksiController::class, 'index'])->name('kasir.transaksi');
Route::get('/kasir/add-cart/{id}', [TransaksiController::class, 'addCart'])->name('kasir.transaksi.addcart');
Route::get('/kasir/remove-cart/{id}', [TransaksiController::class, 'removeCart'])->name('kasir.transaksi.rmcart');
Route::post('/kasir/checkout/', [TransaksiController::class, 'checkout'])->name('kasir.transaksi.checkout');