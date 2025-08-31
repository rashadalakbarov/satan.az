<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('images')->insert([
            'path' => "3f469f0e3ea17c697676255cb32e0b5c.jpg",
            'elan_id' => "1",
        ]);

        DB::table('images')->insert([
            'path' => "68a4d03600f85_da860963338cfb25375181ffd9f41a52.jpg",
            'elan_id' => "1",
        ]);

        DB::table('images')->insert([
            'path' => "68a4d03601e9a_939a5f6b28409f8d559f128026dac94c.jpg",
            'elan_id' => "1",
        ]);

        DB::table('images')->insert([
            'path' => "fcff3e839b773b6eac2913d541c5d2e4.jpg",
            'elan_id' => "1",
        ]);
    }
}
