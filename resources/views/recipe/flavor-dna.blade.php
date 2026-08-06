@if (
    get_field('spiciness') ||
    get_field('sweetness') ||
    get_field('sourness') ||
    get_field('saltiness') ||
    get_field('umami') ||
    get_field('richness')
)

<x-ui.section>

    <div class="mx-auto max-w-5xl">

        <x-ui.section-heading
            eyebrow="FLVRTX DNA"
            title="Flavor Profile"
            description="Understand the balance of flavors before your first bite."
        />

        <div class="mt-14 rounded-[32px] bg-white p-8 shadow-sm ring-1 ring-border/10">

            <div class="space-y-10">

                <x-ui.progress-meter
                    label="Spiciness"
                    :value="get_field('spiciness')"
                    :max="100"
                    icon="flame"
                    description="Overall spice intensity."
                />

                <x-ui.progress-meter
                    label="Sweetness"
                    :value="get_field('sweetness')"
                    :max="100"
                    icon="cookie"
                    description="Natural sweetness in the recipe."
                />

                <x-ui.progress-meter
                    label="Sourness"
                    :value="get_field('sourness')"
                    :max="100"
                    icon="citrus"
                    description="Tanginess and acidity."
                />

                <x-ui.progress-meter
                    label="Saltiness"
                    :value="get_field('saltiness')"
                    :max="100"
                    icon="beaker"
                    description="Overall salt perception."
                />

                <x-ui.progress-meter
                    label="Umami"
                    :value="get_field('umami')"
                    :max="100"
                    icon="beef"
                    description="Deep savory richness."
                />

                <x-ui.progress-meter
                    label="Richness"
                    :value="get_field('richness')"
                    :max="100"
                    icon="droplets"
                    description="Body and mouthfeel."
                />

            </div>

        </div>

    </div>

</x-ui.section>

@endif