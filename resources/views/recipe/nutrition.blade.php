@if(
    get_field('protein') ||
    get_field('fat') ||
    get_field('carbohydrates') ||
    get_field('fiber')
)

<x-ui.section>

    <div class="mx-auto max-w-4xl">

        <x-ui.section-heading
            eyebrow="Nutrition"
            title="Nutritional Information"
            description="Approximate nutrition per serving." />

        <div class="mt-12 grid grid-cols-2 gap-6 md:grid-cols-4">

            <x-ui.card>

                <p class="text-sm text-text-muted">Protein</p>

                <p class="mt-3 text-3xl font-bold">{{ get_field('protein') }} g</p>

            </x-ui.card>

            <x-ui.card>

                <p class="text-sm text-text-muted">Fat</p>

                <p class="mt-3 text-3xl font-bold">{{ get_field('fat') }} g</p>

            </x-ui.card>

            <x-ui.card>

                <p class="text-sm text-text-muted">Carbs</p>

                <p class="mt-3 text-3xl font-bold">{{ get_field('carbohydrates') }} g</p>

            </x-ui.card>

            <x-ui.card>

                <p class="text-sm text-text-muted">Fiber</p>

                <p class="mt-3 text-3xl font-bold">{{ get_field('fiber') }} g</p>

            </x-ui.card>

        </div>

    </div>

</x-ui.section>

@endif