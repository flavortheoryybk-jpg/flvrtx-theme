@php

$learn = new WP_Query([
    'post_type'      => 'learn',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
]);

@endphp

@if ($learn->have_posts())

<section class="bg-background py-24 lg:py-32">

    <x-container>

        <x-ui.section-heading
            eyebrow="Learn"
            title="Food Science & Learning"
            description="Go beyond recipes and understand the techniques, science, and principles that make every dish successful." />

        <div class="mt-14 grid gap-8 md:grid-cols-2 lg:grid-cols-3">

            @while ($learn->have_posts())

                @php($learn->the_post())

                @include('learn.card')

            @endwhile

            @php(wp_reset_postdata())

        </div>

        <div class="mt-16 text-center">

            <x-ui.button
                href="{{ get_post_type_archive_link('learn') }}"
                variant="secondary"
                size="lg">

                View All Articles →

            </x-ui.button>

        </div>

    </x-container>

</section>

@endif