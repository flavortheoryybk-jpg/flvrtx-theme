@if(get_field('equipment'))

@php
$equipment = collect(
    preg_split('/\r\n|\r|\n/', get_field('equipment') ?? '')
)->filter();
@endphp

<x-ui.section>

    <div class="mx-auto max-w-5xl">

        <x-ui.section-heading
            eyebrow="Equipment"
            title="What You'll Need"
            description="Gather these tools before you begin cooking."
        />

        <x-ui.feature-list
            :items="$equipment"
            icon="chef-hat"
        />

    </div>

</x-ui.section>

@endif