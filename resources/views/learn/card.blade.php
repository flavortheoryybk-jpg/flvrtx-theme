<x-ui.card
    href="{{ get_permalink() }}"
    class="group flex h-full flex-col overflow-hidden p-0">

    {{-- Featured Image --}}
    @if(has_post_thumbnail())

        <div class="relative overflow-hidden rounded-t-[32px]">

            {!! get_the_post_thumbnail(
                get_the_ID(),
                'medium_large',
                [
                    'class' => 'aspect-[4/3] w-full object-cover transition-transform duration-700 group-hover:scale-105',
                    'loading' => 'lazy',
                    'decoding' => 'async',
                ]
            ) !!}

            <div class="absolute left-5 top-5">

                <x-ui.pill>

                    Learn

                </x-ui.pill>

            </div>

        </div>

    @endif

    {{-- Content --}}
    <div class="flex flex-1 flex-col p-8">

        {{-- Meta --}}
        <div class="flex items-center justify-between">

            <x-ui.pill>

                Food Science

            </x-ui.pill>

            <div class="flex items-center gap-2 text-sm text-text-muted">

                <i
                    data-lucide="book-open"
                    class="h-4 w-4">
                </i>

                <span>

                    {{ get_field('reading_time') ?: '5' }} min read

                </span>

            </div>

        </div>

        {{-- Title --}}
        <h3 class="mt-6 text-2xl font-bold leading-tight tracking-tight transition-colors duration-300 group-hover:text-primary">

            {{ get_the_title() }}

        </h3>

        {{-- Excerpt --}}
        <p class="mt-4 line-clamp-3 flex-1 leading-8 text-text-muted">

            {{ get_the_excerpt() }}

        </p>

        {{-- Footer --}}
        <div class="mt-8 flex items-center justify-between border-t border-border/20 pt-6">

            <div class="flex items-center gap-2 text-sm text-text-muted">

                <i
                    data-lucide="graduation-cap"
                    class="h-4 w-4">
                </i>

                <span>

                    Educational Article

                </span>

            </div>

            <span
                class="inline-flex items-center gap-2 font-semibold text-primary transition-all duration-300 group-hover:gap-3">

                Read Article

                <i
                    data-lucide="arrow-right"
                    class="h-4 w-4">
                </i>

            </span>

        </div>

    </div>

</x-ui.card>