<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Fiction'],
            ['name' => 'Science'],
            ['name' => 'Technology'],
            ['name' => 'History'],
            ['name' => 'Biography'],
            ['name' => 'Sci-Fi'],
            ['name' => 'Romance'],
            ['name' => 'Mystery'],
            ['name' => 'Horror'],
            ['name' => 'Adventure'],
            ['name' => 'Drama'],
            ['name' => 'Dystopia'],
            ['name' => 'Comedy'],
            ['name' => 'Psychology'],
        ]);
    }
}
