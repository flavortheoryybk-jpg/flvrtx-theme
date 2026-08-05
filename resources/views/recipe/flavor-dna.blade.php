@if(
    get_field('spice_level') ||
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

<div class="mt-14 space-y-10">

<x-ui.progress-meter
label="Heat"
:value="get_field('spice_level')"
icon="flame"
description="The overall spice intensity."
/>

<x-ui.progress-meter
label="Sweetness"
:value="get_field('sweetness')"
icon="cookie"
description="Natural sweetness in the recipe."
/>

<x-ui.progress-meter
label="Sourness"
:value="get_field('sourness')"
icon="citrus"
description="Acidity and brightness."
/>

<x-ui.progress-meter
label="Saltiness"
:value="get_field('saltiness')"
icon="beaker"
description="Overall salt perception."
/>

<x-ui.progress-meter
label="Umami"
:value="get_field('umami')"
icon="beef"
description="Deep savory richness."
/>

<x-ui.progress-meter
label="Richness"
:value="get_field('richness')"
icon="droplets"
description="Oiliness and mouthfeel."
/>

</div>

</div>

</x-ui.section>

@endif