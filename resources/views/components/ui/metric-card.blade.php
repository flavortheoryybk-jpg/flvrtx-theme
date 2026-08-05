@props([
    'title',
    'value',
    'icon' => 'circle',
])

<div class="rounded-[30px] border border-border/20 bg-white p-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">

    <div class="flex items-center justify-between">

        <h3 class="text-sm font-semibold uppercase tracking-[0.25em] text-text-muted">

            {{ $title }}

        </h3>

        <i
            data-lucide="{{ $icon }}"
            class="h-6 w-6 text-primary">
        </i>

    </div>

    <p class="mt-8 text-3xl font-bold leading-tight">

        {{ $value }}

    </p>

</div>