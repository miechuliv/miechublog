@extends('layouts.app')

@section('content')

    <table>
        <tr>
            <td>{{ trans('category.input.name') }}</td>
            <td>{{ $category->name }}</td>
        </tr>
    </table>


    {!! link_to_route('categories.index',trans('categories.show.back')) !!}

@endsection