@auth()
    <form action="/chusqers/create" method="post">
        {{ csrf_field() }}
        <div class="small-12 cell">
            <input id="content" type="text" name="content" value="{{ old('content') }}" aria-describedby="contentHelpText" class="{{ $errors->has('content') ? 'is-invalid-input' : ''}}">
            @if( $errors->has('content') )
                <p class="validation-error">{{ $errors->first('content') }}</p>
            @endif
            <p class="help-text" id="contentHelpText">Introduce un nuevo Chusqer</p>
        </div>
    </form>
@endauth