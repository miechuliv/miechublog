@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="box">
            <div class="col-lg-12">

                <div>
                    @foreach($errors as $message)

                        <p>{{ $message  }}</p>

                    @endforeach
                </div>


                <hr>
                <h2 class="intro-text text-center">{{ trans('front/register.title') }}</h2>
                <hr>
                <p>{{ trans('front/register.infos') }}</p>

                {!! Form::open(['url' => 'auth/register', 'method' => 'post', 'role' => 'form']) !!}

                <div class="row">

                    {!! Form::text('name') !!}
                    {!! Form::text('email') !!}
                </div>
                <div class="row">
                    {!! Form::password('password') !!}
                    {!! Form::password('password_confirmation') !!}
                </div>


                <div class="row">
                    {!! Form::submit(trans('messages.register.submit'), ['col-lg-12']) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection

