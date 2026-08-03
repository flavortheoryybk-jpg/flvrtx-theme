@if(get_field('youtube_url'))

<section class="py-24 bg-white">

    <x-container>

        <div class="mb-10">

            <span class="text-sm font-semibold uppercase tracking-widest text-primary">
                Watch
            </span>

            <h2 class="mt-3 text-4xl font-bold">
                Watch the Full Recipe
            </h2>

        </div>

        <div class="overflow-hidden rounded-3xl shadow-lg">

            {!! wp_oembed_get(get_field('youtube_url')) !!}

        </div>

    </x-container>

</section>

@endif