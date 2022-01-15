<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index($id)
    {
        $post = Post::where("id", $id)->first();
        if (!$post) {
            return response(["message" => "post with id {$id} not found"], 404);
        }
        return response($post->tags()->get()->toArray());
        // return view("welcome",compact('posts'));
    }

    public function store(Request $request, $id)
    {
        $validated = request()->validate([
            'name' => 'required',
        ]);
        $post = Post::where("id", $id)->first();
        if (!$post) {
            return response(["message" => "post with id {$id} not found"], 404);
        }
        $tag = Tag::where("name", $validated["name"])->first();
        if ($tag) {
            if ($post->tags()->where("name", $tag->name)->first()) {
                return response(["message" => "post already has tag named {$tag->name}"], 404);
            }
            $post->tags()->save($tag);
        } else {
            $tag = $post->tags()->create([
                'name' => $validated["name"]
            ]);
        }


        return response()->json([
            "tag" => $tag
        ]);
    }
}
