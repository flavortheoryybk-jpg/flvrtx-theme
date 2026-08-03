@php

$featured = new WP_Query([
    'post_type' => 'recipe',
    'posts_per_page' => 1,
    'post_status' => 'publish',
]);

@endphp

@if($featured->have_posts())

    @while($featured->have_posts())

        @php($featured->the_post())

<section class="py-24 bg-background">

    <x-container>

        <div class="grid items-center gap-12 lg:grid-cols-2">

            <div>

                @if(has_post_thumbnail())

                    {!! get_the_post_thumbnail(get_the_ID(), 'large', [
                        'class' => 'aspect-video w-full rounded-3xl object-cover shadow-lg'
                    ]) !!}

                @endif

            </div>

            <div>

                <span class="text-sm font-semibold uppercase tracking-widest text-primary">
                    Featured Recipe
                </span>

                <h2 class="mt-4 text-5xl font-bold leading-tight">
                    {{ get_the_title() }}
                </h2>

                <p class="mt-6 text-lg leading-8 text-text-muted">
                    {{ get_the_excerpt() }}
                </p>

                <a
                    href="{{ get_permalink() }}"
                    class="mt-8 inline-flex rounded-xl bg-primary px-8 py-4 font-semibold text-white transition hover:opacity-90">

                    Read Recipe →

                </a>

            </div>

        </div>

    </x-container>

</section>

    @endwhile

    @php(wp_reset_postdata())

@endif