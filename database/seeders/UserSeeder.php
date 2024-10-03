<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Farid Irsyad Gunawan',
            'username' => 'mbung',
            'email' => 'mbung@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('mbung123'),
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'name' => 'Aang JR',
            'username' => 'jomss',
            'email' => 'jomss@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('jomss123'),
            'remember_token' => Str::random(10)
        ]);


        User::factory(3)->create();
    }
}
