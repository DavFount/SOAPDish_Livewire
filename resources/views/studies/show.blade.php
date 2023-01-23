@extends('layouts.app')

@section('title', "$study->title")

@section('body')
    @livewire('soap-form', ['study' => $study, 'show' => true])
@endsection
