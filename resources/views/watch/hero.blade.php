<section class="bg-background py-24">

    <x-container>

        <div class="mx-auto max-w-4xl text-center">

            <x-ui.badge>
                FLVRTX Watch
            </x-ui.badge>

            <h1 class="mt-6 text-6xl lg:text-7xl font-bold leading-tight lg:text-6xl">

                {{ get_the_title() }}

            </h1>

            <p class="mx-auto mt-6 max-w-3xl text-xl leading-9 text-text-muted">

                {{ get_the_excerpt() }}

            </p>

        </div>

    </x-container>

</section>