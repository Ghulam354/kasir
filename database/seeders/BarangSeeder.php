<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\BarangModel;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BarangModel::create([
            'nama' => 'Indomie Goreng',
            'kode_barang' => 'BRG001',
            'stok' => 100,
            'harga_satuan' => 3000,
        ]);

        BarangModel::create([
            'nama' => 'Beras Ramos 5kg',
            'kode_barang' => 'BRG002',
            'stok' => 40,
            'harga_satuan' => 65000,
        ]);

        BarangModel::create([
            'nama' => 'Minyak Goreng 1L',
            'kode_barang' => 'BRG003',
            'stok' => 70,
            'harga_satuan' => 15000,
        ]);

        BarangModel::create([
            'nama' => 'Teh Botol Sosro 350ml',
            'kode_barang' => 'BRG004',
            'stok' => 150,
            'harga_satuan' => 5000,
        ]);

        BarangModel::create([
            'nama' => 'Gula Pasir 1kg',
            'kode_barang' => 'BRG005',
            'stok' => 80,
            'harga_satuan' => 12000,
        ]);

        BarangModel::create([
            'nama' => 'Susu Ultra 1L',
            'kode_barang' => 'BRG006',
            'stok' => 60,
            'harga_satuan' => 13000,
        ]);

        BarangModel::create([
            'nama' => 'Kecap Manis ABC 600ml',
            'kode_barang' => 'BRG007',
            'stok' => 45,
            'harga_satuan' => 8000,
        ]);

        BarangModel::create([
            'nama' => 'Pasta Gigi Pepsodent 180g',
            'kode_barang' => 'BRG008',
            'stok' => 120,
            'harga_satuan' => 10000,
        ]);

        BarangModel::create([
            'nama' => 'Sabun Mandi Lifebuoy 90g',
            'kode_barang' => 'BRG009',
            'stok' => 200,
            'harga_satuan' => 3500,
        ]);

        BarangModel::create([
            'nama' => 'Roti Tawar Sari Roti 400g',
            'kode_barang' => 'BRG010',
            'stok' => 50,
            'harga_satuan' => 15000,
        ]);

        // Additional items to make it 30
        BarangModel::create([
            'nama' => 'Kopi Kapal Api 200g',
            'kode_barang' => 'BRG011',
            'stok' => 90,
            'harga_satuan' => 22000,
        ]);

        BarangModel::create([
            'nama' => 'Mie Sedaap Goreng',
            'kode_barang' => 'BRG012',
            'stok' => 120,
            'harga_satuan' => 3500,
        ]);

        BarangModel::create([
            'nama' => 'Coklat Delfi 200g',
            'kode_barang' => 'BRG013',
            'stok' => 60,
            'harga_satuan' => 18000,
        ]);

        BarangModel::create([
            'nama' => 'Selai Nanas ABC 250g',
            'kode_barang' => 'BRG014',
            'stok' => 100,
            'harga_satuan' => 12000,
        ]);

        BarangModel::create([
            'nama' => 'Kecap ABC 700ml',
            'kode_barang' => 'BRG015',
            'stok' => 80,
            'harga_satuan' => 9500,
        ]);

        BarangModel::create([
            'nama' => 'Air Mineral Aqua 600ml',
            'kode_barang' => 'BRG016',
            'stok' => 150,
            'harga_satuan' => 4500,
        ]);

        BarangModel::create([
            'nama' => 'Madu 500g',
            'kode_barang' => 'BRG017',
            'stok' => 50,
            'harga_satuan' => 25000,
        ]);

        BarangModel::create([
            'nama' => 'Pasta Gigi Colgate 150g',
            'kode_barang' => 'BRG018',
            'stok' => 180,
            'harga_satuan' => 11000,
        ]);

        BarangModel::create([
            'nama' => 'Roti Bakar Sari Roti 400g',
            'kode_barang' => 'BRG019',
            'stok' => 100,
            'harga_satuan' => 17000,
        ]);

        BarangModel::create([
            'nama' => 'Teh Celup Sari Wangi',
            'kode_barang' => 'BRG020',
            'stok' => 200,
            'harga_satuan' => 8000,
        ]);

        BarangModel::create([
            'nama' => 'Kue Cubir Kering 500g',
            'kode_barang' => 'BRG021',
            'stok' => 30,
            'harga_satuan' => 24000,
        ]);

        BarangModel::create([
            'nama' => 'Kecap Manis Bango 500ml',
            'kode_barang' => 'BRG022',
            'stok' => 110,
            'harga_satuan' => 13000,
        ]);

        BarangModel::create([
            'nama' => 'Mie Instan ABC 100g',
            'kode_barang' => 'BRG023',
            'stok' => 75,
            'harga_satuan' => 2500,
        ]);

        BarangModel::create([
            'nama' => 'Mayonaise Kraft 250g',
            'kode_barang' => 'BRG024',
            'stok' => 65,
            'harga_satuan' => 27000,
        ]);

        BarangModel::create([
            'nama' => 'Pembersih Lantai Green Leaf',
            'kode_barang' => 'BRG025',
            'stok' => 120,
            'harga_satuan' => 10000,
        ]);

        BarangModel::create([
            'nama' => 'Vaseline Petroleum Jelly 50g',
            'kode_barang' => 'BRG026',
            'stok' => 130,
            'harga_satuan' => 12000,
        ]);

        BarangModel::create([
            'nama' => 'Coca-Cola 500ml',
            'kode_barang' => 'BRG027',
            'stok' => 250,
            'harga_satuan' => 7000,
        ]);

        BarangModel::create([
            'nama' => 'Sereal Nestle Koko Crunch 400g',
            'kode_barang' => 'BRG028',
            'stok' => 50,
            'harga_satuan' => 22000,
        ]);

        BarangModel::create([
            'nama' => 'Mentos Mint 150g',
            'kode_barang' => 'BRG029',
            'stok' => 100,
            'harga_satuan' => 15000,
        ]);

        BarangModel::create([
            'nama' => 'Kacang Tanah Goreng 250g',
            'kode_barang' => 'BRG030',
            'stok' => 90,
            'harga_satuan' => 12000,
        ]);
    }
}
