<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;

class BorrowsTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = FakerFactory::create('vi_VN');
        for ($i = 0; $i < 100; $i++) {
            \App\Models\Borrow::create([
                'reader_id' => $faker->numberBetween(1, 100),
                'book_id' => $faker->numberBetween(1, 100),
                'borrow_date' => $faker->date(),
                'return_date' => $faker->date(),
            ]);
        }
    }
}
