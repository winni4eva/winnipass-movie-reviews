<?php

use Illuminate\Database\Seeder;
use App\Rating;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Rating::class)->create(['rating' => 1]);
        factory(Rating::class)->create(['rating' => 2]);
        factory(Rating::class)->create(['rating' => 3]);
        factory(Rating::class)->create(['rating' => 4]);
        factory(Rating::class)->create(['rating' => 5]);
    }
}
