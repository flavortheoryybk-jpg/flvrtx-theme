@if(get_field('youtube_url'))

<x-ui.section
    id="video"
    class="bg-white">

    <div class="mx-auto max-w-6xl">

        {{-- Section Heading --}}
        <x-ui.section-heading
            eyebrow="Watch"
            title="Watch the Recipe"
            description="Follow the complete recipe step by step with our detailed video guide and cook alongside us."
        />

        {{-- Video --}}
        <div class="mt-16 overflow-hidden rounded-[40px] border border-border bg-black shadow-xl">

            <div class="aspect-video">

                {!! wp_oembed_get(get_field('youtube_url')) !!}

            </div>

        </div>

        {{-- CTA Card --}}
        <x-ui.card class="mt-10">

            <div class="flex flex-col gap-8 lg:flex-row lg:items-center lg:justify-between">

                <div>

                    <div class="flex items-center gap-3">

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-red-100">

                            <i
                                data-lucide="play"
                                class="h-6 w-6 text-red-600">
                            </i>

                        </div>

                        <div>

                            <h3 class="text-2xl font-bold">

                                Watch on YouTube

                            </h3>

                            <p class="mt-1 text-text-muted">

                                Enjoy the full recipe, cooking techniques, and future FLVRTX videos.

                            </p>

                        </div>

                    </div>

                </div>

                <x-ui.button
                    href="{{ get_field('youtube_url') }}"
                    target="_blank"
                    rel="noopener noreferrer">

                    Watch on YouTube

                    <i
                        data-lucide="arrow-up-right"
                        class="h-5 w-5">
                    </i>

                </x-ui.button>

            </div>

        </x-ui.card>

    </div>

</x-ui.section>

@endif