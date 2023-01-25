@extends('layouts.app')

@section('title', "$study->title")

@section('body')
    @livewire('soap-form', ['study' => $study, 'show' => true])
    <div class="mx-auto max-w-7xl mt-6">
        <div class="bg-gray-100 dark:bg-gray-800 rounded-xl overflow-hidden custom-shadow py-6">
            <div class="max-w-md mx-auto">
                @livewire('comment-section', ['parent' => $study])
            </div>
        </div>
    </div>
@endsection
