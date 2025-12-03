<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangModel;
use App\Models\MemberModel;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;

class TransaksiController extends Controller
{
    public function index(Request $request)
{
    // Cek Member
    $member = null;
    if ($request->phone) {
        $member = MemberModel::where('phone_number', $request->phone)->first();
        if ($member) {
            session(['member_id' => $member->id]);
        } else {
            session()->forget('member_id');
        }
    }

    // Cari Barang
    $search = $request->q;
    $barangs = BarangModel::when($search, function ($q) use ($search) {
        $q->where(function ($r) use ($search) {
            $r->where('nama', 'like', "%$search%")
                ->orWhere('kode_barang', 'like', "%$search%");
        });
    })->get();

    // Cart
    $cart = session()->get('cart', []);

    // Hitung Total dan Diskon
    $total = 0;
    foreach ($cart as $c) {
        $total += $c['harga_satuan'] * $c['qty'];
    }

    $memberID = session('member_id');
    $discount = 0;

    if ($memberID && $total > 50000) {
        $discount = $total * 0.05;  // Diskon 5%
    }

    $grandTotal = $total - $discount;

    return view('kasir.transaksi.index', compact('member', 'barangs', 'cart', 'total', 'discount', 'grandTotal'));
}



    public function addCart($id)
    {
        $barang = BarangModel::findOrFail($id);

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

        return back()->with('success', 'Barang ditambahkan ke keranjang');
    }

    public function removeCart($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);

        return back()->with('success', 'Barang dihapus dari keranjang');
    }

    public function resetMember()
    {
        session()->forget('member_id');
        return redirect()->route('kasir.transaksi')->with('success', 'Member Dihapus');
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

        $memberID = session('member_id');
        $discount = 0;

        if ($memberID && $total > 50000) {
            $discount = $total * 0.05;
        }

        $grandTotal = $total - $discount;

        // SIMPAN TRANSAKSI
        $transaksi = TransaksiModel::create([
            'user_id' => session('id'),
            'member_id' => $memberID,
            'total' => $total,
            'discount' => $discount,
            'grand_total' => $grandTotal
        ]);

        // SIMPAN DETAIL & KURANGI STOK
        foreach ($cart as $c) {

            DetailTransaksiModel::create([
                'transaksi_id' => $transaksi->id,
                'barang_id' => $c['id'],
                'qty' => $c['qty'],
                'harga_satuan' => $c['harga_satuan'],
                'subtotal' => $c['qty'] * $c['harga_satuan']
            ]);

            $barang = BarangModel::find($c['id']);
            $barang->stok -= $c['qty'];
            $barang->save();
        }

        // CLEAR SESSION CART
        session()->forget('cart');
        session()->forget('member_id');

        return redirect('/kasir/transaksi')->with('success', 'Transaksi berhasil!');
    }


    public function struk($id)
    {
        $trx = TransaksiModel::with(['detail.barang', 'member'])->findOrFail($id);

        return view('kasir.transaksi.struk', compact('trx'));
    }
}
