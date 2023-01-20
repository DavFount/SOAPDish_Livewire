@extends('layouts.base')

@section('body')
    <div class="flex flex-col justify-center mt-10">
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
@endsection
