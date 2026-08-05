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
            description="Everything you should know before stepping into the kitchen."
        />

        <div class="mt-14 grid gap-6 sm:grid-cols-2 xl:grid-cols-3">

            <x-ui.metric-card
                icon="chef-hat"
                title="Cooking Skill"
                :value="get_field('skill_level').'/10'"
            />

            <x-ui.metric-card
                icon="badge-check"
                title="Confidence"
                :value="get_field('cooking_confidence').'%'" />

            <x-ui.metric-card
                icon="wallet"
                title="Budget"
                :value="get_field('budget_level')" />

            <x-ui.metric-card
                icon="utensils-crossed"
                title="Meal Type"
                :value="get_field('meal_type')" />

            <x-ui.metric-card
                icon="sun"
                title="Season"
                :value="get_field('best_season')" />

            <x-ui.metric-card
                icon="sparkles"
                title="Best For"
                :value="get_field('best_for_recipe')" />

        </div>

    </div>

</x-ui.section>

@endif