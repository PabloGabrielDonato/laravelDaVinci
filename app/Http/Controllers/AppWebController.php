<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AppWebController extends Controller
{
    public function index()
    {
        $posts = Post::all()->take(4);
        return view('landing', ['posts' => $posts]);
    }
}
