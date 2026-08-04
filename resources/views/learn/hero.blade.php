<section class="bg-background py-24">

    <x-container>

        <div class="mx-auto max-w-4xl text-center">

            <x-ui.badge>
                FLVRTX Learn
            </x-ui.badge>

            <h1 class="mt-6 text-5xl font-bold leading-tight lg:text-6xl">
                {{ get_the_title() }}
            </h1>

            @if(get_field('summary'))

                <p class="mx-auto mt-6 max-w-3xl text-xl leading-9 text-text-muted">
                    {{ get_field('summary') }}
                </p>

            @endif

            <div class="mt-10 flex flex-wrap justify-center gap-8 text-sm text-text-muted">

                @if(get_field('reading_time'))
                    <span>📖 {{ get_field('reading_time') }} min read</span>
                @endif

                <span>{{ get_the_date('F j, Y') }}</span>

                @if(get_field('difficulty'))
                    <span>{{ get_field('difficulty') }}</span>
                @endif

            </div>

        </div>

    </x-container>

</section>