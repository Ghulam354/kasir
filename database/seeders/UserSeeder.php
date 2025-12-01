<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UsersModel;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        UsersModel::create([
            'username' => 'kasir1',
            'password' => '12345', // otomatis hash
            'fullname' => 'Ghulam Zaky Nurrahman',
            'phone_number' => '083870640345',
            'role' => 'KASIR',
        ]);

        UsersModel::create([
            'username' => 'admin1',
            'password' => '12345', // otomatis hash
            'fullname' => 'Zaky Nurrahman',
            'phone_number' => '083870640345',
            'role' => 'ADMIN',
        ]);
    }
}