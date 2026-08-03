@extends('layouts.app')

@section('content')

<section class="bg-background py-24">

    <x-container>

        <div class="mx-auto max-w-3xl text-center">

            <span class="text-sm font-semibold uppercase tracking-widest text-primary">
                Recipes
            </span>

            <h1 class="mt-4 text-6xl font-bold">
                Discover Recipes
            </h1>

            <p class="mt-6 text-xl leading-8 text-text-muted">
                Explore recipes backed by food science, practical cooking techniques and premium visuals.
            </p>

        </div>

    </x-container>

</section>

<section class="pb-24">

    <x-container>

        <div class="mb-10 flex items-center justify-between">

            <p class="text-text-muted">

                {{ $wp_query->found_posts }} Recipes

                <form
                    action="{{ home_url('/recipes') }}"
                    method="GET"
                    class="mt-8">

                    <input
                        type="search"
                        name="s"
                        placeholder="Search recipes..."
                        value="{{ get_search_query() }}"
                        class="w-full rounded-2xl border border-border bg-white px-6 py-4 text-lg outline-none transition focus:border-primary">

                </form>

            </p>

        </div>

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

            @if(have_posts())

                @while(have_posts())

                @php(the_post())

                @include('recipe.card')

                @endwhile

              @else
              
                  <div class="rounded-3xl border border-border bg-background p-16 text-center">
              
                      <h2 class="text-3xl font-bold">
                          No recipes found
                      </h2>
              
                      <p class="mt-4 text-text-muted">
                          Try another search.
                      </p>
              
                  </div>

              @if ($wp_query->max_num_pages > 1)

              <div class="mt-16">
              
                  {!! paginate_links([
                      'prev_text' => '← Previous',
                      'next_text' => 'Next →',
                  ]) !!}
              
              </div>
              
              @endif


        </div>

    </x-container>

</section>

@endsection