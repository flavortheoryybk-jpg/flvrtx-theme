@php

$learn = new WP_Query([
    'post_type' => 'Watch',
    'posts_per_page' => 3,
    'post_status' => 'publish',
]);

@endphp

@if($learn->have_posts())

<section class="py-24 bg-white">

    <x-container>

        <x-ui.section-heading
            eyebrow="Watch"
            title="Food Science & Learning"
            description="Understand why food behaves the way it does." />

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

            @while($learn->have_posts())

                @php($learn->the_post())

                @include('learn.card')

            @endwhile

        </div>

        <div class="mt-12 text-center">

            <x-ui.button
                href="{{ get_post_type_archive_link('learn') }}"
                variant="secondary">

                Explore Articles

            </x-ui.button>

        </div>

        @php(wp_reset_postdata())

    </x-container>

</section>

@endif