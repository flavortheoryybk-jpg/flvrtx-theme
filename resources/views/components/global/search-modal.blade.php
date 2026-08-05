<div
    x-data="{ open: false }"
    x-on:open-search.window="open = true; $nextTick(() => $refs.search.focus())"
    x-on:keydown.escape.window="open = false"
>

    <!-- Overlay -->
    <div
        x-show="open"
        x-transition.opacity
        @click="open = false"
        class="fixed inset-0 z-[90] bg-black/50"
        style="display:none">
    </div>

    <!-- Modal -->
    <div
        x-show="open"
        x-transition
        class="fixed inset-0 z-[100] flex items-start justify-center pt-32"
        style="display:none">

        <div
            @click.outside="open = false"
            class="w-full max-w-2xl rounded-2xl bg-white shadow-2xl">

            <form
                method="get"
                action="{{ home_url('/') }}"
                class="p-6">
            
                <div class="relative flex items-center gap-3">
            
                    <div class="relative flex-1">
            
                        <i
                            data-lucide="search"
                            class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-text-muted">
                        </i>
            
                        <input
                            x-ref="search"
                            type="search"
                            name="s"
                            placeholder="Search recipes, articles..."
                            class="w-full rounded-xl border border-border py-4 pl-12 pr-4 text-lg focus:border-primary focus:outline-none">
            
                    </div>
            
                    <button
                        type="submit"
                        class="rounded-xl bg-primary px-6 py-4 font-medium text-white transition hover:bg-primary-dark">
            
                        Search
            
                    </button>
            
                </div>
            
            </form>

        </div>

    </div>

</div>