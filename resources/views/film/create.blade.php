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
                    {!! Form::open(['route' => ['films.store']]) !!}
                    <div class="form-group form-horizontal">
                        <div class="form-group">
                                {!! Form::label('name', 'Title:', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::Text('name', null, ['class' => 'form-control']) !!}
                            </div>  
                        </div>
                        <div class="form-group">
                                {!! Form::label('description', 'Description:', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::Text('description', null, ['class' => 'form-control']) !!}
                            </div>  
                        </div>
                        <div class="form-group">
                                {!! Form::label('ticket_price', 'Ticket Price:', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::Text('ticket_price', null, ['class' => 'form-control']) !!}
                            </div>  
                        </div>
                        <div class="form-group">
                                {!! Form::label('release_date', 'Release date:', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::input('date', 'release_date', date('Y-m-d'), ['class' => 'form-control']) !!}
                            </div>  
                        </div>
                        <div class="form-group">
                                {!! Form::label('rating_id', 'Select Rating:', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('rating_id', $ratings, null, ['class' => 'form-control']) !!}
                            </div>  
                        </div>
                        <div class="form-group">
                                {!! Form::label('rating_id', 'Select Genre:', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('rating_id', $genres, null, ['class' => 'form-control']) !!}
                            </div>  
                        </div>
                        <div class="form-group">
                                {!! Form::label('rating_id', 'Select Genre:', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::select('rating_id', $countries, null, ['class' => 'form-control']) !!}
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