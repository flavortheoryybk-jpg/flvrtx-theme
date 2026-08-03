@props([
    'title',
    'description',
])

<div class="rounded-3xl border border-border bg-white py-20 text-center">

    <h2 class="text-3xl font-bold">

        {{ $title }}

    </h2>

    <p class="mt-4 text-text-muted">

        {{ $description }}

    </p>

</div>