@extends('layouts.app')
@section('title', 'Community')

@section('body')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg custom-shadow">
                <div class="w-full">
                    <x-user-list>
                        @foreach($users as $user)
                            <x-user-list-item>
                                <x-slot:header>
                                    <img class="mx-auto h-28 w-28 flex-shrink-0 rounded-full border border-black"
                                         src="{{ $user->avatar_url ? asset('storage') . '/' . $user->avatar_url : asset('storage') . '/avatar/default.png' }}"
                                         alt="">
                                    <h3 class="mt-6 text-sm font-medium text-gray-900 dark:text-gray-200 font-semibold">{{ $user->name }}</h3>
                                    <dl class="mt-1 flex flex-grow flex-col justify-between">
                                        <dt class="sr-only">Title</dt>
                                        <dd class="text-sm text-gray-500">{{ $user->title }}</dd>
                                    </dl>
                                    <dl class="mt-1 flex flex-grow flex-col justify-between">
                                        <dt class="sr-only">Follower/Following</dt>
                                        <dd class="text-md text-gray-500">
                                            <span class="mr-1 text-xs">Followers: {{ count($user->followers) }}</span> |
                                            <span class="ml-1 text-xs">Following: {{ count($user->following) }}</span>
                                        </dd>
                                    </dl>
                                </x-slot:header>
                                <x-slot:footer>
                                    <div
                                        class="flex w-0 flex-1 border-t border-blue-900 bg-blue-100 dark:bg-blue-900 rounded-bl-lg">
                                        <a href="{{ route('community.show', ['user' => $user]) }}"
                                           class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center rounded-bl-lg py-4 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                 fill="currentColor" class="h-5 w-5">
                                                <path fill-rule="evenodd"
                                                      d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                                      clip-rule="evenodd"/>
                                            </svg>

                                            <span class="ml-3">Profile</span>
                                        </a>
                                    </div>
                                    <div class="-ml-px flex w-0 flex-1 bg-blue-100 dark:bg-blue-900 rounded-br-lg">
                                        @if(auth()->user()->id !== $user->id)
                                            @if(auth()->user()->following->contains($user['id']))
                                                <form action="{{ route('community.unfollow', ['user' => $user]) }}"
                                                      method="POST"
                                                      class="relative inline-flex w-0 flex-1 border-t border-blue-900 items-center justify-center rounded-br-lg text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-100">
                                                    @csrf
                                                    <button class="inline-flex py-4 w-full h-full justify-center">
                                                        <!-- Heroicon name: mini/phone -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                             fill="currentColor" class="w-5 h-5">
                                                            <path
                                                                d="M10.375 2.25a4.125 4.125 0 100 8.25 4.125 4.125 0 000-8.25zM10.375 12a7.125 7.125 0 00-7.124 7.247.75.75 0 00.363.63 13.067 13.067 0 006.761 1.873c2.472 0 4.786-.684 6.76-1.873a.75.75 0 00.364-.63l.001-.12v-.002A7.125 7.125 0 0010.375 12zM16 9.75a.75.75 0 000 1.5h6a.75.75 0 000-1.5h-6z"/>
                                                        </svg>

                                                        <span class="ml-3">Unfollow</span>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('community.follow', ['user' => $user]) }}"
                                                      method="POST"
                                                      class="relative inline-flex w-0 flex-1 border-t border-blue-900 items-center justify-center rounded-br-lg text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-100">
                                                    @csrf
                                                    <button class="inline-flex py-4 w-full h-full justify-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                             fill="currentColor" class="h-5 w-5">
                                                            <path
                                                                d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"/>
                                                        </svg>

                                                        <span class="ml-3">Follow</span>
                                                    </button>
                                                </form>
                                            @endif
                                        @else
                                            <div
                                                class="relative inline-flex w-0 flex-1 border-t border-blue-900 items-center justify-center rounded-br-lg py-4 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-100">
                                                &nbsp;
                                            </div>
                                        @endif
                                    </div>
                                </x-slot:footer>
                            </x-user-list-item>
                        @endforeach
                        <x-slot:footer>
                            {{ $users->links() }}
                        </x-slot:footer>
                    </x-user-list>
                </div>
                <div class="mt-6 text-white">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
