<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostPageController extends Controller
{
    public function show(Request $request)
    {
        $post = (new PostController)->show($request);

        return Inertia::render('Post', [
            'post' => $post->only(
                'id',
                'title',
                'body',
                'user_id',
                'karma',
                'subduckkit_id',
                'isApproved',
            ),
            'user' => $post->user->only(
                'username'
            ),
            'comments' => $post->comments,
            'isAuthenticated' => auth()->check(),
        ]);
    }
}
