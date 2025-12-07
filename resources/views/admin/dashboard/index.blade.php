@extends('layout.adminL')

@section('header_title', 'Dashboard')
@section('header_desc', 'Selamat datang di panel Dashboard.')

@section('content')
    <div class="">
        {{-- filter --}}
        <div class="my-3 p-1 flex items-center">
            {{-- input filter tanggal --}}
            <form method="GET" action="{{ route('admin.dashboard') }}" class="flex items-center">
                <div class="my-1 flex items-center">
                    <input type="date" name="filterTanggal" value="{{ $filterTanggal }}"
                        class="border rounded-2xl p-3 bg-blue-500 text-white font-bold mx-1">
                    <input type="submit" value="Filter"
                        class="border rounded-2xl p-3 bg-green-700 text-white font-bold mx-1">
                    <a href="{{ route('admin.dashboard') }}"
                        class="border rounded-2xl p-3 bg-red-500 text-white font-bold mx-1">Reset</a>
                </div>
            </form>
        </div>

        {{-- informasi total --}}
        <div class="flex">
            <div class="bg-blue-500 shadow-2xl mx-2 w-50 h-30 rounded-2xl ">
                <h1 class="text-sm font-bold p-3 text-white ">Total User</h1>
                <div class="flex justify-center items-center p-3">
                    <h1 class="text-xl font-bold text-center">{{ $totalUsers }}</h1>
                </div>
            </div>

            <div class="bg-blue-500 shadow-2xl mx-2 w-50 h-30 rounded-2xl ">
                <h1 class="text-sm font-bold p-3 text-white ">Total Member</h1>
                <div class="flex justify-center items-center p-3">
                    <h1 class="text-xl font-bold text-center">{{ $totalMembers }}</h1>
                </div>
            </div>

            <div class="bg-blue-500 shadow-2xl mx-2 w-50 h-30 rounded-2xl ">
                <h1 class="text-sm font-bold p-3 text-white ">Total Barang</h1>
                <div class="flex justify-center items-center p-3">
                    <h1 class="text-xl font-bold text-center">{{ $totalBarang }}</h1>
                </div>
            </div>

            <div class="bg-blue-500 shadow-2xl mx-2 w-50 h-30 rounded-2xl ">
                <h1 class="text-sm font-bold p-3 text-white ">Total Transaksi</h1>
                <div class="flex justify-center items-center p-3">
                    <h1 class="text-xl font-bold text-center">{{ $totalTransaksi }}</h1>
                </div>
            </div>

            <div class="bg-blue-500 shadow-2xl mx-2 w-72 h-30 rounded-2xl ">
                <h1 class="text-sm font-bold p-3 text-white ">Total Pendapatan</h1>
                <div class="flex justify-center items-center p-3">
                    <h1 class="text-xl font-bold text-center">Rp. {{ number_format($totalPendapatan, 0, ',', '.') }}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection