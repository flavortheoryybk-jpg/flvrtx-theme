@props([
    'color' => 'primary',
])

@php

$base = '
inline-flex
items-center
rounded-full
px-3
py-1
text-xs
font-semibold
uppercase
tracking-widest
';

$colors = [
    'primary' => 'bg-primary/10 text-primary',
    'secondary' => 'bg-gray-100 text-text',
    'success' => 'bg-green-100 text-green-700',
    'warning' => 'bg-yellow-100 text-yellow-800',
    'danger' => 'bg-red-100 text-red-700',
];

$class = sprintf(
    '%s %s',
    trim($base),
    $colors[$color] ?? $colors['primary']
);

@endphp

<span
    {{ $attributes->merge([
        'class' => $class,
    ]) }}>

    {{ $slot }}

</span>