<div class="row chusq">
    <div class="col-md-12">
        <p class="chusq-text">{{ $chusquer->content }}</p>
        <p>
            @foreach($chusquer->hashtags as $hashtag)
                <a href="/hashtag/{{ $hashtag->id }}">
            <span class="label label-primary">#{{ $hashtag->slug }}</span>
                </a>
            @endforeach
        </p>
        <p><strong>Autor:</strong> <a href="/users/{{ $chusquer->user->id }}">{{ $chusquer->user->name }}</a></p>
        <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($chusquer->created_at)->format('d/m/Y') }}</p>

    </div>
</div>