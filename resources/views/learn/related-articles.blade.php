@php

$related = new WP_Query([
    'post_type'      => 'learn',
    'posts_per_page' => 3,
    'post__not_in'   => [get_the_ID()],
    'orderby'        => 'date',
]);

@endphp

@if($related->have_posts())

<x-ui.section>

    <x-ui.section-header
        badge="Keep Learning"
        title="Related Articles"
        description="Continue exploring food science and cooking knowledge." />

    <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">

        @while($related->have_posts())

            @php($related->the_post())

            @include('learn.card')

        @endwhile

    </div>

    @php(wp_reset_postdata())

</x-ui.section>

@endif