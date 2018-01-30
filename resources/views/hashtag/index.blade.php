@extends('layouts.app')

@section('content')
    <h1>Contenido publicado en #{{ $hashtag->slug }} </h1>
    @foreach($hashtag->chusqers as $chusquer)
        @include('chusqers.chusqer')
    @endforeach
@endsection