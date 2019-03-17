<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\Rating;
use App\Genre;
use App\Country;
use App\FilmRating;
use App\FilmGenre;
use App\Image;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::with(['ratings.rating', 'genres.genre'], 'image')->simplePaginate(1);

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('image');

        $film = Film::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'ticket_price' => $request->get('ticket_price'),
            'release_date' => $request->get('release_date'),
            'country_id' => $request->get('country_id'),
            'slug' => \Str::slug($request->get('name')),
        ]);
        
        $ratings = $request->get('rating_id');
        $genres = $request->get('genre_id');
        
        collect($ratings)->map(function($rating)use($film){
            $film->ratings()->save(new FilmRating(['rating_id' => $rating]));
        });

        collect($genres)->map(function($rating)use($film){
            $film->genres()->save(new FilmGenre(['genre_id' => $rating]));
        });
   
        $destinationPath = public_path().'/cover_photos';
        $file->move($destinationPath, $file->getClientOriginalName());
        $path = "/cover_photos/".$file->getClientOriginalName();
        
        $film->image()->save(new Image(['img_path' =>$path]));

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
