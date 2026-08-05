@if(get_the_content())

<x-ui.section>

<x-ui.section-heading
eyebrow="Complete Guide"
title="Everything You Need To Know"
description="Learn the story, science and techniques behind this recipe." />

<div class="prose prose-lg max-w-none">

{!! the_content() !!}

</div>

</x-ui.section>

@endif