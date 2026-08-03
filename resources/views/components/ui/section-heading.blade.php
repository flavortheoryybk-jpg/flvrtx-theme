@props([
    'eyebrow',
    'title',
    'description' => null,
])

<div class="mb-12">

    <x-ui.badge>

        {{ $eyebrow }}

    </x-ui.badge>

    <h2 class="mt-5 text-4xl font-bold">

        {{ $title }}

    </h2>

    @if($description)

        <p class="mt-4 max-w-2xl text-lg leading-8 text-text-muted">

            {{ $description }}

        </p>

    @endif

</div>