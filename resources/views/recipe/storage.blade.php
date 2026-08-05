@if(get_field('storage_tips'))

@php
$storage = collect(
    preg_split('/\r\n|\r|\n/', get_field('storage_tips') ?? '')
)->filter();
@endphp

<x-ui.section>

    <div class="mx-auto max-w-5xl">

        <x-ui.section-heading
            eyebrow="Storage"
            title="Storage & Reheating"
            description="Keep your recipe fresh for later."
        />

        <x-ui.feature-list
            :items="$storage"
            icon="package"
        />

    </div>

</x-ui.section>

@endif