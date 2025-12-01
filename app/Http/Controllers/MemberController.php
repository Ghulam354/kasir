<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\memberModel;

class MemberController extends Controller
{
    public function ShowMemberManage(Request $request)
    {
        $search = $request->search;

        $members = memberModel::when($search, function ($query) use ($search) {
            $query->where('fullname', 'like', "%$search%")
                ->orWhere('phone_number', 'like', "%$search%");
        })->get();

        return view('admin.member_manage.index', compact('members'));
    }

    public function add()
    {
        return view('admin.member_manage.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'phone' => 'required'
        ]);

        memberModel::create($request->all());

        return redirect()->route('admin.member')->with('success', 'Member ditambahkan!');
    }

    public function edit($id)
    {
        $member = memberModel::findOrFail($id);
        return view('admin.member_manage.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required',
            'phone' => 'required'
        ]);

        memberModel::findOrFail($id)->update($request->all());

        return redirect()->route('admin.member')->with('success', 'Member diperbarui!');
    }

    public function delete($id)
    {
        memberModel::findOrFail($id)->delete();
        return redirect()->route('admin.member')->with('success', 'Member dihapus!');
    }
}