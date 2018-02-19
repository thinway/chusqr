@auth()
    <form action="/chusqers/create" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="small-10 cell">
            <input id="content" type="text" name="content" value="{{ old('content') }}" aria-describedby="contentHelpText" class="{{ $errors->has('content') ? 'is-invalid-input' : ''}}">
            @if( $errors->has('content') )
                <p class="validation-error">{{ $errors->first('content') }}</p>
            @endif
            <p class="help-text" id="contentHelpText">Introduce un nuevo Chusqer</p>
        </div>
        <div class="small-2 cell">
            <label for="image" class="button">Añadir Imagen</label>
            <input type="file" id="image" name="image" class="show-for-sr">
        </div>
    </form>
@endauth