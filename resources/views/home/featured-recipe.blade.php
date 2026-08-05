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

@if ($featured->have_posts())

    @while ($featured->have_posts())

        @php($featured->the_post())

<section class="bg-white py-24 lg:py-32">

    <x-container>

        <div class="grid items-center gap-20 lg:grid-cols-2">

            {{-- Image --}}
            <div class="order-2 lg:order-1">

                @if (has_post_thumbnail())

                    {!! get_the_post_thumbnail(
                        get_the_ID(),
                        'large',
                        [
                            'class' => 'aspect-[4/3] w-full rounded-[36px] object-cover shadow-[0_30px_60px_rgba(0,0,0,0.15)] transition-all duration-500 hover:-translate-y-2 hover:scale-[1.02]',
                            'loading' => 'lazy',
                            'decoding' => 'async',
                        ]
                    ) !!}

                @endif

            </div>

            {{-- Content --}}
            <div class="order-1 lg:order-2">

                <x-ui.badge>

                    Featured Recipe

                </x-ui.badge>

                <h2 class="mt-8 text-4xl font-bold leading-tight tracking-tight lg:text-6xl">

                    {{ get_the_title() }}

                </h2>

                <p class="mt-6 max-w-lg text-lg leading-8 text-text-muted">

                    {{ get_the_excerpt() }}

                </p>

                {{-- Recipe Meta --}}
                <div class="mt-10 grid grid-cols-3 gap-6">

                    <x-ui.meta-item
                        label="Prep Time"
                        value="{{ get_field('prep_time') ?: '--' }} min" />

                    <x-ui.meta-item
                        label="Difficulty"
                        value="{{ get_field('difficulty') ?: '--' }}" />

                    <x-ui.meta-item
                        label="Servings"
                        value="{{ get_field('servings') ?: '--' }}" />

                </div>

                {{-- CTA --}}
                <div class="mt-10">

                    <x-ui.button
                        href="{{ get_permalink() }}"
                        size="lg">

                        Cook This Recipe →

                    </x-ui.button>

                </div>

            </div>

        </div>

    </x-container>

</section>

    @endwhile

    @php(wp_reset_postdata())

@endif