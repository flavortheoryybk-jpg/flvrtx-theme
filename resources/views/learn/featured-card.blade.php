<x-ui.card href="{{ get_permalink() }}">

    <div class="grid lg:grid-cols-2">

        <div>

            {!! get_the_post_thumbnail(
                get_the_ID(),
                'large',
                [
                    'class' => 'h-full w-full object-cover'
                ]
            ) !!}

        </div>

        <div class="flex flex-col justify-center p-10">

            <x-ui.badge>

                Featured Learn

            </x-ui.badge>

            <h2 class="mt-5 text-4xl font-bold">

                {{ get_the_title() }}

            </h2>

            <p class="mt-6 text-lg leading-8 text-text-muted">

                {{ get_the_excerpt() }}

            </p>

            <span class="mt-8 font-semibold text-primary">

                Read Article →

            </span>

        </div>

    </div>

</x-ui.card>