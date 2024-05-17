<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Owner',
            'username' => 'owner',
            'email' => 'owner@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'), // Hashed password
            'role' => 'OWNER',
            'phone' => '9876543210',
            'birthdate' => '1995-05-05',
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'), // Hashed password
            'role' => 'ADMIN',
            'phone' => '1234567890',
            'birthdate' => '1990-01-01',
        ]);

        DB::table('users')->insert([
            'name' => 'Dokter',
            'username' => 'dokter',
            'email' => 'dokter@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'), // Hashed password
            'role' => 'DOKTER',
            'phone' => '1234567890',
            'birthdate' => '1990-01-01',
        ]);

        DB::table('users')->insert([
            'name' => 'Apoteker',
            'username' => 'apoteker',
            'email' => 'apoteker@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'), // Hashed password
            'role' => 'APOTEKER',
            'phone' => '1234567890',
            'birthdate' => '1990-01-01',
        ]);

        DB::table('users')->insert([
            'name' => 'Kepala Klinik',
            'username' => 'kepalaklinik',
            'email' => 'kepalaklinik@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'), // Hashed password
            'role' => 'KEPALA_KLINIK',
            'phone' => '1234567890',
            'birthdate' => '1990-01-01',
        ]);
    }
}
