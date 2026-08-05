<section class="relative overflow-hidden bg-background py-24 lg:py-36">
    <div class="absolute inset-0 -z-10 overflow-hidden">
    
        <div class="absolute -left-32 top-0 h-96 w-96 rounded-full bg-primary/5 blur-3xl"></div>
    
        <div class="absolute -right-32 bottom-0 h-96 w-96 rounded-full bg-primary/5 blur-3xl"></div>
    
    </div>
    <x-container>

        <div class="grid items-center gap-20 lg:grid-cols-2">

            {{-- Left Content --}}
            <div>

                {{-- Badge --}}
                <x-ui.pill>
                    Premium Food Education Platform
                </x-ui.pill>

                {{-- Heading --}}
                <h1 class="mt-8 text-5xl font-bold leading-[1.05] tracking-tight sm:text-6xl lg:text-7xl">

                    Understand Food.<br>

                    <span class="text-primary">

                        Cook With Confidence.

                    </span>

                </h1>

                {{-- Description --}}
                <p class="mt-8 max-w-xl text-lg leading-8 text-text-muted">

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
                <div class="mt-10 flex flex-wrap gap-6 text-sm font-medium text-text-muted">

                    <div class="flex items-center gap-2">

                        <i data-lucide="chef-hat" class="h-4 w-4 text-primary"></i>

                        Recipes

                    </div>

                    <div class="flex items-center gap-2">

                        <i data-lucide="flask-conical" class="h-4 w-4 text-primary"></i>

                        Food Science

                    </div>

                    <div class="flex items-center gap-2">

                        <i data-lucide="badge-check" class="h-4 w-4 text-primary"></i>

                        Trusted Reviews

                    </div>

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
                    class="w-full max-w-2xl rounded-[40px] object-cover shadow-2xl transition-all duration-500 hover:-translate-y-2 hover:scale-[1.02]"
                    loading="eager"
                    decoding="async">

            </div>

        </div>

    </x-container>

</section>