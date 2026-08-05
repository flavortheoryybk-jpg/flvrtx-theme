<x-ui.card
    href="{{ get_permalink() }}"
    class="group flex h-full flex-col overflow-hidden p-0">

    {{-- Image --}}
    @if (has_post_thumbnail())

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

            @if (get_field('difficulty'))

                <div class="absolute left-5 top-5">

                    <x-ui.pill>

                        {{ get_field('difficulty') }}

                    </x-ui.pill>

                </div>

            @endif

        </div>

    @endif

    {{-- Content --}}
    <div class="flex flex-1 flex-col p-8">

        {{-- Top Meta --}}
        <div class="flex items-center justify-between">

            @php
                $category = get_the_terms(get_the_ID(), 'category');
            @endphp

            @if($category)

                <a
                    href="{{ get_term_link($category[0]) }}"
                    class="transition-opacity hover:opacity-80">

                    <x-ui.pill>

                        {{ $category[0]->name }}

                    </x-ui.pill>

                </a>

            @else

                <x-ui.pill>

                    Recipe

                </x-ui.pill>

            @endif

            <span class="text-sm font-medium text-text-muted">

                {{ get_field('prep_time') ?: '--' }} mins

            </span>

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
                    data-lucide="users"
                    class="h-4 w-4">
                </i>

                <span>

                    {{ get_field('servings') ?: '--' }} Servings

                </span>

            </div>

            <span
                class="inline-flex items-center gap-2 font-semibold text-primary transition-all duration-300 group-hover:gap-3">

                View Recipe

                <i
                    data-lucide="arrow-right"
                    class="h-4 w-4">
                </i>

            </span>

        </div>

    </div>

</x-ui.card>