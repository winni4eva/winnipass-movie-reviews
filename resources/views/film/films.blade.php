@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page">
        <div class="row">
            @foreach($films as $film)
                <div class="col-sm-6 col-md-3">
                    <div class="latest-movie">
                    <a href="{{route('film', ['slug' => $film->slug])}}"><img src="{{$film->image->img_path}}" alt="Movie 3"></a>
                    </div>
                <h3><a href="{{route('film', ['slug' => $film->slug])}}">{{$film->name}}</a></h3>
                </div>
            @endforeach
        </div> <!-- .row -->
    </div>
</div> <!-- .container -->

@endsection