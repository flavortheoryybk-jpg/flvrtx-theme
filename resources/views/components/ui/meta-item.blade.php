@props([
    'label',
    'value',
    'align' => 'left',
])

@php

$base = '
rounded-2xl
border
border-border
bg-white
p-5
';

$alignments = [
    'left' => 'text-left',
    'center' => 'text-center',
];

$class = sprintf(
    '%s %s',
    trim($base),
    $alignments[$align] ?? $alignments['left']
);

@endphp

<div
    {{ $attributes->merge([
        'class' => $class,
    ]) }}>

    <p class="text-sm text-text-muted">

        {{ $label }}

    </p>

    <p class="mt-2 text-xl font-bold leading-tight">

        {{ $value }}

    </p>

</div>