@extends('layouts.app')

@section('content')
    <h1>Mensajes escritos por {{ $user->name }}</h1>
    @forelse($chusqers as $chusquer)
        @include('chusqers.chusqer')
    @empty
        <p>No hay chusqers para mostrar.</p>
    @endforelse

    {{ $chusqers->links() }}
@endsection