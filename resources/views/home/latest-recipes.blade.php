<section class="py-24 bg-white">
    <x-container>

        <div class="flex items-end justify-between mb-12">

            <div>
                <p class="text-primary font-semibold uppercase tracking-wider">
                    Latest
                </p>

                <h2 class="mt-2 text-4xl font-bold">
                    Latest Recipes
                </h2>

                <p class="mt-3 text-text-muted">
                    Fresh recipes from the FLVRTX kitchen.
                </p>
            </div>

            <a href="#"
               class="hidden md:inline-flex text-primary font-semibold hover:underline">
                View All →
            </a>

        </div>

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

@php
$recipes = new WP_Query([
    'post_type'      => 'recipe',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
]);
@endphp

@if($recipes->have_posts())

    @while($recipes->have_posts())
        @php($recipes->the_post())

        @include('recipe.card')

    @endwhile

    @php(wp_reset_postdata())

@endif

        </div>

    </x-container>
</section>