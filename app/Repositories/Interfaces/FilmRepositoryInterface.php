<?php

namespace App\Repositories\Interfaces;

use App\Film;
use Illuminate\Pagination\Paginator;

interface FilmRepositoryInterface
{

    /**
     * Get all films
     *
     * @return mixed
     */
    public function get($paginate = 10): Paginator;
}