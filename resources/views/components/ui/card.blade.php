@props([
    'href' => null,
])

@php

$base = '
overflow-hidden
rounded-3xl
border
border-border
bg-white
transition-all
duration-300
';

$linkClasses = '
group
block
hover:-translate-y-2
hover:shadow-xl
focus:outline-none
focus:ring-2
focus:ring-primary
focus:ring-offset-2
';

$class = trim($base . ' ' . ($href ? $linkClasses : ''));

@endphp

@if ($href)

    <a
        href="{{ $href }}"
        {{ $attributes->merge([
            'class' => $class,
        ]) }}>

        {{ $slot }}

    </a>

@else

    <div
        {{ $attributes->merge([
            'class' => $class,
        ]) }}>

        {{ $slot }}

    </div>

@endif