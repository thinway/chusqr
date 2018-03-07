@extends('layouts.app')

@section('content')
    <form action="{{ Route('chusqers.patch', $chusqer) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="small-10 cell">
            <input id="content" type="text" name="content" value="{{ $chusqer->content }}" aria-describedby="contentHelpText" class="{{ $errors->has('content') ? 'is-invalid-input' : ''}}">
            @if( $errors->has('content') )
                <p class="validation-error">{{ $errors->first('content') }}</p>
            @endif
            <p class="help-text" id="contentHelpText">Introduce un nuevo Chusqer</p>
        </div>
        <img src="{{ $chusqer->image }}" alt="Image of chusqer {{ $chusqer->id }}">
        <label for="image" class="button">Añadir Imagen</label>
        <input type="file" id="image" name="image" class="show-for-sr">
    </form>
@endsection