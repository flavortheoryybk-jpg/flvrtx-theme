@if($recipe = get_field('related_recipe'))

<x-ui.section>

    <x-ui.section-header
        badge="Related Recipe"
        title="Put Theory Into Practice"
        description="Now that you understand the science, try the recipe." />

    @php
        $post = is_array($recipe) ? $recipe[0] : $recipe;
        setup_postdata($post);
    @endphp

    <div class="mx-auto max-w-md">

        @include('recipe.card')

    </div>

    @php(wp_reset_postdata())

</x-ui.section>

@endif