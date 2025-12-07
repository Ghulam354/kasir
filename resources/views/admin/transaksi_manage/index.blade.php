@extends('layout.adminL')

@section('header_title', 'Transaksi Management')
@section('header_desc', 'Selamat datang di panel Transaksi Management.')

@section('content')
    <div class="container mx-auto p-5">
        <div class="py-3 flex items-center justify-between">

            {{-- Search Form --}}
            <form action="{{ route('admin.transaksi') }}" method="get" class="flex items-center space-x-2">
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Cari Nama, Nomor Telepon"
                    class="p-3 w-80 rounded-xl border">
                <button type="submit" class="bg-blue-500 text-white px-5 py-3 rounded-xl">Cari</button>
            </form>

            {{-- Add Transaksi Button --}}
            <div>
                <a href="{{ route('admin.transaksi.add') }}" class="bg-blue-600 text-white px-5 py-3 rounded-xl">Tambah
                    Transaksi</a>
            </div>
        </div>

        {{-- Informasi Pencarian --}}
        @if(request('search'))
            <div class="mb-4 text-gray-600">
                <strong>{{ $transaksis->count() }}</strong> hasil ditemukan untuk pencarian
                "<strong>{{ request('search') }}</strong>".
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full text-center table-auto">
                <thead class="bg-purple-600 text-white">
                    <tr>
                        <th class="py-3 px-6">No</th>
                        <th class="py-3 px-6">Tanggal</th>
                        <th class="py-3 px-6">Kasir</th>
                        <th class="py-3 px-6">Member</th>
                        <th class="py-3 px-6">Total</th>
                        <th class="py-3 px-6">Diskon</th>
                        <th class="py-3 px-6">Grand Total</th>
                        <th class="py-3 px-6">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksis as $key => $transaksi)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-6">{{ $key + 1 }}</td>
                            <td class="py-3 px-6">{{ $transaksi->created_at->format('d/m/Y H:i') }}</td>
                            <td class="py-3 px-6">{{ $transaksi->user ? $transaksi->user->fullname : 'Non-member' }}</td>
                            <td class="py-3 px-6">{{ $transaksi->member ? $transaksi->member->fullname : 'Non-member' }}</td>
                            <td class="py-3 px-6">{{ number_format($transaksi->total, 0, ',', '.') }}</td>
                            <td class="py-3 px-6">{{ number_format($transaksi->discount, 0, ',', '.') }}</td>
                            <td class="py-3 px-6">{{ number_format($transaksi->grand_total, 0, ',', '.') }}</td>
                            <td class="py-3 px-6">
                                {{-- Lihat Struk --}}
                                <a href="{{ route('admin.transaksi.struk', $transaksi->id) }}"
                                    class="bg-green-500 text-white px-4 py-2 rounded-xl hover:bg-green-600"
                                    title="Lihat struk transaksi">Lihat Struk</a>

                                {{-- Hapus Transaksi --}}
                                <form action="{{ route('admin.transaksi.delete', $transaksi->id) }}" method="POST"
                                    class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-xl hover:bg-red-600"
                                        title="Hapus transaksi ini"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-5 text-center text-gray-500">Data Transaksi Belum Ada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection