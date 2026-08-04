@extends('layouts.app')

@section('content')

{{-- Hero --}}
<section class="bg-background py-24">

    <x-container>

        <div class="mx-auto max-w-4xl text-center">

            <x-ui.badge>
                FLVRTX Learn
            </x-ui.badge>

            <h1 class="mt-6 text-6xl font-bold">
                Learn Food Science
            </h1>

            <p class="mt-6 text-xl leading-8 text-text-muted">
                Understand why ingredients behave the way they do and become a better cook through food science.
            </p>

        </div>

    </x-container>

</section>

{{-- Featured Article --}}
@php

$featured = new WP_Query([
    'post_type' => 'learn',
    'posts_per_page' => 1,
    'meta_key' => 'featured_learn',
    'meta_value' => 1,
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

    <x-ui.section-header
        badge="Latest"
        title="Latest Learn Articles"
        description="Explore cooking techniques, food science and practical kitchen knowledge." />

    @if(have_posts())

        <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">

            @while(have_posts())

                @php(the_post())

                @include('learn.card')

            @endwhile

        </div>

        @if($GLOBALS['wp_query']->max_num_pages > 1)

            <div class="mt-20 flex justify-center">

                {!! paginate_links([
                    'mid_size' => 2,
                    'prev_text' => '← Previous',
                    'next_text' => 'Next →',
                ]) !!}

            </div>

        @endif

    @else

        <div class="rounded-3xl border border-border bg-white py-20 text-center">

            <h2 class="text-3xl font-bold">
                No articles found
            </h2>

            <p class="mt-4 text-text-muted">
                New food science articles are coming soon.
            </p>

        </div>

    @endif

</x-ui.section>

@endsection