<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Film;
use App\FilmGenre;
use App\Genre;
use App\FilmRating;
use App\Rating;
use App\Image;
use App\User;
use App\Comment;
use App\Country;

class FilmTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed("UsersTableSeeder");
        $this->seed("CountriesTableSeeder");
        $this->seed("GenresTableSeeder");
        $this->seed("RatingsTableSeeder");
    }

    /**
     * Test films get request.
     *
     * @return void
     */
    public function testCanFetchFilms()
    {
        $this->createFilms();
        $film = Film::first();

        $response = $this->get('/films');

        $response->assertViewHas(
            'films', 
            function ($films) use ($film) {
                return $films->contains($film);
            }
        );
        $response->assertViewIs('film.films');
        $response->assertSuccessful();
    }

    /**
     * Test films create request.
     *
     * @return void
     */
    public function testCanShowCreateFilm()
    {   
        $response = $this->get('/films/create');

        $response->assertViewHas('ratings');
        $response->assertViewHas('genres');
        $response->assertViewHas('countries');
        $response->assertViewIs('film.create');
        $response->assertSuccessful();
    }

    /**
     * Test films store request.
     *
     * @return void
     */
    // public function testCanStoreFilm()
    // {   
    //     $response = $this->post('/films', []);
        
    //     //$response->assertViewHas('ratings');
    //     //$response->assertViewHas('genres');
    //     //$response->assertViewHas('countries');
    //     //$response->assertViewIs('film.create');
    //     //$response->assertSuccessful();
    // }

    protected function createFilms()
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
            ]
        ];

        foreach ($films as $film) {
            $storedFilm = factory(Film::class)->create(
                [
                    'name' => $film['name'],
                    'description' => $film['desc'], 
                    'slug' => \Str::slug($film['name']), 
                    'ticket_price' => $film['price'],
                ]
            );

            factory(Image::class)->create(
                [
                    'film_id' => $storedFilm->id,
                    'img_path' => $film['image'],
                ]
            );

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

            factory(Comment::class)->create(
                [
                    'user_id' => User::first()->id,
                    'film_id' => $storedFilm->id
                ]
            );
        }
    }
}
