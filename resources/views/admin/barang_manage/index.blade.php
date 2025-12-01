@extends('layout.adminL')

@section('header_title', 'Barang Management')
@section('header_desc', 'Kelola data barang di sistem.')

@section('content')

    <div class="">
        <div class="py-3 flex items-center">

            {{-- Search --}}
            <form action="{{ route('admin.barang') }}" method="get" class="mx-2">
                <input type="search" name="search" id="search" value="{{ request('search') }}"
                    placeholder="Cari Nama Barang atau Kode Barang" class="p-3 px-5 w-100 rounded-2xl border">
            </form>

            <div>
                <a href="{{ route('admin.barang.add') }}" class="p-3 bg-blue-600 rounded-2xl text-white">
                    Tambah Barang
                </a>
            </div>
        </div>

        <div>
            <table cellspacing="0" cellpadding="8" class="w-290 text-center border">
                <thead class="bg-purple-500 text-white">
                    <tr>
                        <th class="p-3">No</th>
                        <th class="p-3">Nama</th>
                        <th class="p-3">Kode Barang</th>
                        <th class="p-3">Stok</th>
                        <th class="p-3">Harga Satuan</th>
                        <th class="p-3">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @if ($barangs->isEmpty())
                        <tr>
                            <td colspan="6" class="p-5">Data Belum Ada</td>
                        </tr>
                    @else
                        @foreach ($barangs as $key => $item)
                            <tr class="border">
                                <td class="p-5">{{ $key + 1 }}</td>
                                <td class="p-5">{{ $item->nama }}</td>
                                <td class="p-5">{{ $item->kode_barang }}</td>
                                <td class="p-5">{{ $item->stok }}</td>
                                <td class="p-5">Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                                <td class="p-5 flex items-center justify-center gap-2">

                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('admin.barang.edit', $item->id) }}"
                                        class="p-3 bg-yellow-400 rounded-xl">
                                        Edit
                                    </a>

                                    {{-- Tombol Hapus (DELETE) --}}
                                    <form action="{{ route('admin.barang.delete', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="p-3 bg-red-500 text-white rounded-xl">
                                            Hapus
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>

            </table>
        </div>
    </div>

@endsection
