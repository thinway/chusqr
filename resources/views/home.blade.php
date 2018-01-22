@extends('layouts.app')

@section('content')
    <div class="row">
        <form action="/chusqers/create" method="post">
            {{ csrf_field() }}
            <div class="form-group @if( $errors->has('content'))has-error @endif">
                <input type="text" class="form-control" id="content" name="content" placeholder="What's going on!">
            </div>
            @if($errors->has('content'))
                @foreach($errors->get('content') as $message)
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @endforeach
            @endif
        </form>
    </div>
    <div class="text-center">
        {{ $chusqers->links() }}
    </div>


    @forelse($chusqers as $chusquer)
    <div class="row chusq">
        <div class="col-md-12">
            <p class="chusq-text">{{ $chusquer['content'] }}</p>
            <p><strong>Autor:</strong> {{ $chusquer['author'] }}</p>
        </div>
    </div>
    @empty
        <p>No hay chusqers para mostrar.</p>
    @endforelse

    <div class="text-center">
        {{ $chusqers->links('pagination::bootstrap-4') }}
    </div>

@endsection