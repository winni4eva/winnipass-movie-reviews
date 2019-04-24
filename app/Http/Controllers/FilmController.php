<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Film;
use App\Repositories\Interfaces\FilmRepositoryInterface;
use App\Http\Requests\FilmPost;
use App\Rating;
use App\Genre;
use App\Country;
use App\FilmRating;
use App\FilmGenre;
use App\Image;

class FilmController extends Controller
{
    protected $film;

    public function __construct(FilmRepositoryInterface $film)
    {
        $this->film = $film;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = 1;
        $films = $this->film->get($paginate);

        return view('film.films')->with(compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ratings = Rating::select('id', 'rating')->get();
        $genres = Genre::select('id', 'name')->get();
        $countries = Country::pluck('name', 'id');

        return view('film.create')->with(compact('ratings', 'genres', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\FilmPost  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilmPost $request)
    {
        logger('Made It');
        // $file = $request->file('image');
        $validatedRequest = $request->validated();

        $film = Film::create($validatedRequest->all());
        
        $ratings = $request->get('rating_id');
        $genres = $request->get('genre_id');
        $filmRatings = [];
        $filmGenres = [];

        collect($ratings ?? [])->map( 
            function ($rating) use (&$filmRatings) {
                $filmRatings[] = new FilmRating(['rating_id' => $rating]);
            }
        );

        collect($genres ?? [])->map(
            function ($rating) use (&$filmGenres) {
                $filmGenres[] = new FilmGenre(['genre_id' => $rating]);
            }
        );

        $path = $request->file->store('cover_photos');
        $film->ratings()->saveMany($filmRatings);
        $film->genres()->saveMany($filmGenres);
        $film->image()->save(new Image(['img_path' => $path]));


        return redirect()->route('films.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show($film)
    {
        $film = Film::with(['ratings.rating', 'genres.genre', 'image', 'comments.user'])->where('slug', $film)->orWhere('id', $film)->first();
    
        return view('film.show')->with(['film' => $film]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        //
    }
}
