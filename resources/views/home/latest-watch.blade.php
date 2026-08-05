@php

$watch = new WP_Query([
    'post_type'      => 'watch',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
]);

@endphp

@if($watch->have_posts())

<x-ui.section class="bg-white">

    <x-container>

        {{-- Section Header --}}
        <x-ui.section-heading
            eyebrow="Watch"
            title="Watch & Learn"
            description="Step-by-step cooking videos, techniques, and visual guides to help you cook with confidence."
        />

        {{-- Video Grid --}}
        <div class="mt-16 grid gap-8 md:grid-cols-2 xl:grid-cols-3">

            @while($watch->have_posts())

                @php($watch->the_post())

                @include('watch.card')

            @endwhile

            @php(wp_reset_postdata())

        </div>

        {{-- CTA --}}
        <div class="mt-16 flex justify-center">

            <x-ui.button
                href="{{ get_post_type_archive_link('watch') }}"
                variant="secondary">

                View All Videos

                <i
                    data-lucide="arrow-right"
                    class="h-5 w-5">
                </i>

            </x-ui.button>

        </div>

    </x-container>

</x-ui.section>

@endif