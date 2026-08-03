@php

$featured = new WP_Query([
    'post_type'      => 'recipe',
    'posts_per_page' => 1,
    'post_status'    => 'publish',
]);

@endphp

@if($featured->have_posts())

    @while($featured->have_posts())

        @php($featured->the_post())

<section class="py-24 bg-background">

    <x-container>

        <div class="grid items-center gap-16 lg:grid-cols-2">

            <div>

                @if(has_post_thumbnail())

                    {!! get_the_post_thumbnail(
                        get_the_ID(),
                        'large',
                        [
                            'class' => 'aspect-video w-full rounded-3xl object-cover shadow-lg transition duration-500 hover:scale-[1.02]'
                        ]
                    ) !!}

                @endif

            </div>

            <div>

                <x-ui.badge>

                    Featured Recipe

                </x-ui.badge>

                <h2 class="mt-5 text-5xl font-bold leading-tight">

                    {{ get_the_title() }}

                </h2>

                <p class="mt-6 text-lg leading-8 text-text-muted">

                    {{ get_the_excerpt() }}

                </p>

                <div class="mt-8 flex flex-wrap gap-4 text-sm text-text-muted">

                    <span>⏱ {{ get_field('prep_time') }} min</span>

                    <span>👨‍🍳 {{ get_field('difficulty') }}</span>

                    <span>🍽 {{ get_field('servings') }} Servings</span>

                </div>

                <div class="mt-10">

                    <x-ui.button
                        href="{{ get_permalink() }}">

                        Read Recipe →

                    </x-ui.button>

                </div>

            </div>

        </div>

    </x-container>

</section>

    @endwhile

    @php(wp_reset_postdata())

@endif