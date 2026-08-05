@props([
    'title',
    'value',
    'icon' => 'circle',
])

<div
    class="group rounded-[28px] bg-white p-7 ring-1 ring-border/10 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

    <div class="flex items-center justify-between">

        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary/10">

            <i
                data-lucide="{{ $icon }}"
                class="h-6 w-6 text-primary">
            </i>

        </div>

        <span class="text-xs font-semibold uppercase tracking-[0.25em] text-text-muted">

            {{ $title }}

        </span>

    </div>

    <div class="mt-8">

        <p class="text-3xl font-bold tracking-tight tracking-tight text-text">

            {{ $value }}

        </p>

    </div>

</div>