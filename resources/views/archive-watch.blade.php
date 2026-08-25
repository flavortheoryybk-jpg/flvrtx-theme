@extends('layouts.app')

@section('content')

<section class="bg-background py-24 lg:py-32">

    <x-container>

        <div class="mx-auto max-w-4xl text-center">

            <x-ui.badge>
                Watch
            </x-ui.badge>

            <h1 class="mt-8 text-6xl font-bold tracking-tight lg:text-7xl">

                Watch & Learn

            </h1>

            <p class="mx-auto mt-8 max-w-3xl text-xl leading-8 text-text-muted">

                Watch premium cooking videos, step-by-step recipes, kitchen techniques, and food science explained visually.

            </p>

            <div class="mt-10 flex justify-center">

                <x-ui.badge class="bg-white">

                    {{ number_format($GLOBALS['wp_query']->found_posts) }}

                    {{ Str::plural('Video', $GLOBALS['wp_query']->found_posts) }}

                </x-ui.badge>

            </div>

        </div>

    </x-container>

</section>


<section class="pb-24 lg:pb-32">

    <x-container>

        {{-- Watch Categories --}}
        <div class="mb-8 flex flex-wrap justify-center gap-3">
        
            @php
                $watch_categories = get_terms([
                    'taxonomy'   => 'watch_category',
                    'hide_empty' => true,
                ]);
        
                $current_category = request()->get('watch_category');
            @endphp
        
            <a
                href="{{ home_url('/watch/') }}"
                class="rounded-full border px-5 py-2.5 text-sm font-semibold transition-all duration-300
                    {{ empty($current_category)
                        ? 'border-primary bg-primary text-white'
                        : 'border-border bg-white hover:border-primary hover:text-primary' }}">
        
                All
        
            </a>
        
            @foreach($watch_categories as $category)
        
                <a
                    href="{{ add_query_arg('watch_category', $category->slug, home_url('/watch/')) }}"
                    class="rounded-full border px-5 py-2.5 text-sm font-semibold transition-all duration-300
                        {{ $current_category === $category->slug
                            ? 'border-primary bg-primary text-white'
                            : 'border-border bg-white hover:border-primary hover:text-primary' }}">
        
                    {{ $category->name }}
        
                </a>
        
            @endforeach
        
        </div>

        {{-- Search & Sorting --}}
        <div class="mx-auto mb-14 flex max-w-5xl flex-col gap-4 lg:flex-row lg:items-center">

            {{-- Search --}}
            <form
                action="{{ home_url('/watch') }}"
                method="GET"
                class="flex flex-1 flex-col gap-4 rounded-[28px] border border-border bg-white p-4 shadow-[0_20px_40px_rgba(0,0,0,0.06)] sm:flex-row">

                <div class="relative flex-1">

                    <i
                        data-lucide="search"
                        class="absolute left-5 top-1/2 h-5 w-5 -translate-y-1/2 text-text-muted">
                    </i>

                    <input
                        type="search"
                        name="s"
                        value="{{ get_search_query() }}"
                        placeholder="Search videos..."
                        class="w-full border-0 bg-transparent py-4 pl-12 pr-4 outline-none">

                    <input
                        type="hidden"
                        name="post_type"
                        value="watch">

                    <input
                        type="hidden"
                        name="sort"
                        value="{{ request()->get('sort', 'latest') }}">

                </div>

                <x-ui.button
                    type="submit"
                    size="lg">

                    Search

                </x-ui.button>

            </form>


            {{-- Sort --}}
            <form
                action="{{ home_url('/watch') }}"
                method="GET"
                class="flex items-center gap-3 rounded-[28px] border border-border bg-white p-4 shadow-sm">

                @if(request()->get('s'))

                    <input
                        type="hidden"
                        name="s"
                        value="{{ request()->get('s') }}">

                @endif

                <input
                    type="hidden"
                    name="post_type"
                    value="watch">

                <label
                    for="watch-sort"
                    class="whitespace-nowrap text-sm font-semibold text-text-muted">

                    Sort:

                </label>

                <select
                    id="watch-sort"
                    name="sort"
                    onchange="this.form.submit()"
                    class="cursor-pointer border-0 bg-transparent pr-8 font-semibold text-text outline-none focus:ring-0">

                    <option
                        value="latest"
                        @selected(request()->get('sort', 'latest') === 'latest')>

                        Latest

                    </option>

                    <option
                        value="oldest"
                        @selected(request()->get('sort') === 'oldest')>

                        Oldest

                    </option>

                </select>

            </form>

        </div>


        {{-- Videos --}}
        @if(have_posts())

            <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">

                @while(have_posts())

                    @php(the_post())

                    @include('watch.card')

                @endwhile

            </div>


            {{-- Pagination --}}
            @if($GLOBALS['wp_query']->max_num_pages > 1)

                <div class="mt-20">

                    @include('search.pagination')

                </div>

            @endif


        @else

            <x-ui.empty-state
                title="No videos found"
                description="New cooking videos and tutorials are coming soon." />

        @endif

    </x-container>

</section>

@endsection