<section class="pb-16">

    <x-container>

        <div class="mx-auto max-w-3xl">

            <form
                role="search"
                method="get"
                action="{{ home_url('/') }}"
                class="flex flex-col gap-4 rounded-[32px] border border-border bg-white p-4 shadow-[0_20px_40px_rgba(0,0,0,0.06)] sm:flex-row sm:items-center">

                <div class="relative flex-1">

                    <i
                        data-lucide="search"
                        class="absolute left-5 top-1/2 h-5 w-5 -translate-y-1/2 text-text-muted">
                    </i>

                    <x-ui.input
                        type="search"
                        name="s"
                        value="{{ get_search_query() }}"
                        placeholder="Search recipes, articles, videos, recommendations..."
                        class="border-0 bg-transparent py-4 pl-12 pr-4 shadow-none focus:ring-0" />

                </div>

                <x-ui.button
                    type="submit"
                    size="lg">

                    Search

                </x-ui.button>

            </form>

        </div>

    </x-container>

</section>