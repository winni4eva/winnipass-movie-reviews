<?php
namespace App\Repositories;


use App\Repositories\Interfaces\FilmRepositoryInterface;
use App\Film;
use Illuminate\Pagination\Paginator;

class FilmRepository implements FilmRepositoryInterface
{
    protected $model;

    public function __construct(Film $film)
    {
        $this->model = $film;
    }

    /**
     * Get all films
     *
     * @return mixed
     */
    public function get($paginate = 10): Paginator
    {
        return $this->model->with(['ratings.rating', 'genres.genre'], 'image')
            ->simplePaginate($paginate);
    }
}
