@extends('layouts.app')

@section('content')

    <div>


            <p>{{ Session::get('message')  }}</p>


    </div>

    My post categories
    @if (!$categories->count())
        Nothing to show
    @else
        <ul>
            @foreach($categories as $category)
                {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'route' => array('categories.destroy', $category->id ))) !!}
                    <li><a href="{{ route('categories.show', $category->id ) }}">{{ $category->name }}</a><br/>
                        {!! link_to_route('categories.edit',trans('category.input.edit'),[ $category->id ])  !!}
                    </li>

                    {!! Form::submit(trans('messages.category.input.delete'), array('class' => 'btn btn-danger')) !!}
                {!! Form::close() !!}
            @endforeach
        </ul>


    @endif

    <p>
        <a href=" {{ route('categories.create') }}" >Create category</a>
    </p>
@endsection