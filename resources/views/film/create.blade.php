@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page">
        <div class="breadcrumbs">
            <a href="{{route('home')}}">Home</a>
            <span>Create Film</span>
        </div>

        <div class="content">
            <div class="row">
                    {!! Form::open(['route' => ['films.store'], 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group form-horizontal">
                        <div class="form-group">
                                {!! Form::label('name', 'Title:', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::Text('name', null, ['class' => 'form-control']) !!}
                                @if ($errors->has('name'))
                                    <span class="error">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>  
                        </div>
                        <div class="form-group">
                                {!! Form::label('description', 'Description:', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::Text('description', null, ['class' => 'form-control']) !!}
                                @if ($errors->has('description'))
                                    <span class="error">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>  
                        </div>
                        <div class="form-group">
                                {!! Form::label('ticket_price', 'Ticket Price:', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::Text('ticket_price', null, ['class' => 'form-control']) !!}
                                @if ($errors->has('ticket_price'))
                                    <span class="error">
                                        <strong>{{ $errors->first('ticket_price') }}</strong>
                                    </span>
                                @endif
                            </div>  
                        </div>
                        <div class="form-group">
                                {!! Form::label('release_date', 'Release date:', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('date', 'release_date', date('Y-m-d'), ['class' => 'form-control']) !!}
                                @if ($errors->has('release_date'))
                                    <span class="error">
                                        <strong>{{ $errors->first('release_date') }}</strong>
                                    </span>
                                @endif
                            </div>  
                        </div>
                        <div class="form-group">
                                {!! Form::label('rating_id', 'Select Rating:', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                @foreach($ratings as $rating)
                                    {{$rating->rating}} {!! Form::checkbox('rating_id[]', $rating->id) !!}
                                @endforeach
                            </div>  
                            @if ($errors->has('rating_id'))
                                <span class="error">
                                    <strong>{{ $errors->first('rating_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                                {!! Form::label('genre_id', 'Select Genre:', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                @foreach($genres as $genre)
                                    {{$genre->name}} {!! Form::checkbox('genre_id[]', $genre->id) !!}
                                @endforeach
                            </div>
                            @if ($errors->has('genre_id'))
                                <span class="error">
                                    <strong>{{ $errors->first('genre_id') }}</strong>
                                </span>
                            @endif  
                        </div>
                        <div class="form-group">
                                {!! Form::label('country_id', 'Select Country:', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('country_id', $countries, null, ['class' => 'form-control']) !!}
                                @if ($errors->has('country_id'))
                                    <span class="error">
                                        <strong>{{ $errors->first('country_id') }}</strong>
                                    </span>
                                @endif 
                            </div>  
                        </div>
                        <div class="form-group">
                            {!! Form::label('image', 'Cover Photo:', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="image"/>
                                @if ($errors->has('file'))
                                    <span class="error">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Create Film', ['class' =>  'btn btn-primary']) !!}
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div> <!-- .row -->
        </div>
    </div>
</div> <!-- .container -->
@endsection