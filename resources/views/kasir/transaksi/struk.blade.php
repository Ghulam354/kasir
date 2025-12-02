<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran</title>

    <style>
        body {
            font-family: monospace;
            margin: 0;
            padding: 10px;
        }

        .struk {
            width: 280px; /* kira-kira 80mm */
            margin: auto;
        }

        h2 {
            text-align: center;
            margin: 0;
        }

        .center {
            text-align: center;
        }

        table {
            width: 100%;
            font-size: 14px;
            border-collapse: collapse;
        }

        .total {
            border-top: 1px dashed #000;
            border-bottom: 1px dashed #000;
            padding: 8px 0;
            font-size: 16px;
            font-weight: bold;
        }

        .line {
            border-top: 1px dashed #000;
            margin: 8px 0;
        }

        @media print {
            body { margin: 0; }
        }
    </style>
</head>
<body onload="window.print()">

<div class="struk">

    <h2>KASIR MINI-MART</h2>
    <div class="center">Bandung</div>
    <div class="center">--------------------------------</div>

    <p>
        No. Transaksi : {{ $trx->id }}<br>
        Tanggal       : {{ $trx->created_at->format('d-m-Y H:i') }}<br>
        Kasir         : {{ $trx->kasir->fullname ?? '-' }}<br>
        Member        : {{ $trx->member->nama ?? '-' }}
    </p>

    <div class="line"></div>

    <table>
        <tbody>
            @foreach($trx->detail as $item)
            <tr>
                <td colspan="2">{{ $item->barang->nama_barang }}</td>
            </tr>
            <tr>
                <td>{{ $item->qty }} x {{ number_format($item->harga, 0, ',', '.') }}</td>
                <td style="text-align:right">
                    {{ number_format($item->subtotal, 0, ',', '.') }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="line"></div>

    <table>
        <tr>
            <td>Total</td>
            <td style="text-align:right">
                {{ number_format($trx->total, 0, ',', '.') }}
            </td>
        </tr>
        <tr>
            <td>Diskon</td>
            <td style="text-align:right">
                -{{ number_format($trx->discount, 0, ',', '.') }}
            </td>
        </tr>
        <tr class="total">
            <td>Grand Total</td>
            <td style="text-align:right">
                {{ number_format($trx->grand_total, 0, ',', '.') }}
            </td>
        </tr>
        <tr>
            <td>Bayar</td>
            <td style="text-align:right">
                {{ number_format($trx->bayar, 0, ',', '.') }}
            </td>
        </tr>
        <tr>
            <td>Kembali</td>
            <td style="text-align:right">
                {{ number_format($trx->kembali, 0, ',', '.') }}
            </td>
        </tr>
    </table>

    <div class="line"></div>

    <p class="center">
        TERIMA KASIH<br>
        *** Selamat Berbelanja Kembali ***
    </p>

</div>

</body>
</html>
