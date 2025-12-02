<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    use HasFactory;

    protected $table = 'transaksis';

    protected $fillable = [
        'user_id',
        'member_id',
        'total',
        'discount',
        'grand_total'
    ];

    // Relasi ke User (kasir)
    public function user()
    {
        return $this->belongsTo(usersModel::class);
    }

    // Relasi ke Member (pelanggan)
    public function member()
    {
        return $this->belongsTo(MemberModel::class, 'member_id');
    }

    // Relasi ke DetailTransaksi
    public function detail()
    {
        return $this->hasMany(DetailTransaksiModel::class, 'transaksi_id');
    }
}