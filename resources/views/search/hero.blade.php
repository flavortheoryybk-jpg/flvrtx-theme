<section class="bg-background py-20 lg:py-28">

    <x-container>

        <div class="mx-auto max-w-4xl text-center">

            <x-ui.badge>

                Search

            </x-ui.badge>

            <h1 class="mt-8 text-5xl font-bold tracking-tight lg:text-6xl">

                Search Results

            </h1>

            @if(get_search_query())

                <p class="mx-auto mt-8 max-w-2xl text-xl leading-8 text-text-muted">

                    Showing results for

                    <span class="font-semibold text-text">

                        "{{ get_search_query() }}"

                    </span>

                </p>

            @endif

            <div class="mt-10 flex justify-center">

                <x-ui.badge class="bg-white">

                    {{ number_format($wp_query->found_posts ?? 0) }}
                    {{ Str::plural('Result', $wp_query->found_posts ?? 0) }}

                </x-ui.badge>

            </div>

        </div>

    </x-container>

</section>