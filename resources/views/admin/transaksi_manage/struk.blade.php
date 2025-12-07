@extends('layout.adminL')

@section('header_title', 'Detail Struk Transaksi')
@section('header_desc', 'Tampilkan detail transaksi berikut dengan struk.')

@section('content')
    <div class="container mx-auto p-5">
        <div class="py-3 flex justify-between items-center">
            {{-- Button Kembali ke Daftar Transaksi --}}
            <a href="{{ route('admin.transaksi') }}" class="bg-gray-500 text-white px-6 py-3 rounded-xl">Kembali ke Daftar
                Transaksi</a>
        </div>

        {{-- Struk Transaksi --}}
        <div class=" p-5 ">
            <div class="flex justify-between items-center">
                <h3 class="text-2xl font-semibold">Struk Transaksi #{{ $transaksis->id }}</h3>
                <span class="text-gray-500">{{ $transaksis->created_at->format('d/m/Y H:i') }}</span>
            </div>
            <hr class="my-4">

            {{-- Informasi Member & kasir --}}
            <div class="flex p-3">
                <div class=" p-3 mx-3">
                    <h4 class="text-xl font-medium">Informasi Kasir</h4>
                    <p><strong>Nama:</strong> {{ $transaksis->user ? $transaksis->user->fullname : 'Non-member' }}</p>
                    <p><strong>No. Telepon:</strong> {{ $transaksis->member ? $transaksis->member->phone_number : 'N/A' }}
                    </p>
                </div>
                <div class=" p-3 mx-3 ">
                    <h4 class="text-xl font-medium">Informasi Member</h4>
                    <p><strong>Nama:</strong> {{ $transaksis->member ? $transaksis->member->fullname : 'Non-member' }}</p>
                    <p><strong>No. Telepon:</strong> {{ $transaksis->member ? $transaksis->member->phone_number : 'N/A' }}
                    </p>
                </div>
            </div>

            {{-- Rincian Barang --}}
            <div class="mb-6">
                <h4 class="text-xl font-medium">Rincian Barang</h4>
                <table class="min-w-full table-auto mt-4 text-center">
                    <thead class="bg-purple-600 text-white">
                        <tr>
                            <th class="py-3 px-6">Nama Barang</th>
                            <th class="py-3 px-6">Jumlah</th>
                            <th class="py-3 px-6">Harga</th>
                            <th class="py-3 px-6">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksis->detail as $detail)
                            @if($detail->barang)
                                <tr>
                                    <td class="py-3 px-6">{{ $detail->barang->nama }}</td>
                                    <td class="py-3 px-6">{{ $detail->qty }}</td>
                                    <td class="py-3 px-6">{{ number_format($detail->harga_satuan, 0, ',', '.') }}</td>
                                    <td class="py-3 px-6">{{ number_format($detail->qty * $detail->harga_satuan, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="4" class="py-3 px-6 text-center text-gray-500">Barang tidak ditemukan.</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>

                </table>
            </div>

            {{-- Total Pembayaran --}}
            <div class="mt-6">
                <h4 class="text-xl font-medium">Total Pembayaran</h4>
                <p><strong>Total:</strong> {{ number_format($transaksis->total, 0, ',', '.') }}</p>
                <p><strong>Diskon:</strong> {{ number_format($transaksis->discount, 0, ',', '.') }}</p>
                <p class="text-lg font-semibold mt-2"><strong>Grand Total:</strong>
                    {{ number_format($transaksis->grand_total, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>
@endsection