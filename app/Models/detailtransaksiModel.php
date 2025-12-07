<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailtransaksiModel extends Model
{
    use HasFactory;

    protected $table = 'transaksi_details';

    protected $fillable = [
        'transaksi_id',
        'barang_id',
        'qty',
        'harga_satuan',
        'subtotal'
    ];

    // Relasi ke Transaksi
    public function transaksi()
    {
        return $this->belongsTo(TransaksiModel::class, 'transaksi_id');
    }

    // Relasi ke Barang
    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'barang_id');
    }
}
