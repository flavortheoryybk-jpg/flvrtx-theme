@php

$recipes = new WP_Query([
    'post_type'      => 'recipe',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
]);

@endphp

@if ($recipes->have_posts())

<section class="bg-background py-24 lg:py-32">

    <x-container>

        <x-ui.section-heading
            eyebrow="Recipes"
            title="Latest Recipes"
            description="Fresh recipes, thoughtfully crafted to help you cook with confidence." />

        <div class="mt-14 grid gap-8 md:grid-cols-2 lg:grid-cols-3">

            @while ($recipes->have_posts())

                @php($recipes->the_post())

                @include('recipe.card')

            @endwhile

            @php(wp_reset_postdata())

        </div>

        <div class="mt-16 text-center">

            <x-ui.button
                href="{{ get_post_type_archive_link('recipe') }}"
                variant="secondary"
                size="lg">

                View All Recipes →

            </x-ui.button>

        </div>

    </x-container>

</section>

@endif