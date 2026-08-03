<section class="bg-background py-24 lg:py-36">

    <x-container>

        <div class="grid items-center gap-16 lg:grid-cols-2">

            {{-- Left Content --}}
            <div>

                <x-ui.badge>
                    Science • Recipes • Wellness
                </x-ui.badge>

                <h1 class="mt-6 text-5xl font-bold leading-tight text-text lg:text-7xl">
                    Cook Better by Understanding Food.
                </h1>

                <p class="mt-6 max-w-xl text-lg leading-8 text-text-muted">
                    Recipes, food science, wellness, and cooking experiments that explain not only how to cook—but why every technique works.
                </p>

                <div class="mt-10 flex flex-wrap gap-5">

                    <x-ui.button href="{{ home_url('/recipes') }}">
                        Explore Recipes
                    </x-ui.button>

                    <x-ui.button
                        href="https://youtube.com"
                        variant="secondary"
                        target="_blank">

                        Watch Videos

                    </x-ui.button>

                </div>

                <div class="mt-16 grid grid-cols-3 gap-8 border-t border-border pt-10">

                    <div>
                        <p class="text-4xl font-bold text-primary">100+</p>
                        <p class="mt-2 text-text-muted">Recipes</p>
                    </div>

                    <div>
                        <p class="text-4xl font-bold text-primary">25+</p>
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