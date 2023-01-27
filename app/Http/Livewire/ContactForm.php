<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Notifications\ContactFormSubmitted;
use Livewire\Component;

class ContactForm extends Component
{
    public $subject;
    public $message;

    public function submit()
    {
        $this->validate([
           'subject' => ['required', 'string'],
           'message' => ['required', 'string', 'min:10', 'max:500'],
        ]);

        $admin = User::firstWhere('email', '=', 'savsin64@gmail.com');
        $admin->notify(new ContactFormSubmitted(auth()->user(), $this->message, $this->subject));

        $this->reset();
    }
    public function render()
    {
        return view('livewire.contact-form');
    }
}
