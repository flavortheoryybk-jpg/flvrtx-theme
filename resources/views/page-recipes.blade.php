@extends('layouts.app')

@section('content')

<section class="py-20 bg-background">

    <x-container>

        <div class="max-w-3xl">

            <p class="font-semibold uppercase tracking-wider text-primary">
                FLVRTX
            </p>

            <h1 class="mt-3 text-5xl font-bold">
                Recipes
            </h1>

            <p class="mt-6 text-lg text-text-muted">
                Discover recipes crafted with flavor, science and precision.
            </p>

        </div>

    </x-container>

</section>

<section class="pb-24">

    <x-container>

        @php

            $recipes = new WP_Query([
                'post_type' => 'post',
                'posts_per_page' => 12,
                'paged' => get_query_var('paged') ?: 1,
            ]);

        @endphp

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

            @while($recipes->have_posts())

                @php($recipes->the_post())

                @include('partials.recipe-card')

            @endwhile

            @php(wp_reset_postdata())

        </div>

    </x-container>

</section>

@endsection