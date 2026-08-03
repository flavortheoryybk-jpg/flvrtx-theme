@php

$learn = new WP_Query([
    'post_type' => 'learn',
    'posts_per_page' => 3,
    'post_status' => 'publish',
]);

@endphp

@if($learn->have_posts())

<section class="py-24 bg-white">

    <x-container>

        <div class="mb-12">

            <span class="text-sm font-semibold uppercase tracking-widest text-primary">
                Learn
            </span>

            <h2 class="mt-3 text-4xl font-bold">
                Food Science & Learning
            </h2>

            <p class="mt-3 text-lg text-text-muted">
                Understand why food behaves the way it does.
            </p>

        </div>

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

            @while($learn->have_posts())

                @php($learn->the_post())

                @include('learn.card')

            @endwhile

        </div>

        @php(wp_reset_postdata())

    </x-container>

</section>

@endif