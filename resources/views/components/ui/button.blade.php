@props([
    'href' => '#',
    'variant' => 'primary',
    'size' => 'md',
])

@php
$base = 'inline-flex items-center justify-center rounded-xl font-semibold transition-all duration-300';

$variants = [
    'primary' => 'bg-primary text-white hover:bg-primary/90',
    'secondary' => 'bg-white border border-border text-text hover:bg-gray-50',
    'outline' => 'border border-primary text-primary hover:bg-primary hover:text-white',
];

$sizes = [
    'sm' => 'px-4 py-2 text-sm',
    'md' => 'px-6 py-3 text-base',
    'lg' => 'px-8 py-4 text-lg',
];
@endphp

<a
    href="{{ $href }}"
    {{ $attributes->merge([
        'class' => "{$base} {$variants[$variant]} {$sizes[$size]}"
    ]) }}
>
    {{ $slot }}
</a>