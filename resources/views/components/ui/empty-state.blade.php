@props([
    'title',
    'description',
    'icon' => '🔍',
    'action' => null,
    'actionUrl' => null,
])

<div
    {{ $attributes->merge([
        'class' => 'rounded-3xl border border-border bg-white px-8 py-20 text-center',
    ]) }}>

    <div class="text-5xl">

        {{ $icon }}

    </div>

    <h2 class="mt-6 text-3xl font-bold">

        {{ $title }}

    </h2>

    <p class="mx-auto mt-4 max-w-xl text-lg leading-8 text-text-muted">

        {{ $description }}

    </p>

    @if($action && $actionUrl)

        <div class="mt-10">

            <x-ui.button
                :href="$actionUrl">

                {{ $action }}

            </x-ui.button>

        </div>

    @endif

</div>