<?php

use Illuminate\Database\Seeder;

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
            factory(Country::class)->create(
                [
                    'name' => $rating['name'],
                    'description' => $rating['desc'] 
                ]
            );
        }
    }
}
