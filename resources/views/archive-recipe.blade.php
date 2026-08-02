@extends('layouts.app')

@section('content')

<section class="bg-background py-20">
    <x-container>

        <div class="max-w-3xl">

            <p class="font-semibold uppercase tracking-widest text-primary">
                FLVRTX
            </p>

            <h1 class="mt-3 text-5xl font-bold">
                Recipes
            </h1>

            <p class="mt-6 text-lg text-text-muted">
                Discover recipes crafted with precision, flavor and science.
            </p>

        </div>

    </x-container>
</section>

<section class="pb-24">

    <x-container>

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

            @if(have_posts())

                @while(have_posts())

                    @php(the_post())

                    @include('partials.recipe-card')

                @endwhile

            @else

                <p>No recipes found.</p>

            @endif

        </div>

    </x-container>

</section>

@endsection