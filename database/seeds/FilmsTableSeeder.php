<?php

use Illuminate\Database\Seeder;
use App\Film;
use App\FilmGenre;
use App\Genre;
use App\FilmRating;
use App\Rating;
use App\Image;

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
                'price' => 34.32,
                'image' => '/cover_photos/lord-of-the-rings.jpeg',
            ],
            [
                'name' => 'Aqua Man',
                'desc' => 'The king of the seven seas returns',
                'price' => 24.66,
                'image' => '/cover_photos/aqua_man_poster_queen_atlanna.jpg',
            ],
            [
                'name' => 'Avengers End Game',
                'desc' => 'The fall of Thanos is near',
                'price' => 46.45,
                'image' => '/cover_photos/avengers-end-game.png',
            ],
        ];

        foreach ($films as $film) {
            $storedFilm = factory(Film::class)->create(
                [
                    'name' => $film['name'],
                    'description' => $film['desc'], 
                    'slug' => Str::slug($film['name']), 
                    'ticket_price' => $film['price'],
                ]
            );

            factory(Image::class)->create([
                'film_id' => $storedFilm->id,
                'img_path' => $film['image'],
            ]);

            factory(FilmGenre::class, 3)->create(
                [
                    'film_id' => $storedFilm->id,
                    'genre_id' => Genre::inRandomOrder()->first()
                ]
            );

            factory(FilmRating::class, 3)->create(
                [
                    'film_id' => $storedFilm->id,
                    'rating_id' => Rating::inRandomOrder()->first()
                ]
            );
        }
    }
}
