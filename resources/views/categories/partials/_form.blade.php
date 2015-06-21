<div>
    @foreach($errors->get('name') as $message)

        <p>{{ $message  }}</p>

        @endforeach
</div>


<div class="form-group" >

        {!! Form::label('name', trans('messages.category.input.name') ) !!}
        {!! Form::text('name') !!}

</div>
<div class="form-group" >

    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}

</div>