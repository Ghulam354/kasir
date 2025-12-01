@extends('layout.adminL')

@section('header_title', 'Dashboard')
@section('header_desc', 'Selamat datang di panel Dashboard.')

@section('content')
    <div class="">
        {{-- filter --}}
        <div class="p-3 flex items-center my-3">
            {{-- input filter tanggal --}}
            <div class="mx-1 p-2 flex items-center">
                <input type="date" name="filterTanggal" id=""
                    class="border rounded-2xl p-3 bg-blue-500 text-white font-bold mx-1">
                <input type="submit" value="Filter" class="border rounded-2xl p-3 bg-green-700 text-white font-bold mx-1">
                <input type="submit" value="Reset" class="border rounded-2xl p-3 bg-red-500 text-white font-bold mx-1">
            </div>
        </div>
        {{-- information total --}}
        <div class="flex">
            <div class="bg-blue-500 shadow-2xl mx-2 w-50 h-30 rounded-2xl ">
                <h1 class="text-sm font-bold p-3 text-white ">Total User</h1>
                <div class="flex justify-center items-center p-3">
                    <h1 class="text-xl font-bold text-center">Total User</h1>
                </div>
            </div>
            <div class="bg-blue-500 shadow-2xl mx-2 w-50 h-30 rounded-2xl ">
                <h1 class="text-sm font-bold p-3 text-white ">Total Member</h1>
                <div class="flex justify-center items-center p-3">
                    <h1 class="text-xl font-bold text-center">Total User</h1>
                </div>
            </div>
            <div class="bg-blue-500 shadow-2xl mx-2 w-50 h-30 rounded-2xl ">
                <h1 class="text-sm font-bold p-3 text-white ">Total Barang</h1>
                <div class="flex justify-center items-center p-3">
                    <h1 class="text-xl font-bold text-center">Total User</h1>
                </div>
            </div>
            <div class="bg-blue-500 shadow-2xl mx-2 w-50 h-30 rounded-2xl ">
                <h1 class="text-sm font-bold p-3 text-white ">Total Transaksi</h1>
                <div class="flex justify-center items-center p-3">
                    <h1 class="text-xl font-bold text-center">Total User</h1>
                </div>
            </div>
            <div class="bg-blue-500 shadow-2xl mx-2 w-100 h-30 rounded-2xl ">
                <h1 class="text-sm font-bold p-3 text-white ">Total Pendapatan</h1>
                <div class="flex justify-center items-center p-3">
                    <h1 class="text-xl font-bold text-center">Total User</h1>
                </div>
            </div>
        </div>
    </div>
@endsection