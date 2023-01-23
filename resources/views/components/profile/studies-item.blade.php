@props(['title', 'author'])
<div class="flex-1 text-gray-900 dark:text-gray-400 border border-gray-600 rounded-xl custom-shadow overflow-hidden">
    <div class="block overflow-hidden h-full">
        <div class="h-full">
            <h2 class=" mb-2 p-1 font-bold text-lg font-semibold dark:bg-gray-900 text-center w-full rounded">
                {{ $title }}
            </h2>
            <div class="p-2">
                <div class="mb-4 flex flex-wrap">
                    <span class="mx-auto">By:  {{ $author }}</span>
                </div>

                <p class="text-md text-justify">
                    {{ substr($slot, 0, 35) }}
                </p>
            </div>
        </div>
    </div>
</div>
