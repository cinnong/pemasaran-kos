<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Dina Oktafiani',
                'usia' => 20,
                'jenis_kelamin' => 'Perempuan',
                'pekerjaan' => 'Mahasiswa',
                'notlp' => '081234567890',
                'email' => 'dina@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'M Fachriza Farhan',
                'usia' => 20,
                'jenis_kelamin' => 'Laki-Laki',
                'pekerjaan' => 'Mahasiswa',
                'notlp' => '081234567891',
                'email' => 'reza@gmail.com',
                'password' => Hash::make('admin12345'),
                'role' => 'pencari',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
