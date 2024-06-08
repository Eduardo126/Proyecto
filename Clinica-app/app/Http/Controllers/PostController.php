<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(Request $request)
// Validar el contenido de la solicitud

    {
        $request->validate([
            'content' => 'required|max:255',
        ]);
// Crear una nueva publicación
        Post::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);
// Redirigir de vuelta con un mensaje de éxito

        return redirect()->back()->with('status', 'Publicación creada con éxito!');
    }

    public function index()
// Obtener todas las publicaciones con las relaciones de usuario y likes

    {
        $posts = Post::with('user', 'likes')->latest()->get();

// Retornar la vista del dashboard con las publicaciones

        return view('dashboard', compact('posts'));
    }

    public function like(Post $post)

// Crear un nuevo like y asociarlo al usuario autenticado

    {
        $like = new Like(['user_id' => Auth::id()]);
        $post->likes()->save($like);

// Redirigir de vuelta

        return redirect()->back();
    }

    public function unlike(Post $post)
    {
 // Eliminar el like del usuario autenticado para la publicación dada

        $post->likes()->where('user_id', Auth::id())->delete();

 // Redirigir de vuelta

        return redirect()->back();
    }
}

