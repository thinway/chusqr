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
                        <th>Chusqers</th>
                        <th class="text-center"><a href="/{{ $user->slug }}/follows">Following</a></th>
                        <th class="text-center"><a href="/{{ $user->slug }}/followers">Followers</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $user->chusqers->count() }}</td>
                        <td>{{ $user->follows->count() }}</td>
                        <td>{{ $user->followers->count() }}</td>
                    </tr>
                    </tbody>
                </table>
            <div class="info-user">
                <img src="https://picsum.photos/300/300/?random" alt="" class="img-responsive">
                <h2>{{ $user->name }}</h2>
                <h3>&#64;{{ str_slug($user->name, "-") }}</h3>
                @if(Auth::check() && !Auth::user()->isMe($user))
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
                    @if(Gate::allows('dms', $user))
                        <form action="/{{ $user->slug }}/dms" method="post">
                            {{ csrf_field() }}
                            <textarea name="message" id="message" rows="5"></textarea>
                            <button type="submit" class="button">Mensaje Directo</button>
                        </form>
                    @endif
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