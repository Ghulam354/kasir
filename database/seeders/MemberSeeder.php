<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\memberModel;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        memberModel::create([
            'fullname' => 'Budi Santoso',
            'phone_number' => '081234567890',
        ]);

        memberModel::create([
            'fullname' => 'Siti Aminah',
            'phone_number' => '082345678901',
        ]);

        memberModel::create([
            'fullname' => 'Rina Kartika',
            'phone_number' => '083456789012',
        ]);
    }
}