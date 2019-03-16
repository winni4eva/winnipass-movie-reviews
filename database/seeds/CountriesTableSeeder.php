<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = ['united states', 'germany', 'united kingdom', 'ghana'];

        foreach ($countries as $country) {
            factory(Country::class)->create(
                ['name' => $country]
            );
        }
    }
}
