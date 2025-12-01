<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\barangModel;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        barangModel::create([
            'nama' => 'Indomie Goreng',
            'kode_barang' => 'BRG001',
            'stok' => 100,
            'harga_satuan' => 3000,
        ]);

        barangModel::create([
            'nama' => 'Beras Ramos 5kg',
            'kode_barang' => 'BRG002',
            'stok' => 40,
            'harga_satuan' => 65000,
        ]);

        barangModel::create([
            'nama' => 'Minyak Goreng 1L',
            'kode_barang' => 'BRG003',
            'stok' => 70,
            'harga_satuan' => 15000,
        ]);
    }
}