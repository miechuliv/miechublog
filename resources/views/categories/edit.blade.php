@extends('layouts.app')




@section('content')

        {!! Form::model($category , ['method' => 'PATCH' , 'route' => ['categories.update',$category->id] ] ) !!}

            @include('categories.partials._form' , ['submit_text' => 'Update category'] );

        {!! Form::close() !!}


        {!! link_to_route('categories.index',trans('categories.show.back')) !!}

@endsection