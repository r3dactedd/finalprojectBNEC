<?php

namespace Database\Seeders;

use App\Models\MovieCinemas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class movieCinemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MovieCinemas::create([
            'movie_id' => '1',
            'cinema_id' => '1'
        ]);

        MovieCinemas::create([
            'movie_id' => '2',
            'cinema_id' => '1'
        ]);

        MovieCinemas::create([
            'movie_id' => '3',
            'cinema_id' => '1'
        ]);

        MovieCinemas::create([
            'movie_id' => '4',
            'cinema_id' => '2'
        ]);

        MovieCinemas::create([
            'movie_id' => '5',
            'cinema_id' => '2'
        ]);

        MovieCinemas::create([
            'movie_id' => '6',
            'cinema_id' => '3'
        ]);

        MovieCinemas::create([
            'movie_id' => '7',
            'cinema_id' => '3'
        ]);

        MovieCinemas::create([
            'movie_id' => '8',
            'cinema_id' => '3'
        ]);
    }
}
