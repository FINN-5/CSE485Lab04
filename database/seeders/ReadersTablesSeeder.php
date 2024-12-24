<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
class ReadersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = FakerFactory::create('vi_VN');
        for ($i = 0; $i < 100; $i++) {
            \App\Models\Reader::create([
                'name' => $faker->name,
                'birthday' => $faker->date(),
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
            ]);
        }
    }
}