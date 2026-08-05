@props([
    'eyebrow' => null,
    'title',
    'description' => null,
])

<div class="mx-auto mb-16 max-w-3xl text-center">

    @if($eyebrow)

        <x-ui.pill>

            {{ $eyebrow }}

        </x-ui.pill>

    @endif

    <h2 class="mt-6 text-4xl font-bold tracking-tight lg:text-6xl lg:text-7xl">

        {{ $title }}

    </h2>

    @if($description)

        <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-text-muted">

            {{ $description }}

        </p>

    @endif

</div>