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

            {{-- Recommended Badge --}}
            <div class="absolute left-5 top-5">

                <x-ui.pill>

                    FLVRTX Pick

                </x-ui.pill>

            </div>

            {{-- Rating --}}
            @if(get_field('rating'))

                <div class="absolute right-5 top-5 rounded-xl bg-white/95 px-3 py-2 text-sm font-bold shadow-lg backdrop-blur">

                    ⭐ {{ get_field('rating') }}/5

                </div>

            @endif

        </div>

    @endif


    {{-- Content --}}
    <div class="flex flex-1 flex-col p-8">

        {{-- Category + Price --}}
        <div class="flex items-center justify-between gap-4">

            @php
                $categories = get_the_terms(
                    get_the_ID(),
                    'recommendation_category'
                );
            @endphp

            <x-ui.pill>

                {{ $categories && ! is_wp_error($categories)
                    ? $categories[0]->name
                    : 'Product' }}

            </x-ui.pill>

            @if(get_field('price'))

                <span class="whitespace-nowrap text-lg font-bold text-primary">

                    ₹{{ get_field('price') }}

                </span>

            @endif

        </div>


        {{-- Product Title --}}
        <h3 class="mt-6 text-2xl font-bold leading-tight tracking-tight transition-colors duration-300 group-hover:text-primary">

            {{ get_the_title() }}

        </h3>


        {{-- Verdict --}}
        @if(get_field('verdict'))

            <div class="mt-5 rounded-2xl bg-primary/5 p-4">

                <p class="text-sm font-semibold uppercase tracking-widest text-primary">

                    FLVRTX Verdict

                </p>

                <p class="mt-2 line-clamp-3 text-sm leading-7 text-text-muted">

                    {{ get_field('verdict') }}

                </p>

            </div>

        @else

            <p class="mt-4 line-clamp-3 flex-1 leading-8 text-text-muted">

                {{ get_the_excerpt() }}

            </p>

        @endif


        {{-- Footer --}}
        <div class="mt-8 flex items-center justify-between border-t border-border/20 pt-6">

            <div class="flex items-center gap-2 text-sm text-text-muted">

                <i
                    data-lucide="badge-check"
                    class="h-4 w-4">
                </i>

                <span>

                    FLVRTX Pick

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