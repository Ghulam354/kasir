@extends('layout.kasirL')

@section('content')
    <div class="flex h-210">
        {{-- barang list --}}
        <div class="bg-yellow-400 flex justify-center">
            <div class="m-3">
                <div class="text-2xl my-5 text-black font-bold text-center">Cari Barang</div>

                <form method="GET" action="" class="my-5">
                    <div>
                        <input type="text" name="q" class="border border-white p-2 px-6 rounded-2xl font-bold"
                            placeholder="Cari nama barang / kode barang" value="{{ request('q') }}">
                        <button
                            class="p-2 px-6 rounded-2xl bg-blue-800 hover:bg-blue-700 transition-all duration-200 font-bold text-white">
                            Cari
                        </button>
                    </div>
                </form>

                @if (!empty($barangs))
                    <div class=" overflow-y-scroll max-h-170"> <!-- Add this div for scrollable table -->
                        <table class="w-max text-center border-collapse rounded-t-2xl">
                            <thead class="border-b bg-white">
                                <tr>
                                    <th class="p-2">Nama</th>
                                    <th class="p-2">Kode</th>
                                    <th class="p-2">Harga</th>
                                    <th class="p-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangs as $b)
                                    <tr class="border-b">
                                        <td class="p-2.5 bg-blue-400 text-white font-bold">{{ $b->nama }}</td>
                                        <td class="p-2.5 bg-blue-500 text-white font-bold">{{ $b->kode_barang }}</td>
                                        <td class="p-2.5 bg-blue-400 text-white font-bold">Rp {{ number_format($b->harga_satuan) }}
                                        </td>
                                        <td class="p-2.5 bg-blue-500 text-white font-bold">
                                            <a href="{{ route('kasir.transaksi.addcart', $b->id) }}"
                                                class="text-center p-2 m-2 rounded-2xl text-white font-bold hover:bg-green-600  ">
                                                + Tambah
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        {{-- CART & Cek Member --}}
        <div class="grid-row-2 h-auto w-full bg-blue-500">
            {{-- Cek member --}}
            <div class="h-auto">
                <div class="p-3 w-full bg-white flex-2 justify-center">
                    <div class="text-center text-2xl font-bold">Cek Member</div>

                    <div class="flex justify-center items-center my-2">
                        <form method="GET" action="">
                            <div class="input-group">
                                <input type="text" name="phone" class="p-3 border rounded-2xl w-100"
                                    placeholder="Masukkan No. HP Member" value="{{ request('phone') }}">
                                <button class="p-3 px-8 mx-2 rounded-2xl bg-red-800 hover:bg-red-500 text-white font-bold">
                                    Cek
                                </button>
                            </div>
                        </form>

                        {{-- Reset Member Button --}}
                        <form method="GET" action="{{ route('kasir.transaksi.resetMember') }}">
                            <button type="submit"
                                class="p-3 px-8 mx-2 rounded-2xl bg-yellow-600 hover:bg-yellow-500 text-white font-bold">
                                Reset Member
                            </button>
                        </form>

                        {{-- Hasil cek member --}}
                        @if ($member)
                            <div class="p-3 my-2 mx-2 bg-green-500 text-white font-bold rounded-2xl">
                                Member ditemukan → {{ $member->fullname }}
                            </div>
                        @elseif(request()->phone)
                            <div class="p-3 my-2 bg-red-500 text-white font-bold rounded-2xl">
                                Member tidak ditemukan.
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- CART --}}
            <div class="flex justify-center">
                <div class="w-full text-center">
                    <div class="py-3 font-bold text-2xl text-white">Keranjang Belanja</div>

                    <div class="grid justify-center">

                        @if (empty($cart))
                            <div class="p-3 bg-red-500 rounded-2xl ">
                                <p class="text-2xl font-bold text-white ">Belum ada barang</p>
                            </div>
                        @else
                            <div class="overflow-y-auto max-h-110"> <!-- Scrollable cart table -->
                                <table class="table table-collapse p-3 ">
                                    <thead class="border-b border-b-black">
                                        <tr>
                                            <th class="p-3 w-100">No</th>
                                            <th class="p-3 w-100">Barang</th>
                                            <th class="p-3 w-100">Qty</th>
                                            <th class="p-3 w-100">Harga</th>
                                            <th class="p-3 w-100">Subtotal</th>
                                            <th class="p-3 w-100">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php $total = 0; @endphp

                                        @foreach ($cart as $c)
                                            @php
                                                $subtotal = $c['harga_satuan'] * $c['qty'];
                                                $total += $subtotal;
                                            @endphp
                                            <tr class="border-b">
                                                <td class="p-3 font-bold">{{ $c['id'] }}</td>
                                                <td class="p-3 font-bold">{{ $c['nama'] }}</td>
                                                <td class="p-3 font-bold">{{ $c['qty'] }}</td>
                                                <td class="p-3 font-bold">Rp {{ number_format($c['harga_satuan']) }}</td>
                                                <td class="p-3 font-bold">Rp {{ number_format($subtotal) }}</td>
                                                <td class="p-3 font-bold">
                                                    <a href="{{ route('kasir.transaksi.rmcart', $c['id']) }}"
                                                        class="p-3 px-6 rounded-2xl m-2 hover:bg-red-500">
                                                        Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                        @php
                                            $member_id = session('member_id');
                                            $discount = $member_id && $total > 50000 ? $total * 0.05 : 0;
                                        @endphp



                                    </tbody>
                                </table>
                            </div>
                        @endif
                        <table class="">
                            <tr class="border-b">
                                <th colspan="3" class="p-3 font-bold">Discount</th>
                                <th colspan="2" class="p-3 font-bold">Rp {{ number_format($discount) }}</th>
                            </tr>
                            <tr class="border-b">
                                <th colspan="3" class="p-3 font-bold">Total</th>
                                <th colspan="2" class="p-3 font-bold">Rp {{ number_format($total) }}</th>
                            </tr>
                        </table>
                        {{-- CHECKOUT --}}
                        <form action="{{ route('kasir.transaksi.checkout') }}" method="post" class="w-auto p-1">
                            @csrf
                            <input type="hidden" name="member_id" value="{{ $member->id ?? null }}">
                            <button type="submit" id="btnCheckout"
                                class="p-3 bg-green-600 hover:bg-green-500 text-white font-bold rounded-2xl w-100">
                                Checkout
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection