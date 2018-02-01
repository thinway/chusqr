@extends('layouts.app')

@section('content')
    <div class="grid-x align-center">
        <div class="cell small-6">
            <h1>Accede a Chusqer</h1>
            <hr>
            <form method="POST" action="{{ route('login') }}" data-abide novalidate>

                {{ csrf_field() }}

                <div class="small-12 cell">
                    <label class="{{ $errors->has('email') ? 'is-invalid-label' : ''}}">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" aria-describedby="emailHelpText" class="{{ $errors->has('email') ? 'is-invalid-input' : ''}}">
                    @if( $errors->has('email') )
                        <p class="validation-error">{{ $errors->first('email') }}</p>
                    @endif
                    <p class="help-text" id="emailHelpText">Introduce tu Email</p>
                </div>

                <div class="small-12 cell">
                    <label class="{{ $errors->has('password') ? 'is-invalid-label' : ''}}">Contraseña</label>
                    <input id="password" type="password" name="password" value="{{ old('password') }}" aria-describedby="passwordHelpText" class="{{ $errors->has('password') ? 'is-invalid-input' : ''}}">
                    @if( $errors->has('password') )
                        <p class="validation-error">{{ $errors->first('password') }}</p>
                    @endif
                    <p class="help-text" id="passwordHelpText">Introduce tu Contraseña</p>
                </div>

                <div class="grid-x grid-padding-x align-center-middle text-">
                    <div class="cell small-3">
                        <button type="submit" class="button">
                            Login
                        </button>
                    </div>
                    <div class="cell small-9">
                        <a href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
