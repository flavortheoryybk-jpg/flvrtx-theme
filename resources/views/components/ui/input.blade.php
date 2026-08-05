@props([
    'type' => 'text',
])

@php

$base = '
w-full
rounded-2xl
border
border-border
bg-white
px-5
py-3
transition-all
duration-300
placeholder:text-text-muted
focus:outline-none
focus:ring-2
focus:ring-primary
focus:ring-offset-2
disabled:cursor-not-allowed
disabled:opacity-50
';

@endphp

<input
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => trim($base),
    ]) }}>