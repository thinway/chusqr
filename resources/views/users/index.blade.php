@extends('layouts.app')

@section('content')
    <div class="grid-x grid-margin-x">
        <div class="small-12 medium-4 cell">
            <div class="info-user">
                <img src="https://picsum.photos/300/300/?random" alt="" class="img-responsive">
                <h2>{{ $user->name }}</h2>
                <h3>&#64;{{ str_slug($user->name, "-") }}</h3>
            </div>
        </div>
        <div class="small-12 medium-8 cell">
            @foreach($chusqers as $chusqer)
                @include('chusqers.chusqer')
            @endforeach
            {{ $chusqers->links() }}
        </div>
    </div>
@endsection