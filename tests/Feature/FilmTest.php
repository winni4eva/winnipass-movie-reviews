<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * Home page redirect test
     *
     * @return void
     */
    public function testHomePageCanRedirectToFilms()
    {
        $response = $this->get('/')
            ->assertStatus(302);
    }
}
