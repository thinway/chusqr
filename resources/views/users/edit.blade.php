@extends('layouts.app')

@section('content')
    <div class="grid-x grid-margin-x">
        <div class="small-12 medium-4 cell">
            <table class="unstriped hover">
                <tbody>
                    <tr>
                        <td class="{{ Request::is('profile/account') ? 'mine' : '' }}">
                            <a href="{{ route('profile.account') }}">Cuenta</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="{{ Request::is('profile/password') ? 'mine' : '' }}">
                            <a href="{{ route('profile.password') }}">Password</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="{{ Request::is('profile/avatar') ? 'mine' : '' }}">
                            <a href="{{ route('profile.avatar') }}">Avatar</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="{{ Request::is('profile/avatar') ? 'mine' : '' }}">
                            <a href="{{ route('profile.avatar') }}">Avatar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="small-12 medium-8 cell">
            @if( session('exito') )
                <div class="callout primary">
                    <h5>Actualización correcta</h5>
                </div>
            @elseif( session('error'))
                <div class="callout alert">
                    <h5>{{ session('error') }}</h5>
                </div>
            @endif
            <form action="{{ Request::url() }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

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