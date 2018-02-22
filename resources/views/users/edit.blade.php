@extends('layouts.app')

@section('content')
    <div class="grid-x grid-margin-x">
        <div class="small-12 medium-4 cell">
            <table class="unstriped hover">
                <tbody>
                    <tr>
                        <td><a href="{{ route('profile.account') }}">Cuenta</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{ route('profile.password') }}">Password</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{ route('profile.avatar') }}">Avatar</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="small-12 medium-8 cell">
            <form action="">

                @if( Request::is('profile/account') )
                    @include('users.partials.account')
                @elseif( Request::is('profile/password') )
                    @include('users.partials.password')
                @endif

                <div class="small-12 columns">
                    <button type="submit" class="button">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection