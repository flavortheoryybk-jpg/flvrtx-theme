@if (get_field('key_takeaways'))

<section class="bg-white py-24 lg:py-24" id="key-takeaways">

    <x-container>

        <div class="mx-auto max-w-5xl">

            <x-ui.section-heading
                eyebrow="Key Takeaways"
                title="What You Should Remember"
                description="The most important lessons and practical insights from this article." />

            @php
                $takeaways = collect(
                    preg_split('/\r\n|\r|\n/', get_field('key_takeaways') ?? '')
                )->filter();
            @endphp

            <div class="mt-12 grid gap-6 md:grid-cols-2">

                @foreach ($takeaways as $item)

                    <x-ui.card class="h-full">

                        <div class="flex items-start gap-5">

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-primary text-white shadow-sm">

                                <i data-lucide="check" class="h-5 w-5"></i>

                            </div>

                            <div>

                                <h3 class="font-semibold text-text">

                                    Key Insight

                                </h3>

                                <p class="mt-2 leading-8 text-text-muted">

                                    {{ trim($item) }}

                                </p>

                            </div>

                        </div>

                    </x-ui.card>

                @endforeach

            </div>

        </div>

    </x-container>

</section>

@endif