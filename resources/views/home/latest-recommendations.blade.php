@php

$recommendations = new WP_Query([
    'post_type'      => 'recommendation',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
]);

@endphp

@if($recommendations->have_posts())

<x-ui.section class="bg-background">

    <x-container>

        {{-- Section Header --}}
        <x-ui.section-heading
            eyebrow="Recommendations"
            title="Products We Trust"
            description="Discover carefully selected ingredients, cookware, and kitchen tools that have been personally tested and genuinely recommended by FLVRTX."
        />

        {{-- Recommendation Grid --}}
        <div class="mt-16 grid gap-8 md:grid-cols-2 xl:grid-cols-3">

            @while($recommendations->have_posts())

                @php($recommendations->the_post())

                @include('recommendation.card')

            @endwhile

            @php(wp_reset_postdata())

        </div>

        {{-- CTA --}}
        <div class="mt-16 flex justify-center">

            <x-ui.button
                href="{{ get_post_type_archive_link('recommendation') }}"
                variant="secondary">

                View All Recommendations

                <i
                    data-lucide="arrow-right"
                    class="h-5 w-5">
                </i>

            </x-ui.button>

        </div>

    </x-container>

</x-ui.section>

@endif