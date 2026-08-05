@php

$recommendations = new WP_Query([
    'post_type'      => 'recommendation',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
]);

@endphp

@if ($recommendations->have_posts())

<section class="bg-background py-24 lg:py-32">

    <x-container>

        <x-ui.section-heading
            eyebrow="Recommendations"
            title="Products We Trust"
            description="Carefully selected ingredients, cookware, and kitchen tools that we genuinely recommend."
            align="center" />

        <div class="mt-14 grid gap-8 md:grid-cols-2 lg:grid-cols-3">

            @while ($recommendations->have_posts())

                @php($recommendations->the_post())

                @include('recommendation.card')

            @endwhile

            @php(wp_reset_postdata())

        </div>

        <div class="mt-16 text-center">

            <x-ui.button
                href="{{ get_post_type_archive_link('recommendation') }}"
                variant="secondary"
                size="lg">

                View All Recommendations →

            </x-ui.button>

        </div>

    </x-container>

</section>

@endif