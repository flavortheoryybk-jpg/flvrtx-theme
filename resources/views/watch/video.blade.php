@if(get_field('youtube_url'))

<x-ui.section class="py-8 lg:py-10">

    <div class="mx-auto max-w-6xl">

        <div
            class="aspect-video overflow-hidden rounded-[32px] bg-black shadow-2xl
                   [&>iframe]:block
                   [&>iframe]:h-full
                   [&>iframe]:w-full
                   [&>iframe]:border-0">

            {!! wp_oembed_get(get_field('youtube_url')) !!}

        </div>

    </div>

</x-ui.section>

@endif