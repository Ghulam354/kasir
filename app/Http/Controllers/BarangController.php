<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\barangModel;

class BarangController extends Controller
{
    public function ShowBarangManage(Request $request)
    {
        $search = $request->search;

        $barangs = barangModel::when($search, function ($q) use ($search) {
            $q->where('nama', 'like', "%$search%")
                ->orWhere('kode_barang', 'like', "%$search%");
        })->get();

        return view('admin.barang_manage.index', compact('barangs'));
    }

    // FORM ADD
    public function create()
    {
        return view('admin.barang_manage.add');
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kode_barang' => 'required|unique:barangs,kode_barang',
            'stok' => 'required|integer',
            'harga_satuan' => 'required|integer'
        ]);

        barangModel::create($request->all());

        return redirect()->route('admin.barang')->with('success', 'Barang berhasil ditambahkan!');
    }

    // FORM EDIT
    public function edit($id)
    {
        $barang = barangModel::findOrFail($id);
        return view('admin.barang_manage.edit', compact('barang'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $barang = barangModel::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'kode_barang' => 'required|unique:barangs,kode_barang,' . $id,
            'stok' => 'required|integer',
            'harga_satuan' => 'required|integer'
        ]);

        $barang->update($request->all());

        return redirect()->route('admin.barang')->with('success', 'Barang berhasil diperbarui!');
    }

    // DELETE
    public function destroy($id)
    {
        barangModel::destroy($id);

        return redirect()->route('admin.barang')->with('success', 'Barang berhasil dihapus!');
    }
}