@extends('layouts.app')

@section('content')
    <div class="row">
        @include('chusqers.newChusqer')
    </div>
    <div class="text-center">
        {{ $chusqers->links() }}
    </div>

    @forelse($chusqers as $chusquer)
        @include('chusqers.chusqer')
    @empty
        <p>No hay chusqers para mostrar.</p>
    @endforelse

    <div class="text-center">
        {{ $chusqers->links('pagination::bootstrap-4') }}
    </div>
@endsection
