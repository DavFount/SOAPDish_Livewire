@extends('layouts.app')
@section('title', $user->name)

@section('body')
    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                @php
                    $avatar = $user->avatar_url ?? 'avatar/default.png';
                @endphp
                <div
                    class="bg-gray-100 dark:bg-gray-800 p-3 shadow-sm rounded-xl border-t-4 border-gray-400 dark:border-gray-700 custom-shadow">
                    <div class="image overflow-hidden">
                        <img class="h-auto w-full mx-auto rounded-lg border border-black"
                             src="{{ asset('/storage/' . $avatar) }}"
                             alt="{{ $user->name }}">
                    </div>
                    <h1 class="text-gray-900 dark:text-gray-300 font-bold text-xl leading-8 my-1">{{ $user->name }}</h1>
                    <h3 class="text-gray-600 dark:text-gray-400 font-lg text-semibold leading-6">{{ $user->title }}</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-500 hover:text-gray-600 leading-6">
                        {{ $user->bio }}
                    </p>
                    <div class="justify-center">
                        <button class="p-2 my-1 bg-blue-600 hover:bg-blue-700 text-md rounded-xl w-full">Edit Profile
                        </button>
                    </div>
                    <ul
                        class="bg-gray-100 dark:bg-gray-900 text-gray-600 dark:text-gray-400 py-2 px-3 mt-3 divide-y divide-gray-500 rounded-xl shadow-sm border border-gray-700 dark:border-gray-700">
                        <li class="flex items-center py-3">
                            <span>Status</span>
                            <span class="ml-auto"><span
                                    class="py-1 px-2 rounded text-white text-sm {{ $user->is_active ? 'bg-green-900' : 'bg-red-900' }}">{{ $user->is_active ? 'Active' : 'In-Active' }}</span></span>
                        </li>
                        <li class="flex items-center py-3">
                            <span>Member since</span>
                            <span class="ml-auto">{{ $user->created_at->format('M d, Y') }}</span>
                        </li>
                    </ul>
                </div>
                <!-- End of profile card -->
                <div class="my-4"></div>
                <!-- Friends card -->
                @if(count($following) > 0)
                    <x-profile.friends title="Following">
                        @foreach($following as $followingUser)
                            @php
                                $followingAvatar = $followingUser->avatar_url ?? 'avatar/default.png';
                            @endphp
                            <x-profile.friend-item :name="$followingUser->name"
                                                   :profile="route('community.show', ['user' => $followingUser])"
                                                   :avatar="asset('storage') . '/' . $followingAvatar"/>
                        @endforeach
                        <x-slot:footer>
                            {{  $following->links() }}
                        </x-slot:footer>
                    </x-profile.friends>
                @endif

                @if(count($followers) > 0)
                    <x-profile.friends title="Followed By" class="mt-4">
                        @foreach($followers as $followedUser)
                            @php
                                $followedAvatar = $followedUser->avatar_url ?? 'avatar/default.png';
                            @endphp
                            <x-profile.friend-item :name="$followedUser->name"
                                                   :profile="route('community.show', ['user' => $followedUser])"
                                                   :avatar="asset('storage') . '/' . $followedAvatar"/>
                        @endforeach
                        <x-slot:footer>
                            {{  $followers->links() }}
                        </x-slot:footer>
                    </x-profile.friends>
                @endif
                <!-- End of friends card -->
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- My Studies Section -->
                <x-profile.studies-card title="{{ $user->name }}'s Studies">
                    @if(count($studies) > 0)
                        @foreach($studies as $study)
                            <a href="{{ route('studies.show', ['study' => $study ]) }}">
                                <x-profile.studies-item :title="$study->title">
                                    {{ $study->verse }}
                                    <x-slot:footer>
                                        <a href="{{ route('studies.show', ['study' => $study]) }}"
                                           class="py-2 px-2 rounded-xl bg-blue-900">See All</a>
                                    </x-slot:footer>
                                </x-profile.studies-item>
                            </a>
                        @endforeach
                    @else
                        <div class="text-gray-700 dark:text-gray-500">
                            No public studies found!
                        </div>
                    @endif
                    <x-slot:footer>
                        {{ $studies->links() }}
                    </x-slot:footer>
                </x-profile.studies-card>
                <!-- End of My Studies Section -->

                <div class="my-4"></div>

                <!-- Experience and education -->
                {{--                <div class="bg-white p-3 shadow-sm rounded-sm">--}}

                {{--                    <div class="grid grid-cols-2">--}}
                {{--                        <div>--}}
                {{--                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">--}}
                {{--                                <span clas="text-gray-500">--}}
                {{--                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"--}}
                {{--                                         stroke="currentColor">--}}
                {{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
                {{--                                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>--}}
                {{--                                    </svg>--}}
                {{--                                </span>--}}
                {{--                                <span class="tracking-wide">Experience</span>--}}
                {{--                            </div>--}}
                {{--                            <ul class="list-inside space-y-2">--}}
                {{--                                <li>--}}
                {{--                                    <div class="text-teal-600">Owner at Her Company Inc.</div>--}}
                {{--                                    <div class="text-gray-500 text-xs">March 2020 - Now</div>--}}
                {{--                                </li>--}}
                {{--                                <li>--}}
                {{--                                    <div class="text-teal-600">Owner at Her Company Inc.</div>--}}
                {{--                                    <div class="text-gray-500 text-xs">March 2020 - Now</div>--}}
                {{--                                </li>--}}
                {{--                                <li>--}}
                {{--                                    <div class="text-teal-600">Owner at Her Company Inc.</div>--}}
                {{--                                    <div class="text-gray-500 text-xs">March 2020 - Now</div>--}}
                {{--                                </li>--}}
                {{--                                <li>--}}
                {{--                                    <div class="text-teal-600">Owner at Her Company Inc.</div>--}}
                {{--                                    <div class="text-gray-500 text-xs">March 2020 - Now</div>--}}
                {{--                                </li>--}}
                {{--                            </ul>--}}
                {{--                        </div>--}}
                {{--                        <div>--}}
                {{--                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">--}}
                {{--                                <span clas="text-gray-500">--}}
                {{--                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"--}}
                {{--                                         stroke="currentColor">--}}
                {{--                                        <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z"/>--}}
                {{--                                        <path fill="#fff"--}}
                {{--                                              d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>--}}
                {{--                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
                {{--                                              d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>--}}
                {{--                                    </svg>--}}
                {{--                                </span>--}}
                {{--                                <span class="tracking-wide">Education</span>--}}
                {{--                            </div>--}}
                {{--                            <ul class="list-inside space-y-2">--}}
                {{--                                <li>--}}
                {{--                                    <div class="text-teal-600">Masters Degree in Oxford</div>--}}
                {{--                                    <div class="text-gray-500 text-xs">March 2020 - Now</div>--}}
                {{--                                </li>--}}
                {{--                                <li>--}}
                {{--                                    <div class="text-teal-600">Bachelors Degray in LPU</div>--}}
                {{--                                    <div class="text-gray-500 text-xs">March 2020 - Now</div>--}}
                {{--                                </li>--}}
                {{--                            </ul>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                <!-- End of Experience and education grid -->
            </div>
            <!-- End of profile tab -->
        </div>
    </div>
    @if(auth()->user()->id == $user->id)
        <x-speed-dial>
            {{--        <x-speed-dial-item href="{{ route('profile.edit') }}" tooltip="Edit Profile" icon="edit"/>--}}
            <x-speed-dial-item href="{{ route('studies.create') }}" tooltip="New Study" icon="plus"/>
        </x-speed-dial>
    @endif
@endsection
