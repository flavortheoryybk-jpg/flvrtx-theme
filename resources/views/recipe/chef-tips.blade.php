@if(get_field('chef_tips'))

@php
$tips = collect(
    preg_split('/\r\n|\r|\n/', get_field('chef_tips') ?? '')
)->filter();
@endphp

<x-ui.section>

    <div class="mx-auto max-w-5xl">

        <x-ui.callout
            title="Chef Tips"
            icon="lightbulb"
        >

            <x-ui.feature-list
                :items="$tips"
                icon="check"
            />

        </x-ui.callout>

    </div>

</x-ui.section>

@endif