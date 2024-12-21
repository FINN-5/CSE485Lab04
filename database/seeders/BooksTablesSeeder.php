<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use faker\Factory as FakerFactory;

class BooksTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = FakerFactory::create('vi_VN');
        for ($i = 0; $i < 100; $i++) {
            \App\Models\Book::create([
                'name' => $faker->name,
                'author' => $faker->name,
                'category' => $faker->name,
                'year' => $faker->year,
                'quantity' => $faker->numberBetween(1, 100),
            ]);
        }
    }
}
