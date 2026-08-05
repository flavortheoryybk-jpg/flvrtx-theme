@if(get_field('common_mistakes'))

<x-ui.section>

    <div class="mx-auto max-w-5xl">

        <x-ui.section-heading
            eyebrow="Avoid These Mistakes"
            title="Common Mistakes"
            description="Small mistakes can dramatically affect the final result. Avoid these to get the best flavor and texture every time." />

        @php
            $mistakes = collect(
                preg_split('/\r\n|\r|\n/', get_field('common_mistakes') ?? '')
            )->filter();
        @endphp

        <div class="mt-12 grid gap-6 lg:grid-cols-2">

            @foreach($mistakes as $mistake)
        
                <div class="rounded-[28px] bg-red-50 p-8 ring-1 ring-red-100 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
        
                    <div class="flex gap-5">
        
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-red-500 text-white">
        
                            <i data-lucide="triangle-alert" class="h-6 w-6"></i>
        
                        </div>
        
                        <div>
        
                            <h3 class="text-lg font-bold">
        
                                Avoid This
        
                            </h3>
        
                            <p class="mt-3 leading-8 text-text-muted">
        
                                {{ $mistake }}
        
                            </p>
        
                        </div>
        
                    </div>
        
                </div>
        
            @endforeach
        
        </div>

    </div>

</x-ui.section>

@endif