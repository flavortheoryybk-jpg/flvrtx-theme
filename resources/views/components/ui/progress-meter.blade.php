@props([
    'label',
    'value' => 0,
    'max' => 10,
    'icon' => 'circle',
    'description' => null,
    'color' => 'bg-primary',
])

@php
    $value = is_numeric($value) ? (float) $value : 0;
    $max = is_numeric($max) && $max > 0 ? (float) $max : 100;

    $percentage = min(100, max(0, ($value / $max) * 100));
@endphp

<div class="space-y-4">

    <div class="flex items-center justify-between">

        <div class="flex items-center gap-3">

            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary/10">

                <i
                    data-lucide="{{ $icon }}"
                    class="h-5 w-5 text-primary">
                </i>

            </div>

            <div>

                <h3 class="font-semibold">

                    {{ $label }}

                </h3>

                @if($description)

                    <p class="text-sm text-text-muted">

                        {{ $description }}

                    </p>

                @endif

            </div>

        </div>

        <div class="text-right">

            <p class="text-2xl font-bold">

                {{ $value }}

            </p>

            <p class="text-xs uppercase tracking-widest text-text-muted">

                out of {{ $max }}

            </p>

        </div>

    </div>

    <div class="h-3 overflow-hidden rounded-full bg-border/20">

        <div
            class="{{ $color }} h-full rounded-full transition-all duration-700 ease-out"
            style="width: {{ $percentage }}%">
        </div>

    </div>

</div>