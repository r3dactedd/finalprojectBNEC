<?php

namespace Database\Seeders;

use App\Models\BookCategory;
use App\Models\MovieCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class movieCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MovieCategory::create([
            'movie_id' => '1',
            'category_id' => '1'
        ]);
        MovieCategory::create([
            'movie_id' => '1',
            'category_id' => '5'
        ]);

        MovieCategory::create([
            'movie_id' => '2',
            'category_id' => '3'
        ]);

        MovieCategory::create([
            'movie_id' => '2',
            'category_id' => '4'
        ]);

        MovieCategory::create([
            'movie_id' => '3',
            'category_id' => '1'
        ]);
        MovieCategory::create([
            'movie_id' => '3',
            'category_id' => '5'
        ]);
        MovieCategory::create([
            'movie_id' => '4',
            'category_id' => '4'
        ]);
        MovieCategory::create([
            'movie_id' => '4',
            'category_id' => '5'
        ]);
        MovieCategory::create([
            'movie_id' => '5',
            'category_id' => '2'
        ]);
        MovieCategory::create([
            'movie_id' => '6',
            'category_id' => '1'
        ]);
        MovieCategory::create([
            'movie_id' => '6',
            'category_id' => '4'
        ]);
        MovieCategory::create([
            'movie_id' => '7',
            'category_id' => '1'
        ]);
        MovieCategory::create([
            'movie_id' => '7',
            'category_id' => '5'
        ]);
        MovieCategory::create([
            'movie_id' => '8',
            'category_id' => '5'
        ]);
    }
}
