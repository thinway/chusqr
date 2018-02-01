@extends('layouts.app')

@section('content')
    <h1>Contenido publicado en #{{ $hashtag->slug }} </h1>
    @foreach($hashtag->chusqers as $chusqer)
        @include('chusqers.chusqer')
    @endforeach
@endsection