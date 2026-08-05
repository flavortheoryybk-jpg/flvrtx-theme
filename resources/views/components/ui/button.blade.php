@props([
    'href' => null,
    'variant' => 'primary',
    'size' => 'md',
])

@php

$base = '
inline-flex
items-center
justify-center
rounded-xl
font-semibold
transition-all
duration-300
focus:outline-none
focus:ring-2
focus:ring-primary
focus:ring-offset-2
disabled:opacity-50
disabled:pointer-events-none
';

$variants = [
    'primary' => 'bg-primary text-white hover:opacity-90 hover:-translate-y-1 hover:shadow-lg',
    'secondary' => 'border border-border bg-white text-text hover:border-primary hover:text-primary',
    'ghost' => 'text-primary hover:bg-primary/5',
];

$sizes = [
    'sm' => 'px-4 py-2 text-sm',
    'md' => 'px-6 py-3',
    'lg' => 'px-8 py-4 text-lg',
];

$class = sprintf(
    '%s %s %s',
    trim($base),
    $variants[$variant] ?? $variants['primary'],
    $sizes[$size] ?? $sizes['md']
);

@endphp

@if ($href)

    <a
        href="{{ $href }}"
        {{ $attributes->merge(['class' => $class]) }}>

        {{ $slot }}

    </a>

@else

    <button
        type="{{ $attributes->get('type', 'button') }}"
        {{ $attributes->merge(['class' => $class]) }}>

        {{ $slot }}

    </button>

@endif