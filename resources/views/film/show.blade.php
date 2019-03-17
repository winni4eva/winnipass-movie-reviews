@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page">
        <div class="breadcrumbs">
            <a href="{{route('home')}}">Home</a>
            <span>{{$film->name}}</span>
        </div>

        <div class="content">
            <div class="row">
                <div class="col-md-6">
                    <figure class="movie-poster"><img src="dummy/single-image.jpg" alt="#"></figure>
                </div>
                <div class="col-md-6">
                    <h2 class="movie-title">{{$film->name}}</h2>
                    <ul class="movie-meta">
                        <li><strong>Ratings:</strong> 
                            @foreach($film->ratings as $rating)
                                <div>
                                    <span style="width:80%"><strong class="rating">{{$rating->rating->rating}}</strong> out of 5</span>
                                </div>
                            @endforeach
                        </li>
                        <li><strong>Category:</strong> 
                            @foreach($film->genres as $genre)
                                <p>{{$genre->genre->name}}</p>
                            @endforeach
                        </li>
                        {{-- <li><strong>Length:</strong> 98 min</li>
                        <li><strong>Premiere:</strong> 22 March 2013 (USA)</li>
                         --}}
                    </ul>
                </div>
            </div> <!-- .row -->
            <div class="entry-content">
                <p>vitae iaculis nulla cursus in. Suspendisse potenti. In et fringilla ipsum, quis varius quam.</p>
            </div>
        </div>
    </div>
</div> <!-- .container -->
@endsection