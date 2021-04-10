<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,30) as $index) {
            DB::table('posts')->insert([
                'title' => $faker->unique()->sentence(6, $variableNbWords = true),
                'description'=> $faker->text('1000'),
                'quote'=> $faker->unique()->sentence(10, $variableNbWords = true),
                'published'=>$faker->boolean(),
                'published_at'=> $faker->dateTimeBetween('-4 years','+1 month'),
                'category_id' => rand(1,7),
                'user_id' => rand(1,10),
                'image_id' => rand(1,30),
                'created_at' => $faker->dateTimeBetween('-10 years', '-5 years'),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        }
    }

}
