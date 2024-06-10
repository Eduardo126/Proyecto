@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Perfil del usuario -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('Perfil') }}</div>
                <div class="card-body text-center">
                    <img src="https://via.placeholder.com/150" class="rounded-circle mb-3" alt="User Image">
                    <h4>{{ Auth::user()->name }}</h4>
                    <p>{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>

        <!-- Contenido principal -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>{{ __('You are logged in!') }}</p>
                </div>
            </div>

            <!-- Sección de publicaciones -->
            <div class="card mb-4">
                <div class="card-header">{{ __('Publicaciones') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <textarea class="form-control" name="content" placeholder="¿Qué estás pensando?" required></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="file" name="image" class="form-control">
                        </div>
                        <button class="btn btn-primary mt-2" type="submit">Publicar</button>
                    </form>

                    <!-- Mostrar publicaciones -->
                    @if(isset($posts) && $posts->count())
                        @foreach($posts as $post)
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <img src="https://via.placeholder.com/50" class="rounded-circle me-2" alt="User Image">
                                        <div>
                                            <h5 class="m-0">{{ $post->user->name }}</h5>
                                            <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                    <p class="mt-2">{{ $post->content }}</p>
                                    @if($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mt-2" alt="Imagen de la publicación">
                                    @endif
                                    <div class="d-flex mt-2">
                                        <form action="{{ route('posts.like', $post->id) }}" method="POST" class="me-2">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-primary">Me gusta</button>
                                        </form>
                                        <form action="{{ route('posts.unlike', $post->id) }}" method="POST" class="me-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">No me gusta</button>
                                        </form>
                                        <button class="btn btn-sm btn-outline-secondary">Comentar</button>
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
                    @else
                        <p>No hay publicaciones disponibles.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Barra lateral de sugerencias -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('Sugerencias de Amigos') }}</div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex">
                            <img src="https://via.placeholder.com/50" class="rounded-circle me-2" alt="User Image">
                            <div>
                                <h6 class="m-0">Nombre de Amigo</h6>
                                <button class="btn btn-sm btn-primary mt-1">Agregar</button>
                            </div>
                        </li>
                        <li class="mb-3 d-flex">
                            <img src="https://via.placeholder.com/50" class="rounded-circle me-2" alt="User Image">
                            <div>
                                <h6 class="m-0">Nombre de Amigo</h6>
                                <button class="btn btn-sm btn-primary mt-1">Agregar</button>
                            </div>
                        </li>
                        <!-- Agregue más sugerencias de amigos según sea necesario -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .post {
        border-bottom: 1px solid #e9ecef;
        padding-bottom: 1rem;
    }
    .post:last-child {
        border-bottom: none;
    }
</style>


