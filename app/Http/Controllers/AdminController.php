<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usersModel;

class AdminController extends Controller
{
    public function dashboard()
    {

        if (!session('login') || session('role') !== 'ADMIN') {
            return redirect()->route('login')->with('error', 'Silahkan Login Terlebih Dahulu');
        }

        return view('admin.dashboard.index');
    }

    // User Management Page ============================================================================
    public function ShowUserManage(Request $request)
    {

        // search 
        $search = $request->search;

        $users = usersModel::when($search, function ($query) use ($search) {
            $query->where('username', 'like', "%{$search}%")
                ->orWhere('fullname', 'like', "%{$search}%")
                ->orWhere('phone_number', 'like', "%{$search}%");
        })->get();


        return view('admin.user_manage.index', compact('users'));
    }
    // add user
    public function adduser()
    {
        return view('admin.user_manage.add');
    }
    // save user
    public function saveuser(Request $request)
    {
        // Validasi tambah user
        $request->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8',
            'fullname' => 'required',
            'phone_number' => 'required',
            'role' => 'required'
        ], [
            'password.min' => 'Password minimal 8 karakter.'
        ]);

        // Buat user (password otomatis ter-hash lewat mutator)
        usersModel::create([
            'username' => $request->username,
            'password' => $request->password,
            'fullname' => $request->fullname,
            'phone_number' => $request->phone_number,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.user')
            ->with('success', 'User Berhasil Ditambahkan');
    }
    public function edituser(){
        
    }
    
    
    
    // Member Management Page ============================================================================
    public function ShowMemberManage()
    {
        return view('admin.member_manage.index');
    }

    public function ShowTransaksiManage()
    {
        return view('admin.transaksi_manage.index');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}