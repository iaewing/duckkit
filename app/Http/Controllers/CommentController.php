<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return Comment::query()->get();

    }

    public function show(Request $request)
    {
        return Comment::query()->with('user')->where('id', $request->id)->get();
    }

    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'body' => 'required|string|max:255',
        //     'parentCommentId' => 'string|nullable|max:255',
        //     'userId' => 'required|string|max:255',
        //     'postId' => 'required|string|max:255',
        // ]);

        $item = Comment::create($request->input());

        return $item;
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|string|max:255',
            'body' => 'required|string|max:255',
            'user_id' => 'string|max:255',
        ]);

        $item = Comment::query()->where('id', $request->id)->update($validated);

        return $item;
    }
}
