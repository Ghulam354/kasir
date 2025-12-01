@extends('layout.kasirL')

@section('title', 'Transaksi')

@section('content')

{{-- CEK MEMBER --}}
<div class="card mb-4">
    <div class="card-header bg-primary text-white">Cek Member</div>
    <div class="card-body">
        <form method="GET" action="">
            <div class="input-group">
                <input type="text" name="phone" class="form-control" placeholder="Masukkan No. HP Member">
                <button class="btn btn-primary">Cek</button>
            </div>
        </form>

        @if ($member)
            <div class="mt-3 alert alert-success">
                <strong>Member ditemukan:</strong> {{ $member->fullname }}  
                <input type="hidden" name="member_id" value="{{ $member->id }}">
            </div>
        @elseif(request()->phone)
            <div class="mt-3 alert alert-danger">
                Member tidak ditemukan.
            </div>
        @endif
    </div>
</div>

{{-- CARI BARANG --}}
<div class="card mb-4">
    <div class="card-header bg-success text-white">Cari Barang</div>
    <div class="card-body">
        <form method="GET" action="">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Cari nama barang / kode barang">
                <button class="btn btn-success">Cari</button>
            </div>
        </form>

        @if ($barangs)
            <table class="table table-bordered table-striped mt-3">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kode</th>
                        <th>Harga</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangs as $b)
                    <tr>
                        <td>{{ $b->nama }}</td>
                        <td>{{ $b->kode_barang }}</td>
                        <td>Rp {{ number_format($b->harga_satuan) }}</td>
                        <td>
                            <a href="{{ route('kasir.transaksi.addcart', $b->id) }}" class="btn btn-sm btn-primary">
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

{{-- CART --}}
<div class="card mb-4">
    <div class="card-header bg-warning">Keranjang Belanja</div>
    <div class="card-body">

        @if (empty($cart))
            <p class="text-muted">Belum ada barang.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Barang</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp

                    @foreach ($cart as $c)
                    @php $total += $c['harga_satuan'] * $c['qty']; @endphp
                    <tr>
                        <td>{{ $c['nama'] }}</td>
                        <td>{{ $c['qty'] }}</td>
                        <td>Rp {{ number_format($c['harga_satuan']) }}</td>
                        <td>Rp {{ number_format($c['harga_satuan'] * $c['qty']) }}</td>
                        <td>
                            <a href="{{ route('kasir.transaksi.rmcart', $c['id']) }}" class="btn btn-danger btn-sm">
                                Hapus
                            </a>
                        </td>
                    </tr>
                    @endforeach

                    <tr class="table-info">
                        <th colspan="3">Total</th>
                        <th colspan="2">Rp {{ number_format($total) }}</th>
                    </tr>

                </tbody>
            </table>

            {{-- CHECKOUT --}}
            <form action="{{ route('kasir.transaksi.checkout') }}" method="post">
                @csrf
                <input type="hidden" name="member_id" value="{{ $member->id ?? null }}">
                
                <button class="btn btn-success w-100">Checkout</button>
            </form>
        @endif

    </div>
</div>

@endsection
