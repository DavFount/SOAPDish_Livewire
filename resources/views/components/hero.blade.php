@props(['header', 'cta' => null])
<div class="isolate bg-white dark:bg-gray-900">
    <div class="relative px-6 lg:px-8">
        <div class="mx-auto max-w-3xl pt-20 pb-32">
            <div>
                <div>
                    <h1 class="text-4xl font-bold tracking-tight sm:text-center sm:text-6xl text-gray-900 dark:text-gray-100">{{ $header }}</h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600 dark:text-gray-400 sm:text-center">
                        {!! $slot !!}
                    </p>
                    @if($cta)
                        <div class="mt-8 flex gap-x-4 sm:justify-center">
                            {{ $cta }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
