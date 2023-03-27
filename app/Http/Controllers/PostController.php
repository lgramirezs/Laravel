<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users= User::all();

        $search = $request->search;
        $posts = Post::where('title', 'LIKE', "%{$search}%")
                    ->with('user')
                    ->latest()->paginate();

        return view('posts.index', compact('posts', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
        return view('posts.partials.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
        [
            'title' => 'required',
            'slug'  => 'required|unique:posts,slug',
            'content' => 'required'
        ],
        );

        $request->user()->posts()->create([
            'title'   => $request->title,
            'slug'    => $request->slug,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Post $post)
    // {
        //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.partials.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'   =>  'required',
            'slug'    =>  'required|unique:posts,slug,' . $post->id,
            'content' =>  'required',
        ],
        );

        $post->update([
            'user_id' => $request->user()->id,
            'title'   => $request->title,
            'slug'    => $request->slug,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
}
