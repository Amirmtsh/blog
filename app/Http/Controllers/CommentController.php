<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($id)
    {
        $post = Post::where("id", $id)->first();
        if (!$post) {
            return response(["message" => "post with id {$id} not found"], 404);
        }
        return response($post->comments()->get()->toArray());
        // return view("welcome",compact('posts'));
    }

    public function store(Request $request, $id)
    {
        $validated = request()->validate([
            'text' => 'required',
        ]);
        $post = Post::where("id", $id)->first();

        if (!$post) {
            return response(["message" => "post with id {$id} not found"], 404);
        }

        $comment = $post->comments()->create([
            'text' => $validated["text"]
        ]);

        return response()->json([
            "comment" => $comment
        ]);
    }
}
