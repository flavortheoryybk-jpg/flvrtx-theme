@php

$recipes = new WP_Query([
    'post_type'      => 'recipe',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
]);

@endphp

@if($recipes->have_posts())

<x-ui.section class="bg-background">

    <x-container>

        {{-- Section Header --}}
        <x-ui.section-heading
            eyebrow="Recipes"
            title="Latest Recipes"
            description="Discover our newest recipes, carefully tested and crafted to help you cook with confidence."
        />

        {{-- Recipe Grid --}}
        <div class="mt-16 grid gap-8 md:grid-cols-2 xl:grid-cols-3">

            @while($recipes->have_posts())

                @php($recipes->the_post())

                @include('recipe.card')

            @endwhile

            @php(wp_reset_postdata())

        </div>

        {{-- CTA --}}
        <div class="mt-16 flex justify-center">

            <x-ui.button
                href="{{ get_post_type_archive_link('recipe') }}"
                variant="secondary">

                View All Recipes

                <i
                    data-lucide="arrow-right"
                    class="h-5 w-5">
                </i>

            </x-ui.button>

        </div>

    </x-container>

</x-ui.section>

@endif