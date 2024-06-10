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
                    </div>

                    <!-- Mostrar los comentarios -->
                    <div class="mt-4">
                        @foreach($post->comments as $comment)
                            <div class="mb-2">
                                <strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}
                                <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                            </div>
                        @endforeach
                    </div>

                    <!-- Formulario para agregar un comentario -->
                    <form action="{{ route('comments.store', $post->id) }}" method="POST" class="mt-3">
                        @csrf
                        <div class="mb-3">
                            <textarea name="content" class="form-control" rows="2" placeholder="Escribe un comentario..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-sm btn-outline-secondary">Comentar</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
