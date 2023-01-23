<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    public $message = null;
    public $search = null;

    public function followUser(User $user) {
        if (auth()->user()->id === $user) {
            $message = 'You can\'t follow yourself';
        }

        auth()->user()->following()->attach($user);
        $message = "You are now following $user->name";
    }

    public function unfollowUser(User $user) {
        if (auth()->user() === $user) {
            $message = 'You can\'t unfollow yourself';
        }
        auth()->user()->following()->detach($user);
        $message = "You have unfollowed $user->name";
    }
    public function render()
    {
        return view('livewire.user-list',[
            'users' => User::orderBy('name')->where('is_active', true)->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')->orWhere('title', 'like', '%' . $this->search . '%');
            })->paginate(),
        ])->extends('layouts.app');
    }
}
