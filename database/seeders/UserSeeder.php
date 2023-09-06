<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::query()->create([
            'name' => 'Administrador',
            'email' => 'admin@email.com',
            'password' => Hash::make('12345678'),
            'is_admin' => true
        ]);

        User::query()->create([
            'name' => 'Cliente',
            'email' => 'client@email.com',
            'password' => Hash::make('12345678'),
            'is_admin' => false
        ]);
    }
}
