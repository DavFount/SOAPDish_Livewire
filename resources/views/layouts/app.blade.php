@extends('layouts.base')

@section('body')
    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset
    @auth
        <x-speed-dial>
            <x-speed-dial-item href="{{ route('studies.create') }}" tooltip="New Study" icon="plus"/>
        </x-speed-dial>
    @endauth
@endsection
