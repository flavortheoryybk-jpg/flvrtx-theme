@php
$ingredients = collect(
    preg_split('/\r\n|\r|\n/', get_field('ingredients') ?? '')
)->filter();
@endphp

<x-ui.section>

    <div class="mx-auto max-w-5xl">

        <x-ui.section-heading
            eyebrow="Ingredients"
            title="Everything You'll Need"
            description="Prepare all ingredients before you start cooking."
        />

        <x-ui.feature-list
            :items="$ingredients"
            icon="check"
        />

    </div>

</x-ui.section>