<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //
        User::create([
            'username' => 'Perpustakaan Kota',
            'email' => 'perpuskota@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 2,
            'poin' => 0,
            'status_user' => true
        ]);
        User::create([
            'username' => 'Perpustakaan Unesa',
            'email' => 'perpusunesa@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 2,
            'poin' => 0,
            'status_user' => true
        ]);
        User::create([
            'username' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'role' => 1,
            'poin' => 0,
            'status_user' => true
        ]);
    }
}
