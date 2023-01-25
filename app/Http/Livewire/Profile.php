<?php

namespace App\Http\Livewire;

use App\Models\Study;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $user;
    public $name;
    public $title;
    public $bio;
    public $avatar;
    public $avatar_url;
    public $bible_id;
    public $tempAvatar = null;
    public $edit_mode = false;
    public $change_avatar = false;

    protected $rules = [
        'name' => ['required'],
        'title' => ['string', 'nullable'],
        'bio' => ['string', 'nullable'],
        'bible_id' => ['string']
    ];

    public function mount(User $user) {
        $this->user = $user;
        $this->name = $user->name;
        $this->title = $user->title;
        $this->bio = $user->bio;
        $this->bible_id = $user->bible_id;
        $this->avatar_url = $user->avatar_url;
    }

    public function changeAvatar() {
        $this->change_avatar = true;
    }

    public function abortChangeAvatar() {
        $this->tempAvatar = null;
        $this->change_avatar = false;
    }

    public function removeAvatar() {
        $this->avatar_url = null;
        $this->tempAvatar = false;
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);

        if($propertyName === 'avatar') {
            $this->tempAvatar = true;
        }
    }

    public function saveAvatar() {
        if($this->avatar_url) {
            $this->user->avatar_url = $this->avatar->store('avatar');
            $this->avatar_url = $this->user->avatar_url;
            $this->tempAvatar = false;
            $this->user->save();
        } else {
            $this->user->avatar_url = null;
        }
    }

    public function saveProfile() {
        $data = $this->validate();

        $this->user->update($data);
        $this->edit_mode = false;
    }

    public function enableEdit() {
        $this->edit_mode = true;
    }

    public function abortEdit() {
        $this->name = $this->user->name;
        $this->title = $this->user->title;
        $this->bio = $this->user->bio;
        $this->bible_id = $this->user->bible_id;
        $this->edit_mode = false;
    }

    public function render()
    {
        $baseUrl = config('bibleapi.base_url');
        $bibles = Http::get("{$baseUrl}/translations");

        return view('livewire.profile', [
            'user' => $this->user,
            'translations' => $bibles->json()
        ]);
    }
}
