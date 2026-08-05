<x-ui.section class="border-y border-border/20 bg-white">

    <x-container>

        {{-- Section Header --}}
        <x-ui.section-heading
            eyebrow="Why FLVRTX?"
            title="More Than Just Recipes."
            description="FLVRTX combines recipes, food science, practical techniques, and trusted recommendations to help you become a more confident cook—not just someone who follows instructions."
        />

        {{-- Features --}}
        <div class="mt-16 grid gap-8 md:grid-cols-3">

            {{-- Food Science --}}
            <x-ui.card class="group">

                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-primary/10">

                    <i
                        data-lucide="flask-conical"
                        class="h-8 w-8 text-primary">
                    </i>

                </div>

                <h3 class="mt-8 text-2xl font-bold tracking-tight transition-colors duration-300 group-hover:text-primary">

                    Food Science

                </h3>

                <p class="mt-5 leading-8 text-text-muted">

                    Learn why ingredients behave the way they do and understand the science behind better cooking, not just the steps.

                </p>

            </x-ui.card>

            {{-- Tested Recipes --}}
            <x-ui.card class="group">

                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-primary/10">

                    <i
                        data-lucide="chef-hat"
                        class="h-8 w-8 text-primary">
                    </i>

                </div>

                <h3 class="mt-8 text-2xl font-bold tracking-tight transition-colors duration-300 group-hover:text-primary">

                    Tested Recipes

                </h3>

                <p class="mt-5 leading-8 text-text-muted">

                    Every recipe is cooked, tested, refined, and photographed before publishing so you can cook with confidence.

                </p>

            </x-ui.card>

            {{-- Trusted Recommendations --}}
            <x-ui.card class="group">

                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-primary/10">

                    <i
                        data-lucide="badge-check"
                        class="h-8 w-8 text-primary">
                    </i>

                </div>

                <h3 class="mt-8 text-2xl font-bold tracking-tight transition-colors duration-300 group-hover:text-primary">

                    Trusted Recommendations

                </h3>

                <p class="mt-5 leading-8 text-text-muted">

                    Discover kitchen tools, ingredients, and products that have been personally used, tested, and genuinely recommended.

                </p>

            </x-ui.card>

        </div>

        {{-- CTA Banner --}}
        <div class="mt-24 overflow-hidden rounded-[40px] bg-primary px-8 py-20 text-center text-white lg:px-20">

            <x-ui.pill class="border border-white/20 bg-white/10 text-white">

                Join the FLVRTX Journey

            </x-ui.pill>

            <h2 class="mt-8 text-4xl font-bold tracking-tight lg:text-6xl">

                Understand Food.<br>

                Cook With Confidence.

            </h2>

            <p class="mx-auto mt-8 max-w-3xl text-lg leading-8 text-white/90">

                Whether you're cooking your first meal or perfecting your signature dish, FLVRTX gives you recipes, food science, practical techniques, and honest recommendations—all in one place.

            </p>

            <div class="mt-10 flex justify-center">

                <x-ui.button
                    href="{{ home_url('/recipes') }}"
                    class="bg-white text-primary hover:bg-background">

                    Explore Recipes

                    <i
                        data-lucide="arrow-right"
                        class="h-5 w-5">
                    </i>

                </x-ui.button>

            </div>

        </div>

    </x-container>

</x-ui.section>