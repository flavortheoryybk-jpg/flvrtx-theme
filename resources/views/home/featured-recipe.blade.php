@php

$featured = new WP_Query([
    'post_type'      => 'recipe',
    'posts_per_page' => 1,
    'post_status'    => 'publish',
    'meta_query'     => [
        [
            'key'     => 'featured_recipe',
            'value'   => 1,
            'compare' => '=',
        ],
    ],
]);

@endphp

@if($featured->have_posts())

    @while($featured->have_posts())

        @php($featured->the_post())

<x-ui.section class="bg-background">

    <x-container>

        <div class="grid items-center gap-16 lg:grid-cols-2">

            {{-- Image --}}
            <div class="order-2 lg:order-1">

                @if(has_post_thumbnail())

                    <a
                        href="{{ get_permalink() }}"
                        class="group block overflow-hidden rounded-[40px]">

                        {!! get_the_post_thumbnail(
                            get_the_ID(),
                            'large',
                            [
                                'class' => 'aspect-[4/3] w-full object-cover transition-transform duration-700 group-hover:scale-105',
                                'loading' => 'lazy',
                                'decoding' => 'async',
                            ]
                        ) !!}

                    </a>

                @endif

            </div>

            {{-- Content --}}
            <div class="order-1 lg:order-2">

                <x-ui.pill>

                    Featured Recipe

                </x-ui.pill>

                <h2 class="mt-8 text-4xl font-bold tracking-tight leading-tight lg:text-6xl">

                    {{ get_the_title() }}

                </h2>

                <p class="mt-6 text-lg leading-8 text-text-muted">

                    {{ get_the_excerpt() }}

                </p>

                {{-- Recipe Stats --}}
                <div class="mt-10 grid grid-cols-2 gap-5 sm:grid-cols-4">

                    <x-ui.stat-card
                        icon="timer"
                        label="Prep"
                        :value="(get_field('prep_time') ?: '--').' min'"
                    />

                    <x-ui.stat-card
                        icon="flame"
                        label="Difficulty"
                        :value="get_field('difficulty') ?: '--'"
                    />

                    <x-ui.stat-card
                        icon="users"
                        label="Serves"
                        :value="get_field('servings') ?: '--'"
                    />

                    <x-ui.stat-card
                        icon="utensils-crossed"
                        label="Cuisine"
                        :value="get_field('cuisine') ?: '--'"
                    />

                </div>

                {{-- CTA --}}
                <div class="mt-10">

                    <x-ui.button href="{{ get_permalink() }}">

                        View Recipe

                        <i
                            data-lucide="arrow-right"
                            class="h-5 w-5">
                        </i>

                    </x-ui.button>

                </div>

            </div>

        </div>

    </x-container>

</x-ui.section>

    @endwhile

    @php(wp_reset_postdata())

@endif