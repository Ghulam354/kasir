<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function transaksi()
    {
        if (!session('login') || session('role') !== 'KASIR') {
            return redirect()->route('login')->with('error', 'Silahkan Login Terlebih Dahulu');
        }

        return view('kasir.transaksi.index');
    }
}