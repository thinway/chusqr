<div class="card @isset($user) @if($user->id == $chusqer->user_id) mine @endif @endisset">
    <div class="card-divider">
        <p>Añadido por <a href="/{{ $chusqer->user->slug }}">{{ $chusqer->user->name }}</a> - <a href="{{ url('/') }}/chusqers/{{ $chusqer['id'] }}">Leer más</a></p>
    </div>
    <p class="chusqer-content">
        <img src="{{ $chusqer->image }}" alt="">{{ $chusqer->content }}
    </p>
    <p class="chusqer-hashtags text-right">
        @foreach($chusqer->hashtags as $hashtag)
            <a href="/hashtag/{{ $hashtag->slug }}"><span class="label label-primary">{{ $hashtag->slug }}</span></a>
        @endforeach
    </p>
    @can('delete', $chusqer)
    <div class="card-section">
        <form action="{{ Route('chusqers.delete', $chusqer->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" class="button alert">Borra</button>
        </form>
    </div>
    @endcan
</div>