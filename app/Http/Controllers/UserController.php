<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('id', '<>', Auth::getUser()->id)
                        ->where('id', '<>', 1)
                        ->orderby('id', 'desc')->paginate();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        return view('users.partials.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|string|email|unique:users,email',
            'password' => 'required',

        ]);

        $user = new User;
        $user->create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);
        return redirect('users');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $posts = Post::where('user_id', $user->id)->paginate();
        return view('users.partials.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('users.partials.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|string|email|unique:users,email,' . $user->id,
            'password' => 'required',

        ]);

        $user->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);
        return redirect('users');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if ($user == Auth::getUser()) {
            return redirect('users');
        }
        else {
            $user->delete();
            return back();
        }
    }
}
