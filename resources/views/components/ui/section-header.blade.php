<div class="mx-auto mb-16 max-w-3xl text-center">

    @isset($badge)
        <x-ui.badge>
            {{ $badge }}
        </x-ui.badge>
    @endisset

    <h2 class="mt-6 text-4xl font-bold tracking-tight lg:text-5xl">
        {{ $title }}
    </h2>

    @isset($description)
        <p class="mt-6 text-lg leading-8 text-text-muted">
            {{ $description }}
        </p>
    @endisset

</div>