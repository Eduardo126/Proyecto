<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|max:255',
        ]);

        Post::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return redirect()->back()->with('status', 'Publicación creada con éxito!');
    }

    public function index()
    {
        $posts = Post::with('user', 'likes')->latest()->get();
        return view('dashboard', compact('posts'));
    }

    public function like(Post $post)
    {
        $like = new Like(['user_id' => Auth::id()]);
        $post->likes()->save($like);

        return redirect()->back();
    }

    public function unlike(Post $post)
    {
        $post->likes()->where('user_id', Auth::id())->delete();

        return redirect()->back();
    }
}

