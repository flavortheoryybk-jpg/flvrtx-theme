@props([
    'as' => 'div',
])

<{{ $as }}
    {{ $attributes->merge([
        'class' => 'mx-auto w-full max-w-7xl px-2 sm:px-4 md:px-5 lg:px-8',
    ]) }}>

    {{ $slot }}

</{{ $as }}>