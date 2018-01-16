@extends('layouts.app')

@section('content')
    <form action="{{ url('/') }}/chusqers/create" method="post">
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
@endsection