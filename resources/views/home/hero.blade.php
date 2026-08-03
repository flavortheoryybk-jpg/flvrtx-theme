<section class="bg-background py-24 lg:py-36">
    <x-container>

        <div class="grid items-center gap-16 lg:grid-cols-2">

            {{-- Left Content --}}
            <div>

                <span class="inline-flex rounded-full border border-primary/20 bg-primary/5 px-4 py-2 text-sm font-medium text-primary">
                    Science • Recipes • Wellness
                </span>

                <h1 class="mt-6 text-5xl font-bold leading-tight text-text lg:text-7xl">
                    Cook Better by Understanding Food.
                </h1>

                <p class="mt-6 max-w-xl text-lg leading-8 text-text-muted">
                    Recipes, food science, wellness, and cooking experiments that explain not only how to cook—but why every technique works.
                </p>

                <div class="mt-10 flex flex-wrap gap-5">

                    <a href="{{ home_url('/recipes') }}"
                       class="rounded-xl bg-primary px-8 py-4 font-semibold text-white transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                        Explore Recipes

                    </a>

                    <a href="https://youtube.com"
                       target="_blank"
                       class="rounded-xl border border-border bg-white px-8 py-4 font-semibold transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                        Watch Videos

                    </a>

                </div>

            </div>

            {{-- Right Content --}}
            <div class="flex justify-center">

                <div class="aspect-square w-full max-w-md rounded-3xl bg-gradient-to-br from-primary/15 to-accent/15 border border-border shadow-lg flex items-center justify-center">

                    <span class="text-lg text-text-muted">
                        @if(has_post_thumbnail())

                            {!! get_the_post_thumbnail(get_the_ID(),'large',[
                                'class'=>'aspect-square w-full rounded-[32px] object-cover shadow-2xl'
                            ]) !!}

                        @else

                        <div class="aspect-square rounded-[32px] bg-gradient-to-br from-primary/10 to-accent/10 flex items-center justify-center">

                            <span class="text-text-muted">
                                FLVRTX
                            </span>

                        </div>

                        @endif
                    </span>

                </div>

            </div>

        </div>

    </x-container>
</section>