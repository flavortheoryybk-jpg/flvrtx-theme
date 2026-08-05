<x-ui.card href="{{ get_permalink() }}">

    {{-- Image --}}
    @if (has_post_thumbnail())

        <div class="relative overflow-hidden">

            {!! get_the_post_thumbnail(
                get_the_ID(),
                'medium_large',
                [
                    'class' => 'aspect-[4/3] w-full object-cover transition-all duration-700 group-hover:scale-105',
                    'loading' => 'lazy',
                    'decoding' => 'async',
                ]
            ) !!}

            <div class="absolute right-4 top-4">

                <x-ui.badge class="bg-white/90 backdrop-blur">

                    Learn

                </x-ui.badge>

            </div>

        </div>

    @endif

    {{-- Content --}}
    <div class="flex flex-1 flex-col p-7">

        <div class="flex items-center justify-between">

            <x-ui.badge>

                Food Science

            </x-ui.badge>

            <span class="text-sm font-medium text-text-muted">

                {{ get_field('reading_time') ?: '5' }} min read

            </span>

        </div>

        <h3 class="mt-5 text-2xl font-bold leading-tight tracking-tight transition-colors duration-300 group-hover:text-primary">

            {{ get_the_title() }}

        </h3>

        <p class="mt-4 line-clamp-3 flex-1 leading-7 text-text-muted">

            {{ get_the_excerpt() }}

        </p>

        <div class="mt-8 flex items-center justify-between border-t border-border pt-5">

            <span class="text-sm font-medium text-text-muted">

                📖 Educational Article

            </span>

            <span class="font-semibold text-primary transition-transform duration-300 group-hover:translate-x-1">

                Read Article →

            </span>

        </div>

    </div>

</x-ui.card>