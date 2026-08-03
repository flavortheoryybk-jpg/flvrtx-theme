@extends('layouts.app')

@section('content')

<section class="py-24 bg-background">

    <x-container>

        <x-ui.section-heading
            eyebrow="Search"
            title="Search Results"
            description="Search recipes, food science articles and wellness content." />

        <form
            action="{{ home_url('/') }}"
            method="get"
            class="mt-10 max-w-xl">

            <x-ui.input
                type="search"
                name="s"
                value="{{ get_search_query() }}"
                placeholder="Search FLVRTX..." />

        </form>

        @if(have_posts())

            <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3">

                @while(have_posts())

                    @php(the_post())

                    @if(get_post_type() === 'recipe')

                        @include('recipe.card')

                    @elseif(get_post_type() === 'learn')

                        @include('learn.card')

                    @else

                        @include('partials.content-search')

                    @endif

                @endwhile

            </div>

            <div class="mt-16">

                {!! get_the_posts_navigation() !!}

            </div>

        @else

            <div class="mt-16">

                <x-ui.empty-state
                    title="No results found"
                    description="Try searching with another keyword." />

            </div>

        @endif

    </x-container>

</section>

@endsection