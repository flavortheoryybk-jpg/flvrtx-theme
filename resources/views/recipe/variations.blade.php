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
        
                <div class="rounded-[28px] bg-white p-8 shadow-sm ring-1 ring-border/10 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
        
                    <div class="flex items-start gap-5">
        
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-primary/10">
        
                            <i
                                data-lucide="shuffle"
                                class="h-6 w-6 text-primary">
                            </i>
        
                        </div>
        
                        <div>
        
                            <h3 class="text-lg font-semibold">
        
                                {{ $item }}
        
                            </h3>
        
                        </div>
        
                    </div>
        
                </div>
        
            @endforeach
        
        </div>

    </div>

</x-ui.section>

@endif