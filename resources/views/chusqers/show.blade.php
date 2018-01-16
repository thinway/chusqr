@extends('layouts.app')

@section('content')
    <div>
        <p>{{ $chusqer['content'] }}</p>
        <p>Autor: <strong>{{ $chusqer['author'] }}</strong></p>
        <p>Fecha: <strong>{{ $chusqer['created_at'] }}</strong></p>
    </div>
@endsection