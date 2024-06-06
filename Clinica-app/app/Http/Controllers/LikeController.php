<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $like = new Like();
        $like->user_id = auth()->user()->id;
        $like->post_id = $request->post_id;
        $like->save();

        return response()->json(['success' => true]);
    }

    public function destroy(Request $request, $id)
    {
        $like = Like::where('user_id', auth()->user()->id)
                    ->where('post_id', $request->post_id)
                    ->first();
        if ($like) {
            $like->delete();
        }

        return response()->json(['success' => true]);
    }
}