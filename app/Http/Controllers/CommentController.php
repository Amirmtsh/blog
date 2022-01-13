<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $validated = request()->validate([
            'text' => 'required',
        ]);
        $post = Post::where("id", $id)->first();

        $comment = $post->comments()->create([
            'text' => $validated["text"]
        ]);

        return response()->json([
            "comment" => $comment
        ]);
    }
}
