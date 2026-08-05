<section class="relative overflow-hidden bg-background py-24 lg:py-36">

    <x-container>

        <div class="grid items-center gap-20 lg:grid-cols-2">

            {{-- Left Content --}}
            <div>

                {{-- Badge --}}
                <x-ui.badge>
                    Premium Food Education Platform
                </x-ui.badge>

                {{-- Heading --}}
                <h1 class="mt-8 text-5xl font-bold leading-[1.05] tracking-tight text-text lg:text-7xl">

                    Understand Food.<br>

                    <span class="text-primary">

                        Cook With Confidence.

                    </span>

                </h1>

                {{-- Description --}}
                <p class="mt-8 max-w-lg text-lg leading-8 text-text-muted">

                    Explore recipes, food science, cooking techniques, and trusted recommendations that help you understand why every dish works.

                </p>

                {{-- CTA --}}
                <div class="mt-10 flex flex-wrap gap-4">

                    <x-ui.button href="{{ home_url('/recipes') }}">

                        Explore Recipes →

                    </x-ui.button>

                    <x-ui.button
                        href="https://youtube.com"
                        variant="secondary"
                        target="_blank"
                        rel="noopener noreferrer">

                        Watch on YouTube

                    </x-ui.button>

                </div>

                {{-- Trust Line --}}
                <div class="mt-8 flex flex-wrap items-center gap-3 text-sm font-medium text-text-muted">

                    <span>🍽 Recipes</span>

                    <span class="text-border">•</span>

                    <span>🧪 Food Science</span>

                    <span class="text-border">•</span>

                    <span>⭐ Trusted Recommendations</span>

                </div>

                {{-- Stats --}}
                <div class="mt-16 grid grid-cols-3 gap-8 border-t border-border pt-10">

                    <div>

                        <p class="text-4xl font-bold text-primary">

                            {{ wp_count_posts('recipe')->publish }}+

                        </p>

                        <p class="mt-2 text-sm uppercase tracking-wide text-text-muted">

                            Recipes

                        </p>

                    </div>

                    <div>

                        <p class="text-4xl font-bold text-primary">

                            {{ wp_count_posts('learn')->publish }}+

                        </p>

                        <p class="mt-2 text-sm uppercase tracking-wide text-text-muted">

                            Food Science

                        </p>

                    </div>

                    <div>

                        <p class="text-4xl font-bold text-primary">

                            50K+

                        </p>

                        <p class="mt-2 text-sm uppercase tracking-wide text-text-muted">

                            Food Lovers

                        </p>

                    </div>

                </div>

            </div>

            {{-- Right Content --}}
            <div class="relative flex justify-center lg:justify-end">

                <img
                    src="{{ Vite::asset('resources/images/Hero_Image_Flvrtx.png') }}"
                    alt="Premium FLVRTX Food Collection"
                    class="w-full max-w-2xl rounded-[36px] object-cover shadow-[0_30px_60px_rgba(0,0,0,0.15)] transition-all duration-500 hover:-translate-y-2 hover:scale-[1.02]"
                    loading="eager"
                    decoding="async">

            </div>

        </div>

    </x-container>

</section>