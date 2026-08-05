<x-ui.card
    href="{{ get_permalink() }}"
    class="group flex h-full flex-col overflow-hidden p-0">

    {{-- Thumbnail --}}
    @if(has_post_thumbnail())

        <div class="relative overflow-hidden rounded-t-[32px]">

            {!! get_the_post_thumbnail(
                get_the_ID(),
                'medium_large',
                [
                    'class' => 'aspect-video w-full object-cover transition-transform duration-700 group-hover:scale-105',
                    'loading' => 'lazy',
                    'decoding' => 'async',
                ]
            ) !!}

            {{-- Play Button --}}
            <div class="absolute inset-0 flex items-center justify-center">

                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-white/90 shadow-xl backdrop-blur transition-transform duration-300 group-hover:scale-110">

                    <i
                        data-lucide="play"
                        class="ml-1 h-7 w-7 fill-primary text-primary">
                    </i>

                </div>

            </div>

            {{-- Badge --}}
            <div class="absolute left-5 top-5">

                <x-ui.pill>

                    Watch

                </x-ui.pill>

            </div>

            {{-- Duration --}}
            @if(get_field('video_duration'))

                <div class="absolute bottom-5 right-5 rounded-lg bg-black/80 px-3 py-1 text-sm font-semibold text-white">

                    {{ get_field('video_duration') }}

                </div>

            @endif

        </div>

    @endif

    {{-- Content --}}
    <div class="flex flex-1 flex-col p-8">

        <div class="flex items-center justify-between">

            <x-ui.pill>

                Video

            </x-ui.pill>

            <span class="text-sm text-text-muted">

                {{ get_the_date('M d, Y') }}

            </span>

        </div>

        <h3 class="mt-6 text-2xl font-bold leading-tight tracking-tight transition-colors duration-300 group-hover:text-primary">

            {{ get_the_title() }}

        </h3>

        <p class="mt-4 line-clamp-3 flex-1 leading-8 text-text-muted">

            {{ get_the_excerpt() }}

        </p>

        <div class="mt-8 flex items-center justify-between border-t border-border/20 pt-6">

            <div class="flex items-center gap-2 text-sm text-text-muted">

                <i
                    data-lucide="play-circle"
                    class="h-4 w-4">
                </i>

                <span>

                    Video Tutorial

                </span>

            </div>

            <span class="inline-flex items-center gap-2 font-semibold text-primary transition-all duration-300 group-hover:gap-3">

                Watch Now

                <i
                    data-lucide="arrow-right"
                    class="h-4 w-4">
                </i>

            </span>

        </div>

    </div>

</x-ui.card>