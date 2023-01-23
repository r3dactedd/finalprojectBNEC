<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'category_name' => 'Comedy'
        ]);

        Category::create([
            'category_name' => 'Horror'
        ]);

        Category::create([
            'category_name' => 'Romance'
        ]);

        Category::create([
            'category_name' => 'Drama'
        ]);

        Category::create([
            'category_name' => 'Action'
        ]);
    }
}
