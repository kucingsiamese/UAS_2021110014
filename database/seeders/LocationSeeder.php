<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locations')->insert([
            ['location_name' => 'Shelf A'],
            ['location_name' => 'Shelf B'],
            ['location_name' => 'Shelf C'],
            ['location_name' => 'Shelf D'],
            ['location_name' => 'Shelf E'],
            ['location_name' => 'Shelf F'],
            ['location_name' => 'Shelf G'],
            ['location_name' => 'Shelf H'],
            ['location_name' => 'Shelf I'],
            ['location_name' => 'Shelf J'],
            ['location_name' => 'Shelf K'],
            ['location_name' => 'Shelf L'],
            ['location_name' => 'Shelf M'],
            ['location_name' => 'Shelf N'],
        ]);
    }
}
