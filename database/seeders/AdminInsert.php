<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminInsert extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'prenom' => 'admin',
            'email' => 'admin@gmail.com',
            'isAdmin' => true,
            'password' => Hash::make('12345678'),
        ]);
    }
}
