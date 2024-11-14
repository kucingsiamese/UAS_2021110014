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
                'quantity' => 14
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
            [
                'title' => 'Dune',
                'category_id' => 6, // Sci-Fi
                'location_id' => 6, // Shelf F
                'quantity' => 9
            ],
            [
                'title' => 'Pride and Prejudice',
                'category_id' => 7, // Romance
                'location_id' => 7, // Shelf G
                'quantity' => 11
            ],
            [
                'title' => 'Sherlock Holmes: The Hound of the Baskervilles',
                'category_id' => 8, // Mystery
                'location_id' => 8, // Shelf H
                'quantity' => 15
            ],
            [
                'title' => 'The Shining',
                'category_id' => 9, // Horror
                'location_id' => 9, // Shelf I
                'quantity' => 9
            ],
            [
                'title' => 'The Hobbit',
                'category_id' => 10, // Adventure
                'location_id' => 10, // Shelf J
                'quantity' => 8
            ],
            [
                'title' => 'Atonement',
                'category_id' => 11, // Drama
                'location_id' => 11, // Shelf K
                'quantity' => 7
            ],
            [
                'title' => '1984',
                'category_id' => 12, // Dystopia
                'location_id' => 12, // Shelf L
                'quantity' => 5
            ],
            [
                'title' => 'Good Omens',
                'category_id' => 13, // Comedy
                'location_id' => 13, // Shelf M
                'quantity' => 8
            ],
            [
                'title' => 'Fight Club',
                'category_id' => 14, // Psychology
                'location_id' => 14, // Shelf N
                'quantity' => 10
            ],
        ]);
    }
}
