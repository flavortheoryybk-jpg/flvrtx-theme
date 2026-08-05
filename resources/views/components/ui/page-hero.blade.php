@props([
    'eyebrow' => null,
    'title',
    'subtitle' => null,
    'description' => null,
])

<section class="bg-background py-24 lg:py-32">

    <x-container>

        <div class="mx-auto max-w-5xl text-center">

            @if($eyebrow)

                <p class="text-xs font-semibold uppercase tracking-[0.3em] text-primary">

                    {{ $eyebrow }}

                </p>

            @endif

            <h1 class="mt-6 text-6xl lg:text-7xl font-bold tracking-tight lg:text-7xl">

                {{ $title }}

            </h1>

            @if($subtitle)

                <p class="mt-5 text-2xl font-medium text-text">

                    {{ $subtitle }}

                </p>

            @endif

            @if($description)

                <p class="mx-auto mt-8 max-w-3xl text-xl leading-9 text-text-muted">

                    {{ $description }}

                </p>

            @endif

            @if(trim($slot))

                <div class="mt-12">

                    {{ $slot }}

                </div>

            @endif

        </div>

    </x-container>

</section>