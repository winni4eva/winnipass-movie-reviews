<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Film;
use App\FilmGenre;
use App\Genre;
use App\FilmRating;
use App\Rating;
use App\Image;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->seed("DatabaseSeeder");

        $films = [
            [
                'name' => 'Lord Of The Rings',
                'description' => 'The adventures of frodo baggins',
                'ticket_price' => 34.32
            ]
        ];

        foreach ($films as $film) {
            $storedFilm = factory(Film::class)->create(
                [
                    'name' => $film['name'],
                    'description' => $film['description'], 
                    'slug' => \Str::slug($film['name']), 
                    'ticket_price' => $film['ticket_price'],
                ]
            );

            factory(Image::class)->create([
                'film_id' => $storedFilm->id,
                'img_path' => '/cover_photos/lord-of-the-rings.jpeg',
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
        
        $this->assertDatabaseHas('films', $films[0]);
    }
}
