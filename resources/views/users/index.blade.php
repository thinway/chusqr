@extends('layouts.app')

@section('content')
    <div class="grid-x grid-margin-x">
        <div class="small-12 medium-4 cell">
            @if(session('success'))
            <div class="callout primary">
                <h5>{{ Session::get('success') }}</h5>
            </div>
            @endif
                <table class="text-center">
                    <thead>
                    <tr>
                        <th class="text-center"><a href="/{{ $user->slug }}/follows">Following</a></th>
                        <th class="text-center">Followers</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ count($user->follows) }}</td>
                        <td>{{ count($user->followers) }}</td>
                    </tr>
                    </tbody>
                </table>
            <div class="info-user">
                <img src="https://picsum.photos/300/300/?random" alt="" class="img-responsive">
                <h2>{{ $user->name }}</h2>
                <h3>&#64;{{ str_slug($user->name, "-") }}</h3>
                @if( Auth::user()->isFollowing($user))
                    <form action="{{ $user->slug }}/unfollow" method="post">
                        {{ csrf_field() }}
                        <button type="submit" class="alert button">Unfollow</button>
                    </form>
                @else
                    <form action="{{ $user->slug }}/follow" method="post">
                        {{ csrf_field() }}
                        <button type="submit" class="button">Follow</button>
                    </form>
                @endif
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