@extends('layouts.app')

@section('content')

<section class="bg-background py-24 lg:py-32">

    <x-container>

        <div class="mx-auto max-w-4xl text-center">

            <x-ui.badge>

                Recommendations

            </x-ui.badge>

            <h1 class="mt-8 text-6xl lg:text-7xl font-bold tracking-tight lg:text-6xl">

                Trusted Recommendations

            </h1>

            <p class="mx-auto mt-8 max-w-3xl text-xl leading-8 text-text-muted">

                Discover carefully selected ingredients, kitchen tools, cookware, and products that I genuinely recommend to help you cook better.

            </p>

            <div class="mt-10 flex justify-center">

                <x-ui.badge class="bg-white">

                    {{ number_format($GLOBALS['wp_query']->found_posts) }}
                    {{ Str::plural('Recommendation', $GLOBALS['wp_query']->found_posts) }}

                </x-ui.badge>

            </div>

        </div>

    </x-container>

</section>

<section class="pb-24 lg:pb-32">

    <x-container>

        {{-- Search --}}
        <div class="mx-auto mb-14 max-w-3xl">

            <form
                action="{{ home_url('/recommendations') }}"
                method="GET"
                class="flex flex-col gap-4 rounded-[28px] border border-border bg-white p-4 shadow-[0_20px_40px_rgba(0,0,0,0.06)] sm:flex-row">

                <div class="relative flex-1">

                    <i
                        data-lucide="search"
                        class="absolute left-5 top-1/2 h-5 w-5 -translate-y-1/2 text-text-muted">
                    </i>

                    <input
                        type="search"
                        name="s"
                        value="{{ get_search_query() }}"
                        placeholder="Search recommendations..."
                        class="w-full border-0 bg-transparent py-4 pl-12 pr-4 outline-none">

                    <input
                        type="hidden"
                        name="post_type"
                        value="recommendation">

                </div>

                <x-ui.button
                    type="submit"
                    size="lg">

                    Search

                </x-ui.button>

            </form>

        </div>

        @if(have_posts())

            <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">

                @while(have_posts())

                    @php(the_post())

                    @include('recommendation.card')

                @endwhile

            </div>

            @if($GLOBALS['wp_query']->max_num_pages > 1)

                <div class="mt-20">

                    @include('search.pagination')

                </div>

            @endif

        @else

            <x-ui.empty-state
                title="No recommendations found"
                description="We're adding trusted recommendations regularly. Check back soon." />

        @endif

    </x-container>

</section>

@endsection