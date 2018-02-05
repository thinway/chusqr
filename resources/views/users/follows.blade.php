@extends('layouts.app')

@section('content')
    <ul>
    @foreach($user->follows as $follow)
        <li><a href="/{{ $follow->slug }}">{{ $follow->name}}</a></li>
    @endforeach
    </ul>
@endsection