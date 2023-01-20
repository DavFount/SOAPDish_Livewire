<?php

namespace App\Http\Controllers;

use App\Models\Study;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        return view('community.index', [
            'users' => User::whereNotNull('email_verified_at')->orderBy('name')->with(['studies', 'following', 'followers'])->paginate(16),
            'following' => auth()->user()->following,
        ]);
    }

    public function show(User $user)
    {
        return view('community.show', [
            'user' => User::where('id', $user->id)->with(['following', 'followers'])->first(),
            'followers' => $user->followers()->paginate(6, ['*'], 'followers'),
            'following' => $user->following()->paginate(6, ['*'], 'following'),
            'studies' => Study::where('user_id', '=', $user->id)
                ->where('public', '=', true)
                ->where('published', '=', true)
                ->paginate(8, ['*'], 'studies'),
        ]);
    }

    public function follow(User $user)
    {
        if (auth()->user() === $user) {
            return back()->with('error', 'You can\'t follow yourself');
        }
        auth()->user()->following()->attach($user);
        return back()->with('success', "You are now following $user->name");
    }

    public function unfollow(User $user)
    {
        if (auth()->user() === $user) {
            return back()->with('error', 'You can\'t unfollow yourself');
        }
        auth()->user()->following()->detach($user);
        return back()->with('success', "You have unfollowed $user->name");
    }
}
