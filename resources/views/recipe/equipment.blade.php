@if (get_field('equipment'))

<section class="bg-background py-20 lg:py-24" id="equipment">

    <x-container>

        <div class="mx-auto max-w-4xl">

            <x-ui.section-heading
                eyebrow="Equipment"
                title="What You'll Need"
                description="Gather these kitchen tools before you begin for a smoother cooking experience." />

            @php
                $equipment = collect(
                    preg_split('/\r\n|\r|\n/', get_field('equipment') ?? '')
                )->filter();
            @endphp

            <div class="mt-12 overflow-hidden rounded-[32px] border border-border bg-white shadow-[0_20px_40px_rgba(0,0,0,0.06)]">

                <ul class="divide-y divide-border">

                    @foreach ($equipment as $item)

                        <li class="flex items-center gap-5 p-6 transition-colors duration-300 hover:bg-primary/5">

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-primary/10">

                                <i data-lucide="chef-hat" class="h-5 w-5 text-primary"></i>

                            </div>

                            <span class="text-lg font-medium text-text">

                                {{ trim($item) }}

                            </span>

                        </li>

                    @endforeach

                </ul>

            </div>

        </div>

    </x-container>

</section>

@endif