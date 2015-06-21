@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                @if(session()->has('error'))
                    @include('partials/error', ['type' => 'danger', 'message' => session('error')])
                @endif
                <hr>
                <h2 class="intro-text text-center">{{ trans('front/login.connection') }}</h2>
                <hr>
                <p>{{ trans('front/login.text') }}</p>

                {!! Form::open(['url' => 'auth/login', 'method' => 'post', 'role' => 'form']) !!}

                <div class="row">

                    {!! Form::text('email') !!}
                    {!! Form::password('password') !!}
                    {!! Form::submit(trans('messages.login.submit')) !!}



                </div>

                {!! Form::close() !!}

                <div class="text-center">

                    {!! link_to('auth/register', trans('messages.login.register'), ['class' => 'btn btn-default']) !!}
                </div>

            </div>
        </div>
    </div>
@stop