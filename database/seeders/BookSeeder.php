<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'Harry Potter',
                'category_id' => 1, // Fiction
                'location_id' => 1, // Shelf A
                'quantity' => 10
            ],
            [
                'title' => 'Brief History of Time',
                'category_id' => 2, // Science
                'location_id' => 2, // Shelf B
                'quantity' => 5
            ],
            [
                'title' => 'Clean Code',
                'category_id' => 3, // Technology
                'location_id' => 3, // Shelf C
                'quantity' => 8
            ],
            [
                'title' => 'Sapiens: A Brief History of Humankind',
                'category_id' => 4, // History
                'location_id' => 4, // Shelf D
                'quantity' => 7
            ],
            [
                'title' => 'Steve Jobs Biography',
                'category_id' => 5, // Biography
                'location_id' => 5, // Shelf E
                'quantity' => 6
            ],
        ]);
    }
}
