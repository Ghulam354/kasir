<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barangModel;
use App\Models\memberModel;
use App\Models\transaksiModel;
use App\Models\detailtransaksiModel;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        // CEK MEMBER
        $member = null;
        if ($request->phone) {
            $member = memberModel::where('phone_number', $request->phone)->first();
        }

        // CARI BARANG (SAMA SEPERTI ShowBarangManage)
        $search = $request->q;

        $barangs = barangModel::when($search, function ($q) use ($search) {
            $q->where('nama', 'like', "%$search%")
                ->orWhere('kode_barang', 'like', "%$search%");
        })->get();

        // CART
        $cart = session()->get('cart', []);

        return view('kasir.transaksi.index', compact('member', 'barangs', 'cart'));
    }


    public function addCart($id)
    {
        $barang = barangModel::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                'id' => $barang->id,
                'nama' => $barang->nama,
                'harga_satuan' => $barang->harga_satuan,
                'qty' => 1
            ];
        }

        session()->put('cart', $cart);

        return back();
    }

    public function removeCart($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        return back();
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return back()->with('error', 'Cart masih kosong');
        }

        // HITUNG TOTAL
        $total = 0;
        foreach ($cart as $c) {
            $total += $c['harga_satuan'] * $c['qty'];
        }

        $discount = $total > 50000 ? $total * 0.05 : 0;
        $grandTotal = $total - $discount;

        // SIMPAN TRANSAKSI
        $transaksi = transaksiModel::create([
            'user_id' => session('id'),
            'member_id' => $request->member_id,
            'total' => $total,
            'discount' => $discount,
            'grand_total' => $grandTotal
        ]);

        // SIMPAN DETAIL + KURANGI STOK
        foreach ($cart as $c) {

            // DETAIL TRANSAKSI
            detailtransaksiModel::create([
                'transaksi_id' => $transaksi->id,
                'barang_id' => $c['id'],
                'qty' => $c['qty'],
                'harga_satuan' => $c['harga_satuan'],
                'subtotal' => $c['qty'] * $c['harga_satuan']
            ]);

            // KURANGI STOK BARANG
            $barang = barangModel::find($c['id']);
            $barang->stok -= $c['qty'];
            $barang->save();
        }

        // CLEAR CART
        session()->forget('cart');

        return back()->with('success', 'Transaksi berhasil disimpan!');
    }
}