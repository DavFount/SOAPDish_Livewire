<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class FollowerList extends Component
{
    use WithPagination;

    public $user;
    public function mount(User $user) {
        $this->user =$user;
    }
    public function render()
    {
        return view('livewire.profile.follower-list', [
            'follower' => $this->user->followers()->paginate(6, ['*'], 'followerPage'),
        ]);
    }
}
