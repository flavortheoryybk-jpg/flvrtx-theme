@if (get_field('youtube_url'))

<section class="bg-white py-24 lg:py-32" id="video">

    <x-container>

        <div class="mx-auto max-w-6xl">

            <x-ui.section-heading
                eyebrow="Watch"
                title="Watch the Full Recipe"
                description="Prefer learning visually? Follow the complete recipe step by step with our detailed video guide." />

            <div class="mt-14 overflow-hidden rounded-[36px] border border-border bg-black shadow-[0_24px_48px_rgba(0,0,0,0.12)]">

                <div class="aspect-video">

                    {!! wp_oembed_get(get_field('youtube_url')) !!}

                </div>

            </div>

            <div class="mt-8 flex flex-wrap items-center justify-between gap-6 rounded-[28px] border border-border bg-background p-6">

                <div>

                    <h3 class="text-xl font-bold">

                        Watch on YouTube

                    </h3>

                    <p class="mt-2 text-text-muted">

                        Like, comment and subscribe for more premium recipes and food science content.

                    </p>

                </div>

                <x-ui.button
                    href="{{ get_field('youtube_url') }}"
                    target="_blank"
                    rel="noopener noreferrer">

                    Open on YouTube →

                </x-ui.button>

            </div>

        </div>

    </x-container>

</section>

@endif