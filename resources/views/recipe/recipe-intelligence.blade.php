@if(
    get_field('skill_level') ||
    get_field('cooking_confidence') ||
    get_field('budget_level') ||
    get_field('meal_type') ||
    get_field('best_season') ||
    get_field('best_for_recipe')
)

<x-ui.section>

    <div class="mx-auto max-w-6xl">

        <x-ui.section-heading
            eyebrow="FLVRTX Intelligence"
            title="Recipe Intelligence"
            description="A quick overview to help you decide if this recipe is right for you."
        />

        <div class="mt-14 grid gap-6 md:grid-cols-2 xl:grid-cols-3">

            <x-ui.metric-card
                title="Cooking Skill"
                :value="get_field('skill_level').'/10'"
                icon="chef-hat"
            />

            <x-ui.metric-card
                title="Confidence"
                :value="get_field('cooking_confidence').'%'"
                icon="badge-check"
            />

            <x-ui.metric-card
                title="Budget"
                :value="get_field('budget_level')"
                icon="wallet"
            />

            <x-ui.metric-card
                title="Meal Type"
                :value="get_field('meal_type')"
                icon="utensils-crossed"
            />

            <x-ui.metric-card
                title="Best Season"
                :value="get_field('best_season')"
                icon="sun"
            />

            <x-ui.metric-card
                title="Best For"
                :value="get_field('best_for_recipe')"
                icon="sparkles"
            />

        </div>

    </div>

</x-ui.section>

@endif