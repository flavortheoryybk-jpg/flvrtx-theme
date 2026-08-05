<section class="pb-12">

    <x-container>

        <div class="mx-auto max-w-2xl">

            <form
                role="search"
                method="get"
                action="{{ home_url('/') }}"
                class="flex gap-4">

                <div class="relative flex-1">

                    <i
                        data-lucide="search"
                        class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-text-muted">
                    </i>

                    <input
                        type="search"
                        name="s"
                        value="{{ get_search_query() }}"
                        placeholder="Search recipes, articles, videos..."
                        class="w-full rounded-xl border border-border bg-white py-4 pl-12 pr-4 text-lg outline-none transition focus:border-primary">

                </div>

                <button
                    type="submit"
                    class="rounded-xl bg-primary px-8 py-4 font-semibold text-white transition hover:bg-primary-dark">

                    Search

                </button>

            </form>

        </div>

    </x-container>

</section>