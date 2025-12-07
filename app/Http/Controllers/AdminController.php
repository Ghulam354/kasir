<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usersModel;
use App\Models\TransaksiModel;
use App\Models\barangModel;
use App\Models\memberModel;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        if (!session('login') || session('role') !== 'ADMIN') {
            return redirect()->route('login')->with('error', 'Silahkan Login Terlebih Dahulu');
        }

        $filterTanggal = $request->input('filterTanggal'); // Ambil tanggal dari parameter URL
        $startDate = null;
        $endDate = null;

        // Jika ada filter tanggal
        if ($filterTanggal) {
            // Mengonversi tanggal menjadi Carbon dan menentukan waktu mulai dan akhir hari
            $startDate = Carbon::parse($filterTanggal)->startOfDay();
            $endDate = Carbon::parse($filterTanggal)->endOfDay();
        }

        // Mengambil total data berdasarkan filter tanggal jika ada
        $totalUsers = usersModel::count();
        $totalMembers = memberModel::count();
        $totalBarang = barangModel::count();

        $totalTransaksi = TransaksiModel::when($startDate, function ($query) use ($startDate, $endDate) {
            return $query->whereBetween('created_at', [$startDate, $endDate]);
        })->count();

        // Menghitung total pendapatan (grand_total)
        $totalPendapatan = TransaksiModel::when($startDate, function ($query) use ($startDate, $endDate) {
            return $query->whereBetween('created_at', [$startDate, $endDate]);
        })->sum('grand_total');

        // Kembalikan data ke view
        return view('admin.dashboard.index', compact('totalUsers', 'totalMembers', 'totalBarang', 'totalTransaksi', 'totalPendapatan', 'filterTanggal'));
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
