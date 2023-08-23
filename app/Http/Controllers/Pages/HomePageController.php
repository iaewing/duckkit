<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomePageController extends Controller
{
    public function show(Request $request)
    {
        $posts = (new PostController)->index($request);
        return Inertia::render('Home', [
            'posts' => $posts,
        ]);
    }
}