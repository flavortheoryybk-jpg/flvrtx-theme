@props([
    'icon',
    'label',
    'value',
])

<div class="min-w-0 rounded-[24px] bg-white p-5 shadow-sm ring-1 ring-border/10 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

    <div class="flex min-w-0 items-start justify-between gap-3">

        <i
            data-lucide="{{ $icon }}"
            class="h-5 w-5 shrink-0 text-primary">
        </i>

        <span class="min-w-0 text-right text-xl font-bold leading-tight tracking-tight">
            {{ $value }}
        </span>

    </div>

    <div class="mt-6">

        <p class="text-[10px] font-semibold uppercase tracking-[0.25em] text-text-muted">
            {{ $label }}
        </p>

    </div>

</div>