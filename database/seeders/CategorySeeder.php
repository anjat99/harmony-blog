<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $categories = [
        "Travel",
        "Fashion",
        "Lifestyle",
        "Photograph",
        "Food",
        "Technology",
        "Inspiration"
    ];

    public function run()
    {
        foreach ($this->categories as $category) {
            DB::table('categories')->insert([
                "name" => $category
            ]);
        }
    }
}
