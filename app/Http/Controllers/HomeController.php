<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View
    {
        $posts = Post::latest()->paginate();

        return view('welcome', compact('posts') );
    }

    public function show(Post $post)
    {
        return view('posts.partials.show', compact('post') );
    }
}



