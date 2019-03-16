<?php

use Illuminate\Database\Seeder;
use App\Film;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $films = [
            [
                'name' => 'Lord Of The Rings',
                'desc' => 'The adventures of frodo baggins',
                'price' => 34.32
            ],
            [
                'name' => 'Aqua Man',
                'desc' => 'The king of the seven seas returns',
                'price' => 24.66
            ],
            [
                'name' => 'Avengers End Game',
                'desc' => 'The fall of Thanos is near',
                'price' => 46.45
            ],
        ];

        foreach ($films as $film) {
            factory(Film::class)->create(
                [
                    'name' => $film['name'],
                    'description' => $film['desc'], 
                    'slug' => Str::slug($film['name']), 
                    'ticket_price' => $film['price'],
                ]
            );
        }
    }
}
