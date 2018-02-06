@extends('layouts.app')

@section('content')
    <div class="grid-x grid-margin-x">
    @foreach($user->follows->chunk(3) as $row)
            @foreach($row as $user)
                <div class="small-4 cell">
                <div class="card">
                    <img src="https://picsum.photos/200/200/?random">
                    <div class="card-section">
                        <h4><a href="/{{ $user->slug }}">&#64;{{ $user->slug }}</a></h4>
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
                    </div>
                </div>
                </div>
            @endforeach

    @endforeach
    </div>
@endsection