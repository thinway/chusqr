@extends('layouts.app')

@section('content')
    <div class="grid-x align-center">

        <div class="cell small-6">
            <h1>Crea tu cuenta</h1>
            <hr>
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="small-12 columns">
                    <label class="{{ $errors->has('name') ? 'is-invalid-label' : ''}}">Nombre
                        <input id="name" type="text" name="name" value="{{ old('name') }}" aria-describedby="nameHelpText" class="{{ $errors->has('name') ? 'is-invalid-input' : ''}}">
                    </label>
                    @if( $errors->has('name') )
                        <p class="validation-error">{{ $errors->first('name') }}</p>
                    @endif
                    <p class="help-text" id="nameHelpText">Introduce un nombre</p>
                </div>

                <div class="small-12 columns">
                    <label class="{{ $errors->has('email') ? 'is-invalid-label' : ''}}">Email
                        <input id="email" type="text" name="email" value="{{ old('email') }}" class="{{ $errors->has('name') ? 'is-invalid-input' : ''}}" aria-describedby="emailHelpText" >
                    </label>
                    @if( $errors->has('email') )
                        <p class="validation-error">{{ $errors->first('email') }}</p>
                    @endif
                    <p class="help-text" id="emailHelpText">Introduce un email</p>
                </div>

                <div class="small-12 columns">
                    <label class="{{ $errors->has('password') ? 'is-invalid-label' : ''}}">Contraseña
                        <input id="password" type="password" name="password" class="{{ $errors->has('password') ? 'is-invalid-input' : ''}}" value="{{ old('password') }}" aria-describedby="passwordHelpText" >
                    </label>
                    @if( $errors->has('password') )
                        <p class="validation-error">{{ $errors->first('password') }}</p>
                    @endif
                    <p class="help-text" id="emailHelpText">Introduce una contraseña</p>
                </div>

                <div class="small-12 columns">
                    <label class="{{ $errors->has('password') ? 'is-invalid-label' : ''}}">Confirmar contraseña
                        <input id="password-confirm" type="password" name="password_confirmation" class="{{ $errors->has('password') ? 'is-invalid-input' : ''}}" value="" >
                    </label>
                    <p class="help-text" id="emailHelpText">Confirma la contraseña</p>
                </div>

                <div class="small-12 columns">
                    <button type="submit" class="button">
                        Registro
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
