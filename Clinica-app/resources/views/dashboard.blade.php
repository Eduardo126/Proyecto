<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>

        <!-- Mostrar las publicaciones -->
        @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->user->name }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                    <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>

                    <!-- Botones de interacción -->
                    <div class="d-flex mt-2">
                        @if(!$post->likes->contains('user_id', auth()->id()))
                            <form action="{{ route('posts.like', $post->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-primary me-2">Me gusta</button>
                            </form>
                        @else
                            <form action="{{ route('posts.unlike', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger me-2">No me gusta</button>
                            </form>
                        @endif
                        <button class="btn btn-sm btn-outline-secondary">Comentar</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

