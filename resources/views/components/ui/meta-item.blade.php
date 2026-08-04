@props([
    'label',
    'value',
])

<div class="rounded-2xl border border-border bg-white p-5">

    <p class="text-sm text-text-muted">

        {{ $label }}

    </p>

    <p class="mt-2 text-xl font-bold">

        {{ $value }}

    </p>

</div>