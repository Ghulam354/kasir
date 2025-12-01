<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// MODELS
use App\Models\UsersModel;

class LoginController extends Controller
{
    public function index()
    {
        return view('Login.index');
    }

    public function proses(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = UsersModel::where('username', $request->username)->first();

        if (!$user) {
            return back()->with('error', 'USERNAME/AKUN TIDAK DITEMUKAN ');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'PASSWORD SALAH');
        }

        session([
            'login' => true,
            'id' => $user->id,
            'username' => $user->username,
            'role' => $user->role,
            'fullname' =>$user->fullname 
        ]);

        // direct role page
        if ($user->role == 'ADMIN') {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role == 'KASIR') {
            return redirect()->route('kasir.transaksi');
        }
    }
    
}