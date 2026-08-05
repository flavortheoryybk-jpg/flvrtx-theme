@if (get_field('related_recipe'))

<section class="bg-background py-20 lg:py-24" id="related-recipe">

    <x-container>

        <div class="mx-auto max-w-5xl">

            <x-ui.section-heading
                eyebrow="Related Recipe"
                title="Put Theory Into Practice"
                description="Now that you understand the science, bring it to life by cooking the recipe." />

            @php
                $relatedRecipe = get_field('related_recipe');
                $recipePost = is_array($relatedRecipe) ? $relatedRecipe[0] : $relatedRecipe;

                setup_postdata($recipePost);
            @endphp

            <div class="mx-auto mt-12 max-w-md">

                @include('recipe.card')

            </div>

            @php(wp_reset_postdata())

        </div>

    </x-container>

</section>

@endif