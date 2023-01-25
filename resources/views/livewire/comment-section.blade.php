<div>
    <div class="max-w-xl mx-auto">
        @if (session()->has('message'))
            <x-banner :message="session('message')"/>
        @endif
    </div>

    <form wire:submit.prevent="createComment" action="#" method="POST">
        @csrf
        <div class="flex">
            <img class="h-12 w-auto rounded-full" src="{{ auth()->user()->avatarUrl() }}" alt="{{ auth()->user()->name }}">
            <label for="body" class="sr-only">Comment</label>
            <div class="ml-4 flex-1">
                <textarea wire:model.defer="body" name="body" id="body" rows="4" placeholder="Type your comment here..."
                          class="border rounded-md shadow w-full px-4 py-2"></textarea>

                @error('body')
                <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror

                <button type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700 transition ease-in-out duration-150 mt-2 disabled:opacity-50">
                    <svg wire:loading wire:target="createComment" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    <span>Post Comment</span>
                </button>

            </div>
        </div>
    </form>
    @if(count($comments) > 0)
        <div class="mx-auto w-fit max-w-md justify-center mt-6 space-y-6">
            @foreach ($comments as $comment)
                <div class="flex">
                    <div class="mr-4 flex-shrink-0">
                        <a href="{{ route('community.show', ['user' => $comment->author]) }}" class="flex-shrink-0">
                            <img class="h-12 w-auto rounded-full" src="{{ $comment->author->avatarUrl() }}" alt="{{ $comment->author->name }}">
                        </a>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-gray-900 dark:text-gray-300">{{ $comment->author->name }}</h4>
                        <h4 class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</h4>
                        <p class="mt-1 text-gray-700 dark:text-gray-400">
                            {{ $comment->body }}
                        </p>
                    </div>
                </div>
            @endforeach
            {{ $comments->links() }}
        </div>
    @endif
</div>
