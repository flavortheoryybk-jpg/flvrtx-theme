@php

$watch = new WP_Query([
    'post_type'      => 'watch',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
]);

@endphp

@if ($watch->have_posts())

<section class="bg-white py-24 lg:py-32">

    <x-container>

        <x-ui.section-heading
            eyebrow="Watch"
            title="Watch & Learn"
            description="Discover premium cooking videos, techniques, and visual guides that bring every recipe to life." />

        <div class="mt-14 grid gap-8 md:grid-cols-2 lg:grid-cols-3">

            @while ($watch->have_posts())

                @php($watch->the_post())

                @include('watch.card')

            @endwhile

            @php(wp_reset_postdata())

        </div>

        <div class="mt-16 text-center">

            <x-ui.button
                href="{{ get_post_type_archive_link('watch') }}"
                variant="secondary"
                size="lg">

                View All Videos →

            </x-ui.button>

        </div>

    </x-container>

</section>

@endif