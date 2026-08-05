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

        <div class="mt-12 space-y-8 rounded-[32px] bg-white p-8 shadow-sm ring-1 ring-border/10">
        
            <x-ui.progress-meter
                label="Protein"
                :value="get_field('protein')"
                max="100"
                icon="beef"
            />
        
            <x-ui.progress-meter
                label="Fat"
                :value="get_field('fat')"
                max="100"
                icon="droplets"
            />
        
            <x-ui.progress-meter
                label="Carbohydrates"
                :value="get_field('carbohydrates')"
                max="100"
                icon="wheat"
            />
        
            <x-ui.progress-meter
                label="Fiber"
                :value="get_field('fiber')"
                max="100"
                icon="leaf"
            />
        
        </div>

    </div>

</x-ui.section>

@endif