@extends('layout.adminL')

@section('header_title', 'Tambah Barang')
@section('header_desc', 'Isi form berikut untuk menambahkan barang baru.')

@section('content')

<div class="p-5">

    <form action="{{ route('admin.barang.store') }}" method="post" class="space-y-4">
        @csrf

        <div>
            <label for="nama">Nama Barang</label>
            <input type="text" name="nama" id="nama"
                class="p-3 w-full border rounded" required>
        </div>

        <div>
            <label for="kode_barang">Kode Barang</label>
            <input type="text" name="kode_barang" id="kode_barang"
                class="p-3 w-full border rounded" required>
        </div>

        <div>
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok"
                class="p-3 w-full border rounded" required>
        </div>

        <div>
            <label for="harga_satuan">Harga Satuan</label>
            <input type="number" name="harga_satuan" id="harga_satuan"
                class="p-3 w-full border rounded" required>
        </div>

        <button type="submit" class="p-3 bg-blue-600 text-white rounded-xl">Simpan</button>
        <a href="{{ route('admin.barang') }}" class="p-3 bg-gray-500 text-white rounded-xl">Kembali</a>
    </form>

</div>

@endsection
