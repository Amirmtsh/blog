<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $response = [];
        foreach ($posts as $post) {
            $response[] = [
                "post" => $post,
                "writer" => $post->user->first()->toarray(),
                "comments" => $post->comments()->get()->toArray(),
                "tags" => $post->tags()->get()->toArray()
            ];
        }
        return response($response);
        // return view("welcome",compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = request()->validate([
            'title' => 'required',
            'discription' => 'required',
            'cover' => 'required',
            'email' => 'required',
        ]);
        $user = User::where("email", $validated["email"])->first();
        if (!$user) {
            return response(["message" => "user with email {$validated["email"]} not found"], 404);
        }
        $imagePath = request('cover')->store('uploads', 'public');

        $post = $user->posts()->create([
            'title' => $validated["title"],
            'discription' => $validated["discription"],
            'cover' => "/storage/{$imagePath}"
        ]);

        return $post;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where("id", $id)->first();
        if (!$post) {
            return response(["message" => "post with id {$id} not found"], 404);
        }
        return response()->json([
            "post" => $post,
            "writer" => $post->user->first()->toarray(),
            "comments" => $post->comments()->get()->toArray(),
            "tags" => $post->tags()->get()->toArray()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
