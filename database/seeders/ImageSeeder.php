<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 30; $i++){
            DB::table('images')->insert([
                'path' => $faker->imageUrl(),
            ]);
        }

    }
}
