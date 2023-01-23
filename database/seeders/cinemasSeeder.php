<?php

namespace Database\Seeders;

use App\Models\Cinema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class cinemasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cinema::create([
            'name' => 'Go Cinema Living World Alam Sutera',
            'phone' => '021349452933',
            'email' => 'gocinema_alsut@gmail.com',
            'pub_img' => 'storage/images/Go Cinema page.png'

        ]);

        Cinema::create([
            'name' => 'Go Cinema Grand Indonesia Mall',
            'phone' => '082123536970',
            'email' => 'gocinema_GI@gmail.com',
            'pub_img' => 'storage/images/Go Cinema page.png'
        ]);

        Cinema::create([
            'name' => 'Go Cinema Supermal Karawaci',
            'phone' => '08597930596',
            'email' => 'gocinema_SK@gmail.com',
            'pub_img' => 'storage/images/Go Cinema page.png'
        ]);
    }
}
