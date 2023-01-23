<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class FollowingList extends Component
{
    use WithPagination;

    public $user;
    public function mount(User $user) {
        $this->user =$user;
    }
    public function render()
    {
        return view('livewire.profile.following-list', [
            'following' => $this->user->following()->paginate(6, ['*'], 'followingPage'),
        ]);
    }
}
