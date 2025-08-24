<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => "Rashad Alakbarov",
            'username' => "rashadal",
            'email' => 'rashad.alakbarov.37@gmail.com',
            'password' => Hash::make('Password123!'),
            'status' => '2',
        ]);

        DB::table('users')->insert([
            'name' => "Emi Hetemov",
            'username' => "emilhe",
            'email' => 'emil.hetemov@gmail.com',
            'password' => Hash::make('Password123!'),
            'status' => '2',
        ]);

        DB::table('users')->insert([
            'name' => "John Doe",
            'username' => "johndoe",
            'email' => 'johndoe@gmail.com',
            'password' => Hash::make('Password123!'),
            'phone' => '+994558215673',
        ]);
    }
}
