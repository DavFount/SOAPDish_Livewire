@props(['mobile' => false])

<x-base.nav-item href="{{ route('home') }}" :mobile="$mobile" :active="request()->routeIs('home')">Home</x-base.nav-item>

<x-base.nav-item href="{{ route('studies.index') }}" :mobile="$mobile" :active="request()->routeIs('studies.index')">Studies</x-base.nav-item>

<x-base.nav-item href="{{ route('community.index') }}" :mobile="$mobile" :active="request()->routeIs('community.index')">Community</x-base.nav-item>
