<div>
    <div class="mt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-6">
            <div
                class="p-3 bg-white dark:bg-gray-800 shadow sm:rounded-lg custom-shadow text-gray-900 dark:text-gray-400">
                Search <input wire:model.debounce.200ms="search"
                              type="search"
                              class="border border-gray-300 rounded-xl active:ring-0 dark:bg-gray-900 dark:border-gray-700"
                />
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg custom-shadow">
                <div
                    class="w-full flex items-stretch grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @if(count($studies) > 0)
                        @foreach($studies as $study)
                            <a href="{{route('studies.show', ['study' => $study])}}" class="flex-1 text-gray-900 dark:text-gray-400 border border-gray-600 rounded-xl custom-shadow overflow-hidden">
                                <div class="block overflow-hidden h-full">
                                    <div class="">
                                        <h2 class=" mb-2 p-1 font-bold text-lg font-semibold dark:bg-gray-900 text-center w-full rounded">
                                            {{ $study->title }}
                                        </h2>
                                        <div class="p-2">
                                            <div class="mb-4 flex flex-wrap">
                                                <span class="mx-auto">By:  {{ $study->author->name }}</span>
                                            </div>

                                            <p class="text-md text-justify">
                                                {{ $study->verse }}
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <div class="text-gray-700 dark:text-gray-500">--}}
                            No studies found!
                        </div>
                    @endif
                </div>
                <div class="mt-6 text-white">
                    {{ $studies->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
