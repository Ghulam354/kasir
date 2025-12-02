@extends('layout.kasirL')

@section('content')
    <div class="flex">
        {{-- barang list --}}
        <div class="w-120 h-dvh bg-yellow-400 flex justify-center">
            <div class=" ">
                <div class="text-2xl my-5 text-black font-bold text-center">Cari Barang</div>
                <div class="">
                    <form method="GET" action="" class="my-5">
                        <div class="">
                            <input type="text" name="q" class="border border-white p-2 px-6 rounded-2xl font-bold" placeholder="Cari nama barang / kode barang">
                            <button class="p-2 px-6 rounded-2xl bg-blue-800 transition-all duration-200 font-bold text-white {{ request()->routeIs('cari') ? 'bg-blue-600 font-semibold' : 'hover:bg-blue-700' }}">Cari</button>
                        </div>
                    </form>

                    @if ($barangs)
                        <table class="w-110 text-center border-collapse rounded-t-2xl">
                            <thead class="border-b bg-white ">
                                <tr class="">
                                    <th class="p-2 rounded-tl-2xl">Nama</th>
                                    <th class="p-2">Kode</th>
                                    <th class="p-2">Harga</th>
                                    <th class="p-2 rounded-tr-2xl">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangs as $b)
                                    <tr>
                                        <td class="p-2.5 bg-blue-400">{{ $b->nama }}</td>
                                        <td class="p-2.5 bg-blue-500">{{ $b->kode_barang }}</td>
                                        <td class="p-2.5 bg-blue-400">Rp {{ number_format($b->harga_satuan) }}</td>
                                        <td class="p-2.5 bg-blue-500">
                                            <a href="{{ route('kasir.transaksi.addcart', $b->id) }}" class=" text-center p-2 m-1 rounded-2xl transition-all duration-200 font-bold text-white  {{ request()->routeIs('admin.member') ? '' : 'hover:bg-gradient-to-l from-blue-900 to-blue-800 ' }}">
                                                + Tambah
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
        {{-- cart and check Member --}}
        <div class="grid">
            {{-- Cart list --}}
            <div class="">

            </div>
            {{-- Check Member list --}}
            <div class="">

            </div>
        </div>
    </div>
@endsection