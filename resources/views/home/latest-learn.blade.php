@php

$learn = new WP_Query([
    'post_type'      => 'learn',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
]);

@endphp

@if($learn->have_posts())

<x-ui.section class="bg-white">

    <x-container>

        {{-- Section Header --}}
        <x-ui.section-heading
            eyebrow="Learn"
            title="Food Science & Learning"
            description="Go beyond recipes and discover the science, techniques, and practical knowledge that make every dish successful."
        />

        {{-- Articles Grid --}}
        <div class="mt-16 grid gap-8 md:grid-cols-2 xl:grid-cols-3">

            @while($learn->have_posts())

                @php($learn->the_post())

                @include('learn.card')

            @endwhile

            @php(wp_reset_postdata())

        </div>

        {{-- CTA --}}
        <div class="mt-16 flex justify-center">

            <x-ui.button
                href="{{ get_post_type_archive_link('learn') }}"
                variant="secondary">

                View All Articles

                <i
                    data-lucide="arrow-right"
                    class="h-5 w-5">
                </i>

            </x-ui.button>

        </div>

    </x-container>

</x-ui.section>

@endif