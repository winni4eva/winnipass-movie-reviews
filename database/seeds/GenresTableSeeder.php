<?php

use Illuminate\Database\Seeder;
use App\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = ['adventure', 'action', 'comedy'];

        foreach ($genres as $genre) {
            factory(Genre::class)->create(
                ['name' => $genre]
            );
        }
    }
}
