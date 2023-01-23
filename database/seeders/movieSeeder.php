<?php

namespace Database\Seeders;

use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class movieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::create([
            'cinema_id' => '1',
            'title' => 'Pirates of the Caribbean: The Curse of the Black Pearl',
            'director' => 'Gore Verbinski',
            'released_date' => Carbon::parse('2003-07-09'),
            'desc' => "This swash-buckling tale follows the quest of Captain Jack Sparrow, a savvy pirate, and Will Turner, a resourceful blacksmith, as they search for Elizabeth Swann. ",
            'image' => 'storage/images/pirate.jpg'
        ]);

        Movie::create([
            'cinema_id' => '1',
            'title' => 'Titanic',
            'director' => 'James Cameron',
            'released_date' => Carbon::parse('1999-03-05'),
            'desc' => "84 years later, a 100 year-old woman named Rose DeWitt Bukater tells the story to her granddaughter Lizzy Calvert, Brock Lovett, Lewis Bodine, Bobby Buell and Anatoly Mikailavich on the Keldysh about her life set in April 10th 1912, on a ship called Titanic.",
            'image' => 'storage/images/titanic.jpg'
        ]);

        Movie::create([
            'cinema_id' => '1',
            'title' => 'Red Notice',
            'director' => 'Russo Brothers',
            'released_date' => Carbon::parse('2021-06-23'),
            'desc' => "When an Interpol-issued Red Notice the highest level warrant to hunt and capture the world's most wanted goes out, the FBI's top profiler John Hartley (Dwayne Johnson) is on the case.",
            'image' => 'storage/images/red.jpg'
        ]);
        Movie::create([
            'cinema_id' => '2',
            'title' => 'Plane',
            'director' => 'Jean-François Richet',
            'released_date' => Carbon::parse('2023-01-12'),
            'desc' => "A pilot named Brodie Torrance (Gerard Butler) is trapped in dangerous territory when he is forced to land his commercial plane after a terrible storm hits. After safely landing the plane, all passengers are taken hostage by a sadistic armed group.",
            'image' => 'storage/images/plane.jpg'
        ]);
        Movie::create([
            'cinema_id' => '2',
            'title' => 'M3GAN',
            'director' => 'Gerard Johnstone',
            'released_date' => Carbon::parse('2022-06-23'),
            'desc' => "A robotics engineer at a toy company built a doll that looked like a little girl and programmed it to be both a friend and a caretaker for children. Until the disaster started when the M3gan doll started to live and terrorize its creator.",
            'image' => 'storage/images/megan.jpg'
        ]);
        Movie::create([
            'cinema_id' => '3',
            'title' => 'A Man Called Otto',
            'director' => 'Marc Forster',
            'released_date' => Carbon::parse('2023-01-05'),
            'desc' => "After his wife died and was forced to retire from work after nearly 40 years of service, an angry 60-year-old man, Otto Anderson, intended to end his own life. However, his efforts are always hindered by the boisterousness of his new neighbors, which eventually leads to a unique bond of friendship as they challenge Otto to see the positive side of things.",
            'image' => 'storage/images/otto.jpg'
        ]);
        Movie::create([
            'cinema_id' => '3',
            'title' => 'Puss In Boots: The Last Wish',
            'director' => 'Joel Crawford',
            'released_date' => Carbon::parse('2021-06-23'),
            'desc' => "The plucky Puss in Boots discovers that his passion for danger and indifference to safety have taken their toll. Puss has taken eight of his nine lives, though he lost count along the way. Regaining that life will send Puss in Boots on his grandest quest yet.",
            'image' => 'storage/images/puss in boots.jpg'
        ]);
        Movie::create([
            'cinema_id' => '3',
            'title' => 'Avatar: The Way of Water',
            'director' => 'James Cameron',
            'released_date' => Carbon::parse('2022-12-23'),
            'desc' => "Set more than a decade after the events of the first film, “Avatar: The Way of Water” begins to tell the story of the Sully family (Jake, Neytiri, and their kids), the trouble that follows them, the lengths they go to keep each other safe, the battles they fight to stay alive, and the tragedies they endure.",
            'image' => 'storage/images/avatar.jpg'
        ]);
    }
}
