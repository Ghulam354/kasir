<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksiModel extends Model
{
    use HasFactory;

    protected $table = 'transaksis';

    protected $fillable = [
        'user_id',
        'total',
        'discount',
        'grand_total'
    ];

    public function kasir()
    {
        return $this->belongsTo(usersModel::class, 'id');
    }

    public function details()
    {
        return $this->hasMany(detailtransaksiModel::class, 'transaksi_id');
    }
}