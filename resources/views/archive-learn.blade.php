@extends('layouts.app')

@section('content')

{{-- Hero --}}
<section class="bg-background py-24 lg:py-32">

    <x-container>

        <div class="mx-auto max-w-4xl text-center">

            <x-ui.badge>

                FLVRTX Learn

            </x-ui.badge>

            <h1 class="mt-8 text-5xl font-bold tracking-tight lg:text-6xl">

                Learn Food Science

            </h1>

            <p class="mx-auto mt-8 max-w-3xl text-xl leading-8 text-text-muted">

                Discover the science behind cooking, understand ingredients, and become a more confident cook through evidence-based knowledge.

            </p>

            <div class="mt-10 flex justify-center">

                <x-ui.badge class="bg-white">

                    {{ number_format($GLOBALS['wp_query']->found_posts) }}
                    {{ Str::plural('Article', $GLOBALS['wp_query']->found_posts) }}

                </x-ui.badge>

            </div>

        </div>

    </x-container>

</section>

{{-- Featured Article --}}
@php

$featured = new WP_Query([
    'post_type'      => 'learn',
    'posts_per_page' => 1,
    'post_status'    => 'publish',
    'meta_key'       => 'featured_learn',
    'meta_value'     => 1,
]);

@endphp

@if($featured->have_posts())

<section class="pb-16">

    <x-container>

        @while($featured->have_posts())

            @php($featured->the_post())

            @include('learn.featured-card')

        @endwhile

        @php(wp_reset_postdata())

    </x-container>

</section>

@endif

{{-- Latest Articles --}}
<x-ui.section>

    <x-ui.section-heading
        eyebrow="Latest"
        title="Latest Learn Articles"
        description="Explore cooking techniques, food science, kitchen knowledge, and practical culinary insights." />

    @if(have_posts())

        <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">

            @while(have_posts())

                @php(the_post())

                @include('learn.card')

            @endwhile

        </div>

        @if($GLOBALS['wp_query']->max_num_pages > 1)

            <div class="mt-20">

                @include('search.pagination')

            </div>

        @endif

    @else

        <x-ui.empty-state
            title="No articles found"
            description="We're publishing new food science articles soon. Check back later." />

    @endif

</x-ui.section>

@endsection