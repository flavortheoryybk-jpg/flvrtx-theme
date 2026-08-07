@props([
    'eyebrow' => null,
    'title',
    'description' => null,
])

<div class="mx-auto mb-14 max-w-4xl text-center">

    @if($eyebrow)

        <x-ui.pill>

            {{ $eyebrow }}

        </x-ui.pill>

    @endif

    <h2 class="mt-6 text-4xl font-bold tracking-tight lg:text-5xl">

        {{ $title }}

    </h2>

    @if($description)

        <p class="mx-auto mt-5 max-w-3xl text-lg leading-8 text-text-muted">

            {{ $description }}

        </p>

    @endif

</div>