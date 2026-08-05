@if(
get_field('tenderness') ||
get_field('juiciness') ||
get_field('creaminess') ||
get_field('crispiness') ||
get_field('crunchiness')
)

<x-ui.section>

<div class="mx-auto max-w-5xl">

<x-ui.section-heading
eyebrow="Texture"
title="Texture Profile"
description="Know exactly what texture to expect."
/>

<div class="mt-14 space-y-10">

<x-ui.progress-meter
label="Tenderness"
:value="get_field('tenderness')"
icon="chef-hat"
/>

<x-ui.progress-meter
label="Juiciness"
:value="get_field('juiciness')"
icon="droplets"
/>

<x-ui.progress-meter
label="Creaminess"
:value="get_field('creaminess')"
icon="milk"
/>

<x-ui.progress-meter
label="Crispiness"
:value="get_field('crispiness')"
icon="sparkles"
/>

<x-ui.progress-meter
label="Crunchiness"
:value="get_field('crunchiness')"
icon="cookie"
/>

</div>

</div>

</x-ui.section>

@endif