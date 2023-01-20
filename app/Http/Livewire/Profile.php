<?php

namespace App\Http\Livewire;

use App\Models\Study;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $user;
    public $name;
    public $title;
    public $bio;
    public $avatar_url;
    public $tempAvatar = null;
    public $edit_mode = false;

    protected $rules = [
        'name' => ['required'],
        'title' => ['string', 'nullable'],
        'avatar_url' => ['image', 'nullable', 'max:2048'],
        'bio' => ['string', 'nullable']
    ];

    public function mount(User $user) {
        $this->user = $user;
        $this->name = $user->name;
        $this->title = $user->title;
        $this->bio = $user->bio;
        $this->avatar_url = $user->avatar_url;
    }

    public function removeAvatar() {
        $this->avatar_url = null;
        $this->tempAvatar = false;
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);

        if($propertyName === 'avatar_url') {
            $this->tempAvatar = true;
        }
    }

    public function saveProfile() {
        $data = $this->validate();

        if($this->avatar_url) {
            $this->user->avatar_url = $this->avatar_url->store('avatar', 'public');
            $this->avatar_url = $this->user->avatar_url;
            $this->tempAvatar = false;
        } else {
            $this->user->avatar_url = null;
        }

        $this->user->update($data);
        $this->edit_mode = false;
    }

    public function enableEdit() {
        $this->edit_mode = true;
    }

    public function render()
    {
        return view('livewire.profile', [
            'user' => $this->user,
            'followers' => $this->user->followers()->paginate(6, ['*'], 'followers'),
            'following' => $this->user->following()->paginate(6, ['*'], 'following'),
            'studies' => Study::where('user_id', '=', $this->user->id)
                ->where('public', '=', true)
                ->where('published', '=', true)
                ->paginate(8, ['*'], 'studies'),
        ]);
    }
}
