@extends('layouts.app')

@section('content')
    <div class="row">
        @include('chusqers.newChusqer')
    </div>
    <div class="text-center">
        {{ $chusqers->links() }}
    </div>


    @forelse($chusqers as $chusquer)
        <div class="row chusq">
            <div class="col-md-12">
                <p class="chusq-text">{{ $chusquer['content'] }}</p>
                <p><strong>Autor:</strong> {{ $chusquer->user->name }}</p>
            </div>
        </div>
    @empty
        <p>No hay chusqers para mostrar.</p>
    @endforelse

    <div class="text-center">
        {{ $chusqers->links('pagination::bootstrap-4') }}
    </div>
@endsection
