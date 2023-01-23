<?php

namespace App\Http\Livewire;

use App\Models\Study;
use Livewire\Component;
use Livewire\WithPagination;

class StudiesIndex extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {
        return view('livewire.studies-index', [
            'studies' => Study::orderBy('created_at', 'desc')->with(['author'])->where('public', true)->where('published', true)->where(function ($query) {
                $query->where('title', 'like', '%'. $this->search . '%')->orWhere('verse', 'like', '%'. $this->search . '%')
                    ->orWhere('body', 'like', '%'. $this->search . '%');
            })->paginate(12),
        ])->extends('layouts.app');
    }
}
