@php

$recipes = new WP_Query([
    'post_type' => 'recommendation',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
]);

@endphp

@if($recipes->have_posts())

<section class="py-24 bg-white">

    <x-container>

        <x-ui.section-heading
            eyebrow="Recommendations"
            title="Recommended Products"
            description="Products, ingredients and tools I personally recommend."

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

            @while($recipes->have_posts())

                @php($recipes->the_post())

                @include('recommendation.card')

            @endwhile

        </div>

        <div class="mt-12 text-center">

            <x-ui.button
                href="{{ get_post_type_archive_link('recipe') }}"
                variant="secondary">

                Explore recommendations

            </x-ui.button>

        </div>

        @php(wp_reset_postdata())

    </x-container>

</section>

@endif