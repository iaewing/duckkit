<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        return Post::query()->with('subduckkit')->with('user')->latest()->limit(20)->get();
        // return Inertia::render('Posts/Index', [
        //     'posts' => Post::with('user:id,name')->latest()->get(),
        // ]);
        // if ($request->id) {
        //     return Post::query()->where('id', $request->id)->get();
        // }
        // return Post::query()->get();
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

    public function show(Request $request)
    {
        return Post::query()->where('id', $request->id)->get();
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
}