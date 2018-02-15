@extends('layouts.app')

@section('content')
    <div class="grid-x grid-margin-x">
        <div class="small-12 medium-4 cell">
            argo
        </div>
        <div class="small-12 medium-8 cell">
            @foreach($conversation->privateMessages as $message)
                <div class="card-divider">
                    {{ $message->content }}
                </div>
                <p class="chusqer-content">
                    {{ $message->created_at }}
                </p>
                <div class="card-section">
                    {{ $message->user->name }}
                </div>
            @endforeach
        </div>
    </div>
@stop