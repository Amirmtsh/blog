<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class WriterCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $writer = User::where("id", $id)->first();
        if (!$writer) {
            return response(["message" => "writer with id {$id} not found"], 404);
        }
        return response($writer->comments()->get()->toArray());
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
    public function store(Request $request,$id)
    {
        $validated = request()->validate([
            'text' => 'required',
        ]);
        $writer = User::where("id", $id)->first();

        if (!$writer) {
            return response(["message" => "writer with id {$id} not found"], 404);
        }

        $comment = $writer->comments()->create([
            'text' => $validated["text"]
        ]);

        return response()->json([
            "comment" => $comment
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $user_id , $comment_id)
    {
        $validated = request()->validate([
            'text' => 'required',
        ]);
        $writer = User::where("id", $user_id)->first();

        if (!$writer) {
            return response(["message" => "writer with id {$user_id} not found"], 404);
        }
        $comment = $writer->comments()->where("id", $comment_id)->first();

        if (!$comment) {
            return response(["message" => "comment with id {$comment_id} not found"], 404);
        }
        $comment->update([
            'text' => $validated["text"]
        ]);

        return response()->json([
            "comment" => $comment
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id , $comment_id)
    {
        $writer = User::where("id", $user_id)->first();

        if (!$writer) {
            return response(["message" => "writer with id {$user_id} not found"], 404);
        }
        $comment =$writer->comments()->where("id", $comment_id)->first();
        if (!$comment) {
            return response(["message" => "comment with id {$comment_id} not found"], 404);
        }
        $tempComment = $comment;
        $comment->delete();

        return response()->json([
            "comment" => $tempComment
        ]);
    }
}
