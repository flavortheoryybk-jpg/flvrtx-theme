@if (get_field('storage_tips'))

<section class="bg-white py-20 lg:py-24" id="storage">

    <x-container>

        <div class="mx-auto max-w-4xl">

            <x-ui.section-heading
                eyebrow="Storage"
                title="Storage & Reheating"
                description="Store leftovers properly to preserve freshness, flavor, and texture." />

            @php
                $storageTips = collect(
                    preg_split('/\r\n|\r|\n/', get_field('storage_tips') ?? '')
                )->filter();
            @endphp

            <div class="mt-12 overflow-hidden rounded-[32px] border border-border bg-white shadow-[0_20px_40px_rgba(0,0,0,0.06)]">

                <ul class="divide-y divide-border">

                    @foreach ($storageTips as $tip)

                        <li class="flex items-start gap-5 p-6 transition-colors duration-300 hover:bg-primary/5">

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-primary/10">

                                <i data-lucide="refrigerator" class="h-5 w-5 text-primary"></i>

                            </div>

                            <div>

                                <h3 class="font-semibold text-text">

                                    Storage Tip

                                </h3>

                                <p class="mt-2 leading-8 text-text-muted">

                                    {{ trim($tip) }}

                                </p>

                            </div>

                        </li>

                    @endforeach

                </ul>

            </div>

        </div>

    </x-container>

</section>

@endif