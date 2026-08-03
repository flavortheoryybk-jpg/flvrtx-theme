<section class="py-20 bg-background">

    <x-container>

        <div class="mx-auto max-w-5xl">

            @if(get_field('youtube_url'))

                <div class="aspect-video overflow-hidden rounded-3xl shadow-xl">

                    <iframe
                        class="h-full w-full"
                        src="{{ str_replace('watch?v=', 'embed/', get_field('youtube_url')) }}"
                        title="{{ get_the_title() }}"
                        frameborder="0"
                        allowfullscreen>

                    </iframe>

                </div>

            @endif

            <div class="prose prose-lg mt-12 max-w-none">

                {!! the_content() !!}

            </div>

        </div>

    </x-container>

</section>