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
                <figure class="movie-poster"><img src="{{$film->image->img_path}}" alt="#"></figure>
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
                        <li><strong>Genres:</strong> 
                            @foreach($film->genres as $genre)
                                {{$genre->genre->name}} /
                            @endforeach
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    @guest
                        <li class="menu-item" style="visibility: hidden">
                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @else
                        <h3>Comment</h3>
                        {!! Form::open(['route' => ['comments.store'], 'enctype' => 'multipart/form-data']) !!}
                            <input type="hidden" name="film_id" id="film_id" value="{{$film->id}}"/>
                            {!! Form::textarea('comments', null, ['class'=>'form-control']) !!}

                            {!! Form::submit('Comment', ['class' =>  'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    @endguest
                </div>
            </div> <!-- .row -->
            <div class="entry-content">
                <p>{{$film->description}}</p>
            </div>
        </div>
    </div>
</div> <!-- .container -->
@endsection