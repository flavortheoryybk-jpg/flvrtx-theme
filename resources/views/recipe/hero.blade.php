<section class="bg-background py-24 lg:py-24">

    <x-container>

        {{-- Breadcrumb --}}
        <nav class="mb-8 text-sm text-text-muted" aria-label="Breadcrumb">

            <ol class="flex items-center gap-2">

                <li>
                    <a href="{{ home_url('/') }}" class="transition-colors duration-300 hover:text-primary transition-colors">
                        Home
                    </a>
                </li>

                <li>/</li>

                <li>
                    <a href="{{ home_url('/recipes') }}" class="transition-colors duration-300 hover:text-primary transition-colors">
                        Recipes
                    </a>
                </li>

                <li>/</li>

                <li class="text-text font-medium">
                    {{ get_the_title() }}
                </li>

            </ol>

        </nav>

        <div class="grid items-center gap-16 lg:grid-cols-2">

            {{-- Left Content --}}
            <div>

                <x-ui.pill>

                    FLVRTX Verified Recipe

                </x-ui.pill>

                <h1 class="mt-6 text-6xl lg:text-7xl font-bold tracking-tight leading-tight lg:text-7xl">

                    {{ get_the_title() }}

                </h1>

                @if(get_field('recipe_subtitle'))

                    <p class="mt-5 text-2xl font-medium text-text">

                        {{ get_field('recipe_subtitle') }}

                    </p>

                @endif

                @if(get_the_excerpt())

                    <p class="mt-8 max-w-2xl text-xl leading-9 text-text-muted">

                        {{ get_the_excerpt() }}

                    </p>

                @endif

                <div class="mt-10 flex flex-wrap gap-3">

                    @if(get_field('flvrtx_score'))

                        <x-ui.pill>

                            ★ {{ get_field('flvrtx_score') }}/10 FLVRTX Score

                        </x-ui.pill>

                    @endif

                    @if(get_field('difficulty'))

                        <x-ui.pill>

                            {{ get_field('difficulty') }}

                        </x-ui.pill>

                    @endif

                    @if(get_field('cuisine'))

                        <x-ui.pill>

                            {{ get_field('cuisine') }}

                        </x-ui.pill>

                    @endif

                </div>

                <div class="mt-12 flex flex-wrap gap-4">

                    @if(get_field('youtube_url'))

                        <a
                            href="{{ get_field('youtube_url') }}"
                            target="_blank"
                            class="inline-flex items-center gap-2 rounded-xl bg-primary px-6 py-4 font-semibold text-white transition hover:opacity-90">

                            <i data-lucide="play-circle" class="h-5 w-5"></i>

                            Watch Video

                        </a>

                    @endif

                    <button
                        onclick="window.print()"
                        class="inline-flex items-center gap-2 rounded-xl border border-border px-6 py-4 font-semibold transition hover:border-primary transition-colors duration-300 hover:text-primary">

                        <i data-lucide="printer" class="h-5 w-5"></i>

                        Print Recipe

                    </button>

                    <button
                        @click="$store.cookMode.start()"
                        class="inline-flex items-center gap-2 rounded-xl border border-border px-6 py-4 font-semibold transition hover:border-primary transition-colors duration-300 hover:text-primary">

                        <i data-lucide="chef-hat" class="h-5 w-5"></i>

                        Cook Mode

                    </button>

                </div>

            </div>

            {{-- Right Image --}}
            <div class="overflow-hidden rounded-[36px]">
            
                @if(has_post_thumbnail())
            
                    {!! get_the_post_thumbnail(
                        get_the_ID(),
                        'full',
                        [
                            'class' => 'aspect-[4/3] w-full object-cover transition-transform duration-500 hover:scale-[1.02]'
                        ]
                    ) !!}
            
                @endif
            
            </div>

        </div>

    </x-container>

</section>