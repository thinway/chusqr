@extends('layouts.app')

@section('content')
    <div class="small-12 column">
        @include('chusqers.newChusqer')
    </div>
    @forelse($chusqers as $chusqer)
        <div class="small-12 column">
            @include('chusqers.chusqer')
        </div>
    @empty
        <div class="row">
            <p>No hay mensajes para mostrar</p>
        </div>
    @endforelse

    <div class="text-center">
        {{ $chusqers->appends(request()->except('page'))->links() }}
    </div>
@endsection
