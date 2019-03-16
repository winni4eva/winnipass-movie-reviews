<?php

use Illuminate\Database\Seeder;

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
                'desc' => 'The adventures of frodo baggins'
            ],
            [
                'name' => 'Aqua Man',
                'desc' => 'The king of the seven seas returns'
            ],
            [
                'name' => 'Avengers End Game',
                'desc' => 'The fall of Thanos is near'
            ],
        ];

        foreach ($films as $film) {
            factory(Rating::class)->create(
                [
                    'name' => $film['name'],
                    'description' => $rating['desc'], 
                    'slug' => Str::slug($film['name']), 
                ]
            );
        }
    }
}
