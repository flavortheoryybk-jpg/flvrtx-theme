<section class="py-24 bg-background">

    <x-container>

        <div class="mb-12">

            <span class="text-sm font-semibold uppercase tracking-widest text-primary">
                Watch on YouTube →
            </span>

            <h2 class="mt-3 text-4xl font-bold">
                You May Also Like
            </h2>

        </div>

        @php

            $related = new WP_Query([
                'post_type' => 'Watch',
                'posts_per_page' => 3,
                'post__not_in' => [get_the_ID()],
                'orderby' => 'rand',
            ]);

        @endphp

        @if($related->have_posts())

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

                @while($related->have_posts())

                    @php($related->the_post())

                    @include('watch.card')

                @endwhile

            </div>

            @php(wp_reset_postdata())

        @endif

    </x-container>

</section>