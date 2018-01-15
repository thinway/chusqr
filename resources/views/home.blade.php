@extends('layouts.app')

@section('content')
    @forelse($chusqers as $chusquer)
    <div class="row chusq">
        <div class="col-md-2">
            <img src="{{ $chusquer['image'] }}/{{ $chusquer['id'] }}" alt="">
        </div>
        <div class="col-md-10">
            <p class="chusq-text">{{ $chusquer['content'] }}</p>
            <p><strong>Autor:</strong> {{ $chusquer['author'] }}</p>
        </div>
    </div>
    @empty
        <p>No hay chusqers para mostrar.</p>
    @endforelse
@endsection