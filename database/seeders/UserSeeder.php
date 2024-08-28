<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'level' => 'admin',            
            'remember_token' => Str::random(60),
        ]);

        User::create([
            'name' => 'Irfan',
            'email' => 'irfan@gmail.com',
            'password' => bcrypt('irfan'),
            'level' => 'karyawan',            
            'remember_token' => Str::random(60),
        ]);
    }
}
