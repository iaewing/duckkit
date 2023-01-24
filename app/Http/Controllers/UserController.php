<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        return User::query()->where('id', $id)->first();
    }

    public function index()
    {
        return User::query()->get();
    }
}
