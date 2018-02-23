{{ method_field('PATCH') }}
<div class="small-12 columns">
    <label for="current_password" class="{{ $errors->has('current_password') ? 'is-invalid-label' : ''}}">Password Actual</label>
    <input type="password" id="current_password" name="current_password" class="{{ $errors->has('current_password') ? 'is-invalid-input' : ''}}"></div>
    @if( $errors->has('current_password') )
        <p class="validation-error">{{ $errors->first('current_password') }}</p>
    @endif
<div class="small-12 columns">
    <label for="password" class="{{ $errors->has('password') ? 'is-invalid-label' : ''}}">Password</label>
    <input type="password" id="password" name="password" class="{{ $errors->has('password') ? 'is-invalid-input' : ''}}"></div>
    @if( $errors->has('password') )
        <p class="validation-error">{{ $errors->first('password') }}</p>
    @endif
<div class="small-12 columns">
    <label for="password_confirmation">Repetir Password</label>
    <input type="password" id="password_confirmation" name="password_confirmation">
    @if( $errors->has('password_confirmation') )
        <p class="validation-error">{{ $errors->first('password_confirmation') }}</p>
    @endif
</div>
<div class="small-12 columns">
    <button type="submit" class="button">Actualizar</button>
</div>