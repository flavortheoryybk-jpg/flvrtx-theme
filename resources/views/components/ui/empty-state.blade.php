@props([
    'title',
    'description',
    'icon' => '🔍',
    'action' => null,
    'actionUrl' => null,
])

<div
    {{ $attributes->merge([
        'class' => 'rounded-[32px] border border-border bg-white px-8 py-24 text-center',
    ]) }}>

    <div class="text-6xl lg:text-7xl">

        {{ $icon }}

    </div>

    <h2 class="mt-6 text-3xl font-bold tracking-tight">

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