<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function show(Request $request)
    {
        return Post::query()->with('comments')->with('user')->where('id', $request->id)->first();
    }

    public function index(Request $request, bool $pagiante = false)
    {
        // if ($pagiante){
        //     return Post::query()->with('subduckkit')->with('user')->latest()->paginate(25);
        // }
        // return Post::query()->with('subduckkit')->with('user')->latest()->get();
        return Post::query()->with('subduckkit')->with('user')->latest()->paginate(25);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:255',
            'user_id' => 'required|string|max:255',
            'subduckkit_id' => 'required|string|max:255',
        ]);

        $item = Post::create($validated);

        return $item;
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|string|max:255',
            'body' => 'required|string|max:255',
            'user_id' => 'string|max:255',
        ]);

        $item = Post::query()->where('id', $request->id)->update($validated);

        return $item;
    }


    public function comments(Request $request)
    {
        $postId = (int) $request->id;
        return Post::query()
            ->where('id', $postId)
            ->with('comments', function ($query) use ($postId) {
                $query->where('post_id', $postId)->with(['user']);
            })
            ->get();
    }

    public function vote(Request $request)
    {
        $postId = (int) $request->id;
        $isUpvote = (int) $request->upvote;
    }
}