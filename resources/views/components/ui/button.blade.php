@props([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
])

@php
$base = 'inline-flex items-center justify-center rounded-md font-medium transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none';

$variants = [
    'primary' => 'bg-primary text-white hover:bg-primary-dark',
    'secondary' => 'bg-white border border-border text-text hover:bg-gray-50',
    'ghost' => 'bg-transparent text-text hover:bg-gray-100',
];

$sizes = [
    'sm' => 'px-3 py-2 text-sm',
    'md' => 'px-5 py-2.5 text-base',
    'lg' => 'px-6 py-3 text-lg',
];
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => "{$base} {$variants[$variant]} {$sizes[$size]}"
    ]) }}
>
    {{ $slot }}
</button>