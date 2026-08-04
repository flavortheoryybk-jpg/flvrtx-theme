@if(get_field('storage_tips'))

<section class="py-20">

    <x-container>

        <div class="mx-auto max-w-5xl">

            <x-ui.section-header
              badge="Storage"
              title="Storage & Reheating"
              description="Keep your recipe fresh and flavorful for later." />

            <div class="mt-10 rounded-3xl border border-border bg-white p-8">

                <ul class="space-y-5">

                    @foreach(explode("\n", trim(get_field('storage_tips'))) as $tip)

                        @if(trim($tip))

                            <li class="flex items-start gap-4">

                                <div class="mt-1 flex h-8 w-8 items-center justify-center rounded-full bg-primary/10">

                                    <i data-lucide="refrigerator" class="h-4 w-4 text-primary"></i>

                                </div>

                                <span class="text-lg leading-8">
                                    {{ trim($tip) }}
                                </span>

                            </li>

                        @endif

                    @endforeach

                </ul>

            </div>

        </div>

    </x-container>

</section>

@endif