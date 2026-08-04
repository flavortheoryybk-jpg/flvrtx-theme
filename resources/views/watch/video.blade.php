@if(get_field('youtube_url'))

<x-ui.section>

    <div class="mx-auto max-w-5xl">

        <div class="aspect-video overflow-hidden rounded-[32px] shadow-2xl">

            {!! wp_oembed_get(get_field('youtube_url')) !!}

        </div>

    </div>

</x-ui.section>

@endif