@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Profile Sidebar -->
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

        <!-- Main Content -->
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

            <!-- Post Section -->
            <div class="card mb-4">
                <div class="card-header">{{ __('Publicaciones') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf
                        <div class="mb-3">
                            <textarea class="form-control" name="content" placeholder="¿Qué estás pensando?" required></textarea>
                            <button class="btn btn-primary mt-2" type="submit">Publicar</button>
                        </div>
                    </form>

                    <!-- Display Posts -->
                    @if(isset($posts) && $posts->count())
                        @foreach($posts as $post)
                            <div class="post mb-3">
                                <div class="d-flex">
                                    <img src="https://via.placeholder.com/50" class="rounded-circle me-2" alt="User Image">
                                    <div>
                                        <h5 class="m-0">{{ $post->user->name }}</h5>
                                        <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                                <p class="mt-2">{{ $post->content }}</p>
                                <div class="d-flex">
                                    <button class="btn btn-sm btn-outline-primary me-2">Me gusta</button>
                                    <button class="btn btn-sm btn-outline-secondary">Comentar</button>
                                </div>
                            </div>
                        @endforeach
                    @else
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                    
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                                        @endif
                </div>
            </div>
        </div>

        <!-- Suggestions Sidebar -->
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
                        <!-- Add more friend suggestions as needed -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .post {
        border-bottom: 1px solid #e9ecef;
        padding-bottom: 1rem;
    }
    .post:last-child {
        border-bottom: none;
    }
</style>
@endsection


