@if(get_field('variations'))

<x-ui.section>

    <div class="mx-auto max-w-5xl">

        <x-ui.section-heading
            eyebrow="Variations"
            title="Try Different Versions"
            description="Customize this recipe to suit your taste and cooking style." />

        @php
            $items = collect(
                preg_split('/\r\n|\r|\n/', get_field('variations') ?? '')
            )->filter();
        @endphp

        <div class="mt-12 grid gap-6 lg:grid-cols-2">

            @foreach($items as $item)

                <x-ui.card>

                    <div class="flex gap-5">

                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-primary text-white">

                            <i data-lucide="shuffle"></i>

                        </div>

                        <p class="text-lg leading-8">

                            {{ $item }}

                        </p>

                    </div>

                </x-ui.card>

            @endforeach

        </div>

    </div>

</x-ui.section>

@endif