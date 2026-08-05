<x-ui.card
    href="{{ get_permalink() }}"
    class="group flex h-full flex-col overflow-hidden p-0">

    {{-- Product Image --}}
    @if(has_post_thumbnail())

        <div class="relative overflow-hidden rounded-t-[32px]">

            {!! get_the_post_thumbnail(
                get_the_ID(),
                'medium_large',
                [
                    'class' => 'aspect-square w-full object-cover transition-transform duration-700 group-hover:scale-105',
                    'loading' => 'lazy',
                    'decoding' => 'async',
                ]
            ) !!}

            <div class="absolute left-5 top-5">

                <x-ui.pill>

                    Recommended

                </x-ui.pill>

            </div>

            @if(get_field('rating'))

                <div class="absolute right-5 top-5 rounded-xl bg-white/90 px-3 py-2 text-sm font-bold shadow-lg backdrop-blur">

                    ⭐ {{ get_field('rating') }}/5

                </div>

            @endif

        </div>

    @endif

    {{-- Content --}}
    <div class="flex flex-1 flex-col p-8">

        <div class="flex items-center justify-between">

            <x-ui.pill>

                {{ get_field('product_category') ?: 'Product' }}

            </x-ui.pill>

            @if(get_field('price'))

                <span class="text-lg font-bold text-primary">

                    ₹{{ get_field('price') }}

                </span>

            @endif

        </div>

        <h3 class="mt-6 text-2xl font-bold tracking-tight leading-tight transition-colors duration-300 group-hover:text-primary">

            {{ get_the_title() }}

        </h3>

        <p class="mt-4 line-clamp-3 flex-1 leading-8 text-text-muted">

            {{ get_the_excerpt() }}

        </p>

        <div class="mt-8 flex items-center justify-between border-t border-border/20 pt-6">

            <div class="flex items-center gap-2 text-sm text-text-muted">

                <i
                    data-lucide="badge-check"
                    class="h-4 w-4">
                </i>

                <span>

                    Personally Recommended

                </span>

            </div>

            <span
                class="inline-flex items-center gap-2 font-semibold text-primary transition-all duration-300 group-hover:gap-3">

                View Review

                <i
                    data-lucide="arrow-right"
                    class="h-4 w-4">
                </i>

            </span>

        </div>

    </div>

</x-ui.card>