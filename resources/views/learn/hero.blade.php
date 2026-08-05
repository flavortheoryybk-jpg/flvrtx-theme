<section class="bg-background py-24 lg:py-32">

    <x-container>

        <div class="mx-auto max-w-5xl text-center">

            <x-ui.badge>

                FLVRTX Learn

            </x-ui.badge>

            <h1 class="mt-8 text-6xl lg:text-7xl font-bold leading-[1.05] tracking-tight lg:text-6xl">

                {{ get_the_title() }}

            </h1>

            @if (get_field('summary'))

                <p class="mx-auto mt-8 max-w-3xl text-xl leading-9 text-text-muted">

                    {{ get_field('summary') }}

                </p>

            @endif

            <div class="mt-12 flex flex-wrap items-center justify-center gap-4">

                @if (get_field('reading_time'))

                    <x-ui.badge class="bg-white">

                        📖 {{ get_field('reading_time') }} min read

                    </x-ui.badge>

                @endif

                <x-ui.badge class="bg-white">

                    📅 {{ get_the_date('F j, Y') }}

                </x-ui.badge>

                @if (get_field('difficulty'))

                    <x-ui.badge class="bg-white">

                        🎓 {{ get_field('difficulty') }}

                    </x-ui.badge>

                @endif

            </div>

        </div>

    </x-container>

</section>