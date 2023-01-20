@props(['avatar', 'name', 'profile'])
<div class="text-center my-2">
    <a href="{{ $profile }}" class="text-gray-900 dark:text-gray-400">
        <img class="h-16 w-16 rounded-full mx-auto mb-2" src="{{ $avatar }}" alt="{{ $name }}">
        {{ preg_split('/[\s]+/', $name)[0] }}
    </a>
</div>
