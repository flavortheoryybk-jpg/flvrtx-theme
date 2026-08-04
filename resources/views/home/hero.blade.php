<section class="bg-background py-24 lg:py-36">

    <x-container>

        <div class="grid items-center gap-16 lg:grid-cols-2">

            {{-- Left Content --}}
            <div>

                <x-ui.badge>
                    <x-ui.badge>
                        Premium Food Education Platform
                    </x-ui.badge>
                </x-ui.badge>

                <h1 class="mt-6 text-5xl font-bold leading-tight text-text lg:text-7xl">
                    Understand Food. Cook With Confidence.
                </h1>

                <p class="mt-6 max-w-xl text-lg leading-8 text-text-muted">
                    Explore recipes, food science, cooking techniques, and trusted recommendations that help you understand why every dish works.
                </p>

                <div class="mt-10 flex flex-wrap gap-5">

                    <x-ui.button href="{{ home_url('/recipes') }}">
                        Explore Recipes
                    </x-ui.button>

                    <x-ui.button
                        href="https://youtube.com"
                        variant="secondary"
                        target="_blank">

                        Start Learning

                    </x-ui.button>

                </div>

                <div class="mt-16 grid grid-cols-3 gap-8 border-t border-border pt-10">

                    <div>
                        <p class="text-4xl font-bold text-primary">{{ wp_count_posts('recipe')->publish }}</p>
                        <p class="mt-2 text-text-muted">Recipes</p>
                    </div>

                    <div>
                        <p class="text-4xl font-bold text-primary">{{ wp_count_posts('learn')->publish }}</p>
                        <p class="mt-2 text-text-muted">Food Science Articles</p>
                    </div>

                    <div>
                        <p class="text-4xl font-bold text-primary">50K+</p>
                        <p class="mt-2 text-text-muted">Community</p>
                    </div>

                </div>

            </div>

            {{-- Right Content --}}
            <div class="flex justify-center">

                @if(has_post_thumbnail())

                    {!! get_the_post_thumbnail(
                        get_the_ID(),
                        'large',
                        [
                            'class' => 'aspect-square w-full max-w-md rounded-3xl object-cover shadow-2xl'
                        ]
                    ) !!}

                @else

                    <div class="flex aspect-square w-full max-w-md items-center justify-center rounded-3xl border border-border bg-gradient-to-br from-primary/10 to-accent/10">

                        <span class="text-text-muted">
                            FLVRTX
                        </span>

                    </div>

                @endif

            </div>

        </div>

    </x-container>

</section>