<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class CommentSection extends Component
{
    use WithPagination;

    public $parent;
    public $comment;
    public $body;

    protected $rules = [
        'body' => ['required', 'min:5', 'max:500']
    ];

    public function mount($parent)
    {
        $this->parent = $parent;
    }

    public function createComment()
    {
        $this->validate();

        $this->parent->comments()->create([
            'user_id' => auth()->user()->id,
            'body' => $this->body
        ]);

        $this->reset(['body']);

        session()->flash('message', 'Comment posted!');
    }

    public function render()
    {
        return view('livewire.comment-section', [
            'comments' => $this->parent->comments()->with(['author'])->orderBy('created_at', 'desc')->simplePaginate(5, ['*'], 'commentPage'),
        ]);
    }
}
