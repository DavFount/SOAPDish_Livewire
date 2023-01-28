<div class="mb-10">
    <div class="border border-gray-200 rounded-b-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
        <nav
            class="max-w-7xl mx-auto flex px-5 py-3 text-gray-700"
            aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li>
                    <div class="flex items-center">
                        <div>
                            <div x-data="{ open: false}" class="relative">
                                {{-- Trigger --}}
                                <div @click="open = !open">
                                    <button
                                        class="inline-flex items-center pl-3 py-2 text-sm font-normal text-center text-gray-600 bg-gray-50 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-800 dark:hover:bg-gray-800 dark:text-gray-300 dark:focus:ring-gray-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                             class="w-4 h-4 mr-2">
                                            <path
                                                d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.214 8.214 0 0118 18.75c.966 0 1.89.166 2.75.47a.75.75 0 001-.708V4.262a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z"/>
                                        </svg>
                                        {{ $translation }}
                                        <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor"
                                             viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div x-show="open" @click.outside="open = false"
                                     class="py-2 absolute bg-gray-200 w-24 mt-2 rounded-xl z-50 overflow-auto max-h-52 border border-gray-400 dark:border-gray-800"
                                     style="display:none">
                                    @foreach($translations as $bible)
                                        <button wire:click="setTranslation('{{ $bible['abbreviation'] }}')"
                                                @click="open = false" type="button"
                                                class="block w-full text-left px-3 text-sm leading-6 hover:bg-gray-300 focus:bg-blue-500 hover:text-gray-900 focus:text-white">
                                            {{ $bible['abbreviation'] }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <div x-data="{ open: false}" class="relative">
                                {{-- Trigger --}}
                                <div @click="open = !open">
                                    <button
                                        class="inline-flex items-center pl-3 py-2 text-sm font-normal text-center text-gray-600 bg-gray-50 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-800 dark:hover:bg-gray-800 dark:text-gray-300 dark:focus:ring-gray-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                             class="w-4 h-4 mr-2">
                                            <path
                                                d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.214 8.214 0 0118 18.75c.966 0 1.89.166 2.75.47a.75.75 0 001-.708V4.262a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z"/>
                                        </svg>
                                        {{ $bookName ?? 'Select a Book' }}
                                        <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor"
                                             viewBox="0 0 20 20"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div x-show="open" @click.outside="open = false"
                                     class="py-2 absolute bg-gray-200 w-36 mt-2 rounded-xl z-50 overflow-auto max-h-52 border border-gray-400 dark:border-gray-800"
                                     style="display:none">
                                    @foreach($books as $book)
                                        <button wire:click="setBook('{{ $book['id'] }}', '{{ $book['name'] }}')"
                                                @click="open = false" type="button"
                                                class="block w-full text-left px-3 text-sm leading-6 hover:bg-gray-300 focus:bg-blue-500 hover:text-gray-900 focus:text-white">
                                            {{ $book['name'] }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @if(count($chapters) > 0)
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                 viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                      clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <div x-data="{ open: false}" class="relative">
                                    {{-- Trigger --}}
                                    <div @click="open = !open">
                                        <button
                                            class="inline-flex items-center pl-3 py-2 text-sm font-normal text-center text-gray-600 bg-gray-50 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-800 dark:hover:bg-gray-800 dark:text-gray-300 dark:focus:ring-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                 fill="currentColor"
                                                 class="w-4 h-4 mr-2">
                                                <path fill-rule="evenodd"
                                                      d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z"
                                                      clip-rule="evenodd"/>
                                                <path
                                                    d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z"/>
                                            </svg>
                                            {{ $chapter_id ?? 'Select a Chapter' }}
                                            <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor"
                                                 viewBox="0 0 20 20"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div x-show="open" @click.outside="open = false"
                                         class="py-2 absolute bg-gray-200 w-16 mt-2 rounded-xl z-50 overflow-auto max-h-52 border border-gray-400 dark:border-gray-800"
                                         style="display:none">
                                        @foreach($chapters as $chapter)
                                            <button wire:click="setChapter('{{ $chapter['id'] }}')"
                                                    @click="open = false" type="button"
                                                    class="block w-full text-left px-3 text-sm leading-6 hover:bg-gray-300 focus:bg-blue-500 hover:text-gray-900 focus:text-white">
                                                {{ $chapter['id'] }}
                                            </button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endif
            </ol>
        </nav>
    </div>
    @if(session()->has('message'))
        <x-banner :message="session('message')"/>
    @endif
    <div class="mx-auto max-w-7xl mt-6">
        <div class="bg-gray-100 dark:bg-gray-800 rounded-xl overflow-hidden custom-shadow">
            @if($show)
                @if($soap->author->id === auth()->user()->id)
                <div class="w-full text-right">
                    <button wire:click="enableEditMode" class="bg-blue-700 hover:bg-blue-500 dark:bg-blue-900 dark:hover:bg-blue-700 dark:custom-shadow mt-3 mr-6 px-2 py-1 rounded text-sm text-gray-50 border border-black"> Edit </button>
                </div>
                @endif
            @endif
            <div class="p-8 grid grid-cols-3 gap-6">
                <div class="h-screen text-center overflow-auto">
                    <h3 class="text-xl text-gray-900 dark:text-gray-300 border-b border-gray-600 mb-3">{{ $bookName }}
                        Chapter {{ $chapter_id }}</h3>
                    <div class="space-y-3 px-2">
                        @foreach($verses as $verseObj)
                            <p class="text-gray-900 dark:text-gray-400">
                                <sup
                                    class="font-features sups text-xs"> {{ $verseObj['verseId'] }}</sup> {{ $verseObj['verse'] }}
                            </p>
                            @if(! $loop->last )
                                <hr class="w-64 h-1 mx-auto my-8 bg-gray-200 border-0 rounded dark:bg-gray-700">
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="text-center col-span-2">
                        <h3 class="text-xl text-gray-900 dark:text-gray-300 border-b border-gray-600 mb-3">SOAP FORM</h3>
                    @if(! $show)
                    <div class="text-left">
                        <div class="mb-6">
                            <label for="title"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                            <input wire:model.lazy="title" type="text" id="title"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('title')
                            <span class="text-red-600 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="verse"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Verse</label>
                            <input wire:model.lazy="verse" type="text" id="verse"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('verse')
                            <span class="text-red-600 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex mt-1">
                            <div class="w-full">
                                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Study
                                    Content</label>
                                <textarea wire:model.debounce.500ms="body" rows="15" name="comment" id="body"
                                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                @error('body')
                                <span class="text-red-600 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="ml-3 w-full hidden md:flex">
                                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Preview</label>
                                <div class="w-full prose prose-sm dark:prose-invert  max-h-80 overflow-auto text-center">
                                    {!! \Illuminate\Support\Str::markdown($body) !!}
                                </div>
                            </div>
                        </div>
                        <div class="mt-1 text-gray-900 dark:text-gray-300">
                            <input wire:model="public" type="checkbox" id="public"
                                   class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"/>
                            <label for="public" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Make
                                Public</label>
                            <input wire:model="published" type="checkbox" id="published"
                                   class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"/>
                            <label for="published" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Publish</label>
                            <x-md-modal />
                        </div>
                        <div class="mt-3">
                            <button wire:click="saveSoap" type="button"
                                    class="p-3 bg-blue-900 hover:bg-blue-700 text-gray-50 text-sm rounded-xl transition ease-in-out duration-150 mt-2 disabled:opacity-50">
                                <svg wire:loading wire:target="saveSoap" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Submit
                            </button>
                        </div>
                    </div>
                    @else
                        <div class="text-left">
                            <div class="mb-6 block text-sm font-medium text-gray-900 dark:text-white text-center">
                                <h1 class="uppercase text-xl">{{ $title }}</h1>
                                <h4 class="font-semibold text-gray-500">{{ $verse }} - {{ $soap->author->name }}</h4>
                                <h4 class="font-semibold text-gray-500 text-xs"> Created on: {{ $soap->created_at->timezone(session('timezone'))->format('M d Y') }} Last Update: {{ $soap->updated_at->timezone(session('timezone'))->format('M d Y') }}</h4>
                            </div>
                            <div class="w-full prose prose-sm dark:prose-invert overflow-auto">
                                {!! \Illuminate\Support\Str::markdown($body) !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
