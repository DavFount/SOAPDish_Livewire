<?php

namespace App\Http\Livewire\Profile;

use App\Models\Study;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class StudiesCard extends Component
{
    use WithPagination;

    public $user;

    public function mounted(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.profile.studies-card', [
            'studies' => Study::where('user_id', '=', $this->user->id)->when($this->user->id !== auth()->user()->id, function ($query) {
                $query->where('public', true)->where('published', true);
            })->paginate(8, ['*'], 'studiesPage'),
        ]);
    }
}
