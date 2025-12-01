<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// database
use App\Models\usersModel;


class UserController extends Controller
{
    // show user with database
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

    public function adduser()
    {
        return view('admin.user_manage.add');
    }

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

    public function edituser($id)
    {
        $user = usersModel::findOrFail($id);
        return view('admin.user_manage.edit', compact('user'));
    }

    public function updateuser(Request $request, $id)
    {
        $user = usersModel::findOrFail($id);

        $request->validate([
            'username' => 'required|unique:users,username,' . $id,
            'fullname' => 'required',
            'phone_number' => 'required',
            'role' => 'required',
            'password' => 'nullable|min:8'
        ], [
            'password.min' => 'Password minimal 8 karakter.',
        ]);

        // Update field
        $user->username = $request->username;
        $user->fullname = $request->fullname;
        $user->phone_number = $request->phone_number;
        $user->role = $request->role;


        $user->save();

        return redirect()->route('admin.user', compact('user'))->with('success', 'User berhasil diupdate.');
    }

    public function deleteuser($id)
    {
        $user = usersModel::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user')
            ->with('success', 'User berhasil dihapus.');
    }
}