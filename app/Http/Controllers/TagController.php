<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function store(Request $request, $id)
    {
        $validated = request()->validate([
            'tagname' => 'required',
        ]);
        $post = Post::where("id", $id)->first();

        $tag = $post->tags()->create([
            'tagname' => $validated["tagname"]
        ]);

        return response()->json([
            "tag" => $tag
        ]);
    }
}
