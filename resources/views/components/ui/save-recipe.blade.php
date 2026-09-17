@props([
    'recipeId',
])

@php
    $is_saved = false;

    if (is_user_logged_in()) {
        $saved_recipes = get_user_meta(
            get_current_user_id(),
            '_flvrtx_saved_recipes',
            true
        );

        if (! is_array($saved_recipes)) {
            $saved_recipes = [];
        }

        $is_saved = in_array($recipeId, $saved_recipes, true);
    }
@endphp

@if(is_user_logged_in())

    @if($is_saved)

        <form
            method="POST"
            action="{{ admin_url('admin-post.php') }}">

            <input
                type="hidden"
                name="action"
                value="flvrtx_unsave_recipe">

            <input
                type="hidden"
                name="recipe_id"
                value="{{ $recipeId }}">

            <input
                type="hidden"
                name="flvrtx_unsave_recipe_nonce"
                value="{{ wp_create_nonce('flvrtx_unsave_recipe') }}">

            <button
                type="submit"
                class="inline-flex items-center justify-center gap-2 rounded-2xl border border-primary bg-primary px-5 py-3 text-sm font-semibold text-white transition-all duration-300 hover:-translate-y-0.5 hover:bg-primary/90">

                <i
                    data-lucide="bookmark-check"
                    class="h-5 w-5">
                </i>

                Saved

            </button>

        </form>

    @else

        <form
            method="POST"
            action="{{ admin_url('admin-post.php') }}">

            <input
                type="hidden"
                name="action"
                value="flvrtx_save_recipe">

            <input
                type="hidden"
                name="recipe_id"
                value="{{ $recipeId }}">

            <input
                type="hidden"
                name="flvrtx_save_recipe_nonce"
                value="{{ wp_create_nonce('flvrtx_save_recipe') }}">

            <button
                type="submit"
                class="inline-flex items-center justify-center gap-2 rounded-2xl border border-border bg-white px-5 py-3 text-sm font-semibold text-text transition-all duration-300 hover:-translate-y-0.5 hover:border-primary hover:text-primary">

                <i
                    data-lucide="bookmark"
                    class="h-5 w-5">
                </i>

                Save Recipe

            </button>

        </form>

    @endif

@else

    <a
        <a
          href="{{ add_query_arg(
              'redirect_to',
              rawurlencode(get_permalink($recipeId)),
              home_url('/login/')
          ) }}"
        class="inline-flex items-center justify-center gap-2 rounded-2xl border border-border bg-white px-5 py-3 text-sm font-semibold text-text transition-all duration-300 hover:-translate-y-0.5 hover:border-primary hover:text-primary">

        <i
            data-lucide="bookmark"
            class="h-5 w-5">
        </i>

        Sign in to Save

    </a>

@endif