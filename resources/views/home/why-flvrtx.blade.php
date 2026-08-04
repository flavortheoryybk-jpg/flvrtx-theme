<section class="border-y border-border bg-white py-24">

    <x-container>

        {{-- Section Header --}}
        <div class="mx-auto max-w-3xl text-center">

            <x-ui.badge>
                Why FLVRTX?
            </x-ui.badge>

            <h2 class="mt-6 text-5xl font-bold leading-tight">
                More Than Just Recipes.
            </h2>

            <p class="mt-6 text-lg leading-8 text-text-muted">
                FLVRTX combines cooking, food science, practical techniques, and honest recommendations
                to help you become a more confident cook—not just follow recipes.
            </p>

        </div>

        {{-- Features --}}
        <div class="mt-20 grid gap-8 md:grid-cols-3">

            {{-- Card 1 --}}
            <div
                class="group rounded-3xl border border-border bg-background p-8 transition-all duration-300 hover:-translate-y-2 hover:border-primary hover:shadow-2xl">

                <div class="mb-6 flex h-14 w-14 items-center justify-center rounded-2xl bg-primary/10 text-3xl">
                    🧪
                </div>

                <h3 class="text-2xl font-bold transition-colors duration-300 group-hover:text-primary">
                    Food Science
                </h3>

                <p class="mt-4 leading-7 text-text-muted">
                    Discover why ingredients behave the way they do and learn the science behind better cooking.
                </p>

            </div>

            {{-- Card 2 --}}
            <div
                class="group rounded-3xl border border-border bg-background p-8 transition-all duration-300 hover:-translate-y-2 hover:border-primary hover:shadow-2xl">

                <div class="mb-6 flex h-14 w-14 items-center justify-center rounded-2xl bg-primary/10 text-3xl">
                    🍳
                </div>

                <h3 class="text-2xl font-bold transition-colors duration-300 group-hover:text-primary">
                    Tested Recipes
                </h3>

                <p class="mt-4 leading-7 text-text-muted">
                    Every recipe is cooked, tested, refined, and photographed before it's published.
                </p>

            </div>

            {{-- Card 3 --}}
            <div
                class="group rounded-3xl border border-border bg-background p-8 transition-all duration-300 hover:-translate-y-2 hover:border-primary hover:shadow-2xl">

                <div class="mb-6 flex h-14 w-14 items-center justify-center rounded-2xl bg-primary/10 text-3xl">
                    ⭐
                </div>

                <h3 class="text-2xl font-bold transition-colors duration-300 group-hover:text-primary">
                    Trusted Recommendations
                </h3>

                <p class="mt-4 leading-7 text-text-muted">
                    Kitchen tools, ingredients, and products we personally use and confidently recommend.
                </p>

            </div>

        </div>

        {{-- CTA Banner --}}
        <div class="mt-24 rounded-[32px] bg-primary px-8 py-16 text-center text-white lg:px-16">

            <h2 class="text-4xl font-bold lg:text-5xl">
                Understand Food. Cook With Confidence.
            </h2>

            <p class="mx-auto mt-6 max-w-3xl text-lg leading-8 text-white/90">
                Recipes, food science, wellness, and trusted recommendations—all designed to help you cook smarter every day.
            </p>

            <div class="mt-10">

                <x-ui.button
                    href="{{ home_url('/recipes') }}"
                    class="bg-white text-primary hover:bg-background">

                    Explore Recipes

                </x-ui.button>

            </div>

        </div>

    </x-container>

</section>