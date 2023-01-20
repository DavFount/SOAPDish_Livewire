@props(['active' => false, 'mobile' => false])

@php
    $classes = 'px-3 py-2 rounded-md text-sm font-medium';
    if($active)
//        $classes .= ' bg-gray-800 text-gray-50 dark:bg-gray-900 dark:text-gray-50';
        $classes .= ' text-gray-900 dark:text-gray-50 border-b-4 border-gray-500 dark:border-gray-900';
    else
        $classes .= ' text-gray-700 dark:text-gray-50 hover:border-b-4 hover:border-gray-500 dark:hover:border-gray-900';

    if($mobile) $classes .= ' block';
@endphp

<a {{ $attributes->merge(['class'=>$classes]) }}>{{ $slot }}</a>
