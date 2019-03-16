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
        $ratings = [
            ['name' => 'PG', 'desc' => 'Parental Gudance'],
            ['name' => '18', 'desc' => 'Eighteen and above'],  
        ];

        foreach ($ratings as $rating) {
            factory(Rating::class)->create(
                [
                    'name' => $rating['name'],
                    'description' => $rating['desc'] 
                ]
            );
        }
    }
}