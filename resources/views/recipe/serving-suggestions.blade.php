@if(get_field('serving_suggestions'))

<x-ui.section>

    <div class="mx-auto max-w-5xl">

        <x-ui.section-heading
            eyebrow="Serving Ideas"
            title="Best Ways to Enjoy This Recipe"
            description="Pair this recipe with the right dishes to elevate the overall dining experience." />

        @php
            $items = collect(
                preg_split('/\r\n|\r|\n/', get_field('serving_suggestions') ?? '')
            )->filter();
        @endphp

        <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">

            @foreach($items as $item)

                <div class="rounded-3xl border border-border bg-white p-8 text-center shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-primary/10">

                        <i data-lucide="utensils-crossed" class="h-8 w-8 text-primary"></i>

                    </div>

                    <h3 class="mt-6 text-xl font-semibold">

                        {{ $item }}

                    </h3>

                </div>

            @endforeach

        </div>

    </div>

</x-ui.section>

@endif