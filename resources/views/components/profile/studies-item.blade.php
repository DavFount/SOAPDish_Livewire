@props(['title'])
<div class="divide-y divide-gray-200 dark:divide-gray-500 overflow-hidden rounded-xl custom-shadow">
    <div class="px-4 py-3 sm:px-6 bg-gray-100 dark:bg-gray-900 text-center">
        {{ $title }}
    </div>
    <div class="px-4 py-5 sm:p-6 bg-gray-50 dark:bg-gray-700 h-full text-gray-700 dark:text-gray-400">
        {{ substr($slot, 0, 35) }}
    </div>
</div>
