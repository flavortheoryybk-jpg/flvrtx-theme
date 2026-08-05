<section class="bg-background py-20 lg:py-24">

    <x-container>

        <div class="mx-auto max-w-3xl text-center">

            <x-ui.badge>
                Search
            </x-ui.badge>

            <h1 class="mt-6 text-4xl font-bold tracking-tight lg:text-5xl">
                Search Results
            </h1>

            <p class="mt-6 text-lg text-text-muted">

                Showing results for

                <span class="font-semibold text-text">

                    "{{ get_search_query() }}"

                </span>

            </p>

            <p class="mt-4 text-sm text-text-muted">

                {{ $wp_query->found_posts ?? 0 }}
                {{ Str::plural('result', $wp_query->found_posts ?? 0) }}
                found

            </p>

        </div>

    </x-container>

</section>