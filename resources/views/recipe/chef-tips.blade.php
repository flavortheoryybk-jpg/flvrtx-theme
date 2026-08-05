@if (get_field('chef_tips'))

<section class="bg-background py-20 lg:py-24" id="chef-tips">

    <x-container>

        <div class="mx-auto max-w-4xl">

            <x-ui.section-heading
                eyebrow="Chef Tips"
                title="Tips for the Best Results"
                description="Small techniques that make a big difference in flavor, texture, and consistency." />

            @php
                $tips = collect(
                    preg_split('/\r\n|\r|\n/', get_field('chef_tips') ?? '')
                )->filter();
            @endphp

            <div class="mt-12 overflow-hidden rounded-[32px] border border-primary/15 bg-gradient-to-br from-primary/5 to-white shadow-[0_20px_40px_rgba(0,0,0,0.06)]">

                <ul class="divide-y divide-primary/10">

                    @foreach ($tips as $tip)

                        <li class="flex items-start gap-5 p-6 transition-colors duration-300 hover:bg-primary/5">

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-primary text-white">

                                <i data-lucide="lightbulb" class="h-5 w-5"></i>

                            </div>

                            <div>

                                <h3 class="font-semibold text-text">

                                    FLVRTX Pro Tip

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