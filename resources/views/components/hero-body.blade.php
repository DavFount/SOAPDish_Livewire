@props(['title' => null, 'subtitle' => null])
<div>
    @if($title)
        <p class="text-2xl text-semibold text-blue-900 dark:text-blue-400">{{ $title }}</p>
    @endif
    @if($subtitle)
        <span class="block italic text-md text-gray-900 dark:text-gray-400">{{ $subtitle }}</span>
    @endif
    <p class="text-sm text-gray-900 dark:text-gray-200">
        {{ $slot }}
    </p>
</div>
