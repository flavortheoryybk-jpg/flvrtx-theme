@props([
    'title',
    'icon' => 'lightbulb',
])

<div class="rounded-[32px] border border-primary/20 bg-primary/5 p-8">

    <div class="flex items-start gap-5">

        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-primary text-white">

            <i
                data-lucide="{{ $icon }}"
                class="h-6 w-6">
            </i>

        </div>

        <div>

            <h3 class="text-2xl font-bold">

                {{ $title }}

            </h3>

            <div class="mt-4 leading-8 text-text-muted">

                {{ $slot }}

            </div>

        </div>

    </div>

</div>