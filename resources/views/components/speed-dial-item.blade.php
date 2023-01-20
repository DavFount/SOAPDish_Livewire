@props(['icon', 'tooltip'])

@php
    $target = 'tooltip-' . strtolower($tooltip);
@endphp

<a {{ $attributes->merge(['data-tooltip-target'=>$target, 'data-tooltip-placement' => 'left', 'class'=>'flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400']) }}>
    <x-icon class="w-7 h-7" :name="$icon"/>
    <span class="sr-only">{{ $tooltip }}</span>
</a>
<div id="{{$target}}" role="tooltip"
     class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
    {{ $tooltip }}
    <div class="tooltip-arrow" data-popper-arrow></div>
</div>
