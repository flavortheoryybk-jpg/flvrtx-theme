@php

$categories = wp_get_post_terms(get_the_ID(), 'category', [
    'fields' => 'ids',
]);

$related = new WP_Query([
    'post_type'           => 'learn',
    'posts_per_page'      => 3,
    'post__not_in'        => [get_the_ID()],
    'ignore_sticky_posts' => true,
    'post_status'         => 'publish',
    'tax_query'           => [
        [
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'    => $categories,
        ],
    ],
]);

// Fallback
if (!$related->have_posts()) {

    $related = new WP_Query([
        'post_type'           => 'learn',
        'posts_per_page'      => 3,
        'post__not_in'        => [get_the_ID()],
        'ignore_sticky_posts' => true,
        'post_status'         => 'publish',
        'orderby'             => 'date',
        'order'               => 'DESC',
    ]);

}

@endphp

@if ($related->have_posts())

<section class="bg-background py-24 lg:py-32" id="related-articles">

    <x-container>

        <x-ui.section-heading
            eyebrow="Keep Learning"
            title="Related Articles"
            description="Continue exploring food science, cooking techniques, and practical kitchen knowledge." />

        <div class="mt-14 grid gap-8 md:grid-cols-2 xl:grid-cols-3">

            @while ($related->have_posts())

                @php($related->the_post())

                @include('learn.card')

            @endwhile

            @php(wp_reset_postdata())

        </div>

        <div class="mt-16 text-center">

            <x-ui.button
                href="{{ get_post_type_archive_link('learn') }}"
                variant="secondary"
                size="lg">

                Browse All Articles →

            </x-ui.button>

        </div>

    </x-container>

</section>

@endif