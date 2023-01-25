<div class="container mx-auto my-5 p-5">
    <div class="md:flex no-wrap md:-mx-2 ">
        <!-- Left Side -->
        <div class="w-full md:w-3/12 md:mx-2">
            <!-- Profile Card -->
            @php
                if ($tempAvatar){
                    $avatar = $avatar->temporaryUrl();
                } else {
                    $avatar = $avatar_url ? $user->avatarUrl() : 'https://thesoapdish-public.s3.us-west-2.amazonaws.com/avatar/default.png';
                }
            @endphp
            <div
                class="bg-gray-100 dark:bg-gray-800 p-3 shadow-sm rounded-xl border-t-4 border-gray-400 dark:border-gray-700 custom-shadow">
                <form wire:submit.prevent="saveAvatar">
                    <div class="image overflow-hidden">
                        @if($user->id == auth()->user()->id && !$change_avatar)
                            <button wire:click="changeAvatar" class="hover:brightness-125" type="button"
                                    onclick="document.getElementById('avatar').click()"
                            >
                                @endif
                                <input wire:model="avatar" id="avatar" type="file" class="hidden"/>
                                <div class="block @if($user->id == auth()->user()->id && !$change_avatar) group @endif">
                                    <img class="h-auto w-full mx-auto rounded-lg border border-black"
                                         src="{{ $avatar }}"
                                         alt="{{ $name }}"
                                    />
                                    @if($user->id == auth()->user()->id && !$change_avatar)
                                        <div class="relative">
                                            <div
                                                class="flex absolute bottom-0 right-0 bg-gray-900 text-gray-400 text-xs p-1 rounded invisible group-hover:visible">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/>
                                                </svg>
                                                Change Avatar
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                @if($user->id == auth()->user()->id && !$change_avatar)
                            </button>
                        @endif
                    </div>
                    <div class="justify-center w-full my-3">
                        @if($change_avatar)
                            <button type="submit"
                                    class="bg-blue-900 hover:bg-blue-700 mt-2 rounded-xl text-gray-50 border border-gray-900 text-sm p-2 mr-3 custom-shadow"
                            >Save
                            </button>
                            <button wire:click="abortChangeAvatar"
                                    type="button"
                                    class="bg-red-900 hover:bg-red-700 mt-2 rounded-xl text-gray-50 border border-gray-900 text-sm p-2 mr-3 custom-shadow"
                            >Cancel
                            </button>
                            {{--                            @if($avatar_url)--}}
                            {{--                                <button type="button"--}}
                            {{--                                        class="bg-red-900 hover:bg-red-700 md:mt-3 md:block lg:inline-flex rounded-xl text-gray-50 border border-gray-900 text-sm p-2 custom-shadow"--}}
                            {{--                                        wire:click="removeAvatar">Remove--}}
                            {{--                                </button>--}}
                            {{--                            @endif--}}
                            @error('avatar_url')
                            <p class="mt-2 text-xs font-light text-red-600" id="email-error">{{ $message }}</p>
                            @enderror
                        @endif
                    </div>
                </form>
                <form wire:submit.prevent="saveProfile">
                    <h1 class="text-gray-900 dark:text-gray-300 font-bold text-xl leading-8 my-3">
                        @if(! $edit_mode)
                            {{ $name }}
                        @else
                            <label for="name" class="sr-only">Name</label>
                            <input wire:model.lazy="name" id="name" type="text"
                                   class="dark:bg-gray-900 w-full rounded-xl @error('name') text-red-900 placeholder-red-300 focus:border-red-500 focus:outline-none focus:ring-red-500 @enderror"
                                   placeholder="Name"
                            />
                            @error('name')
                            <p class="mt-2 text-xs font-light text-red-600" id="email-error">{{ $message }}</p>
                            @enderror
                        @endif
                    </h1>
                    <h3 class="text-gray-600 dark:text-gray-400 font-lg text-semibold leading-6 my-3">
                        @if(! $edit_mode)
                            {{ $title }}
                        @else
                            <label for="title" class="sr-only">Title</label>
                            <input wire:model.lazy="title" id="title"
                                   type="text" class="dark:bg-gray-900 dark:text-gray-400 w-full rounded-xl"
                                   placeholder="Title"
                            />
                        @endif
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-gray-500 hover:text-gray-600 leading-6 my-3">
                        @if(! $edit_mode)
                            {{ $bio }}
                        @else
                            <label for="bio" class="sr-only">Bio</label>
                            <input wire:model.lazy="bio" id="bio"
                                   type="text" class="dark:bg-gray-900 dark:text-gray-400 w-full rounded-xl"
                                   placeholder="Biography"
                            />
                        @endif
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-500 hover:text-gray-600 leading-6 my-3">
                        @if(! $edit_mode)
                            Preferred Translation: {{ $bible_id }}
                        @else
{{--                            <label for="bible_id" class="sr-only">Bible Translation</label>--}}
{{--                            <input wire:model.lazy="bible_id" id="bible_id"--}}
{{--                                   type="text" class="dark:bg-gray-900 dark:text-gray-400 w-full rounded-xl"--}}
{{--                                   placeholder="Biography"--}}
{{--                            />--}}
                    <div>
                        <label for="bible_id" class="sr-only">Location</label>
                        <select wire:model.lazy="bible_id" id="bible_id" name="bible_id"
                                class="mt-1 block w-full rounded-xl dark:text-gray-400 dark:bg-gray-900 border-gray-300 py-2 pl-3 pr-10 text-base focus:border-gray-800 focus:outline-none focus:ring-gray-800 sm:text-sm">
                            @foreach($translations as $translation)
                                <option value="{{ $translation['abbreviation'] }}">
                                    {{ $translation['abbreviation'] }}</option>
                            @endforeach

                        </select>
                    </div>

                    @endif
                    </p>
                    @if(auth()->user()->id === $user->id)
                        @if(! $edit_mode)
                            <div class="justify-center">
                                <button wire:click="enableEdit" type="button"
                                        class="p-2 my-1 bg-blue-900 hover:bg-blue-700 text-gray-50 rounded-xl w-full custom-shadow">
                                    Edit
                                    Profile
                                </button>
                            </div>
                        @else
                            <div class="flex justify-center gap-3">
                                <button type="submit"
                                        class="p-2 my-1 bg-blue-900 hover:bg-blue-700 text-gray-50 rounded-xl w-full custom-shadow">
                                    Save Profile
                                </button>
                                <button type="button"
                                        wire:click="abortEdit"
                                        class="p-2 my-1 bg-red-900 hover:bg-red-700 text-gray-50 rounded-xl w-full custom-shadow">
                                    Cancel
                                </button>
                            </div>
                        @endif
                    @endif
                </form>
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
            @if(count($user->following) > 0)
                @livewire('profile.following-list', ['user' => $user])
            @endif
            <div class="my-4"></div>
            @if(count($user->followers) > 0)
                @livewire('profile.follower-list', [ 'user' => $user])
            @endif
            <div class="my-4"></div>
            <div class="bg-gray-100 dark:bg-gray-800 p-3 shadow-sm rounded-xl border-t-4 border-gray-400 dark:border-gray-700 custom-shadow">
                @livewire('comment-section', ['parent' => $user])
            </div>
            <!-- End of friends card -->
        </div>
        <!-- Right Side -->
        <div class="w-full mt-4 md:mt-0 md:w-9/12 mx-2 h-64">
            <!-- My Studies Section -->
            @livewire('profile.studies-card', ['user' => $user])
            <!-- End of My Studies Section -->
            <div class="my-4"></div>

            <!-- Follower Activity Log -->
{{--            <div class="bg-gray-100 dark:bg-gray-800 p-3 shadow-sm rounded-xl border-t-4 border-gray-400 dark:border-gray-700 custom-shadow">--}}
{{--                @livewire('comment-section', ['parent' => $user])--}}
{{--            </div>--}}
            <!-- End of Follower Activity Log -->
        </div>
        <!-- End of profile tab -->
    </div>
</div>
