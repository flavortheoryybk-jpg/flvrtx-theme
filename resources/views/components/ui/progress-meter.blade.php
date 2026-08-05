@props([
    'label',
    'value' => 0,
    'max' => 10,
    'icon' => 'circle',
    'description' => null,
    'color' => 'bg-primary',
])

@php
    $percentage = min(100, max(0, ($value / $max) * 100));
@endphp

<div>

    <div class="mb-3 flex items-center justify-between">

        <div class="flex items-center gap-3">

            <i
                data-lucide="{{ $icon }}"
                class="h-5 w-5 text-primary">
            </i>

            <span class="font-semibold">

                {{ $label }}

            </span>

        </div>

        <span class="font-bold text-primary">

            {{ $value }}/{{ $max }}

        </span>

    </div>

    <div class="h-3 overflow-hidden rounded-full bg-gray-200">

        <div
            class="{{ $color }} h-full rounded-full transition-all duration-700"
            style="width: {{ $percentage }}%">

        </div>

    </div>

    @if($description)

        <p class="mt-3 text-sm text-text-muted">

            {{ $description }}

        </p>

    @endif

</div>