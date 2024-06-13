<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Dina',
            'email' => 'Dina@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@kawankoding.id',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('user');

    }
}
