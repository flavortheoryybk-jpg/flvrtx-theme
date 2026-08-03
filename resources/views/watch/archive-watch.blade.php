@extends('layouts.app')

@section('content')

<section class="bg-background py-24">

    <x-container>

        <div class="mx-auto max-w-3xl text-center">

            <span class="text-sm font-semibold uppercase tracking-widest text-primary">
                Watch
            </span>

            <h1 class="mt-4 text-6xl font-bold">
                Watch & Learn
            </h1>

            <p class="mt-6 text-xl leading-8 text-text-muted">
                Watch premium cooking videos, techniques and food education from FLVRTX.
            </p>

        </div>

    </x-container>

</section>

<section class="pb-24">

    <x-container>

        <div class="mb-12 flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">

            <p class="text-lg text-text-muted">
                {{ $GLOBALS['wp_query']->found_posts }} Learn
            </p>

            <form
                action="{{ home_url('/Learn') }}"
                method="GET"
                class="w-full lg:w-96">

                <div class="relative">

                    <input
                        type="search"
                        name="s"
                        value="{{ get_search_query() }}"
                        placeholder="Search Learn..."
                        class="w-full rounded-2xl border border-border bg-white px-6 py-4 outline-none transition-all focus:border-primary">

                    <input
                        type="hidden"
                        name="post_type"
                        value="Learn">

                </div>

            </form>

        </div>

        {{-- Categories --}}

        <div class="mb-14 flex flex-wrap gap-3">

            <a href="{{ home_url('/Learn') }}"
               class="rounded-full bg-primary px-5 py-2 text-white">
                All
            </a>

            @foreach(get_terms([
                'taxonomy'=>'category',
                'hide_empty'=>true
            ]) as $category)

                <a
                    href="{{ get_term_link($category) }}"
                    class="rounded-full border border-border bg-white px-5 py-2 transition hover:border-primary hover:text-primary">

                    {{ $category->name }}

                </a>

            @endforeach

        </div>

        @if(have_posts())

            <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">

                @while(have_posts())

                    @php(the_post())

                    @include('watch.card')

                @endwhile

            </div>

        @else

            <div class="rounded-3xl border border-border bg-white py-24 text-center">

                <h2 class="text-3xl font-bold">

                    No recipes found

                </h2>

                <p class="mt-4 text-text-muted">

                    Try another search.

                </p>

            </div>

        @endif

        @if($GLOBALS['wp_query']->max_num_pages > 1)

            <div class="mt-20 flex justify-center">

                {!! paginate_links([
                    'mid_size'=>2,
                    'prev_text'=>'← Previous',
                    'next_text'=>'Next →'
                ]) !!}

            </div>

        @endif

    </x-container>

</section>

@endsection