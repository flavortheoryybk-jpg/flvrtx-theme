@props([
    'eyebrow',
    'title',
    'description' => null,
    'align' => 'left',
])

@php

$alignments = [
    'left' => '',
    'center' => 'text-center mx-auto',
];

$class = $alignments[$align] ?? $alignments['left'];

@endphp

<div class="{{ $class }} mb-12">

    <x-ui.badge>

        {{ $eyebrow }}

    </x-ui.badge>

    <h2 class="mt-5 text-4xl font-bold leading-tight lg:text-5xl">

        {{ $title }}

    </h2>

    @if($description)

        <p class="mt-4 max-w-2xl text-lg leading-8 text-text-muted">

            {{ $description }}

        </p>

    @endif

</div>