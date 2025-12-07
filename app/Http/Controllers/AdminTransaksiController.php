<?php

namespace App\Http\Controllers;

use App\Models\TransaksiModel;
use App\Models\detailtransaksiModel;


use Illuminate\Http\Request;

class AdminTransaksiController extends Controller
{
    public function showTransaksi(Request $request)
    {
        $search = $request->search;

        $transaksis = TransaksiModel::with(['member'])
            ->when($search, function ($query) use ($search) {
                $query->whereHas('member', function ($q) use ($search) {
                    $q->where('fullname', 'like', "%{$search}%")
                        ->orWhere('phone_number', 'like', "%{$search}%");
                });
            })
            ->get();

        $transaksis = TransaksiModel::with(['user'])
            ->when($search, function ($query) use ($search) {
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('fullname', 'like', "%{$search}%")
                        ->orWhere('phone_number', 'like', "%{$search}%");
                });
            })
            ->get();

        return view('admin.transaksi_manage.index', compact('transaksis'));
    }

    /**
     * Menampilkan struk transaksi
     */
    public function struk($id)
    {
        // Ambil data transaksi beserta detail dan member
        $transaksis = TransaksiModel::with(['detail.barang', 'member'])->findOrFail($id);

        return view('admin.transaksi_manage.struk', compact('transaksis'));
    }

    /**
     * Menghapus transaksi
     */
    public function delete($id)
    {
        // Temukan transaksi berdasarkan ID
        $transaksi = TransaksiModel::findOrFail($id);

        // Hapus transaksi
        $transaksi->delete();

        // Redirect setelah berhasil menghapus transaksi
        return redirect()->route('admin.transaksi')->with('success', 'Transaksi berhasil dihapus');
    }
}
