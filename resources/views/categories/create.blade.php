@extends('layouts.app')




@section('content')

        {!! Form::model(new App\Category , ['route' => ['categories.store'] ] ) !!}

            @include('categories/partials/_form' , ['submit_text' => 'Create category'] );

        {!! Form::close() !!}

@endsection