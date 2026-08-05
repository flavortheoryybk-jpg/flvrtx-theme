@props([
    'icon',
    'label',
    'value',
])

<div class="rounded-3xl bg-white p-7 shadow-sm ring-1 ring-border/10 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

    <div class="flex items-center justify-between">

        <i
            data-lucide="{{ $icon }}"
            class="h-7 w-7 text-primary">
        </i>

        <span class="text-3xl font-bold">

            {{ $value }}

        </span>

    </div>

    <div class="mt-8">

        <p class="text-xs font-semibold uppercase tracking-[0.25em] text-text-muted">

            {{ $label }}

        </p>

    </div>

</div>