<section class="bg-background py-20">

            <x-container>

                <div class="grid gap-16 lg:grid-cols-2">

                    <div>

                        @if (has_post_thumbnail())

                            {!! get_the_post_thumbnail(
                                get_the_ID(),
                                'large',
                                [
                                    'class' => 'w-full rounded-3xl object-cover',
                                    'loading' => 'eager',
                                    'fetchpriority' => 'high',
                                    'decoding' => 'async',
                                ]
                            ) !!}

                        @endif

                    </div>

                    <div>
                      <nav class="mb-8 flex items-center gap-2 text-sm text-text-muted">

    <a href="{{ home_url('/') }}"
       class="transition hover:text-primary">
        Home
    </a>

    <span>/</span>

    <a href="{{ home_url('/recipes') }}"
       class="transition hover:text-primary">
        Recipes
    </a>

    <span>/</span>

    <span class="text-text">
        {{ get_the_title() }}
    </span>

</nav>

                        <p class="text-primary font-semibold uppercase tracking-widest">
                            Recipe
                        </p>

                        <h1 class="mt-5 text-5xl font-bold leading-tight lg:text-6xl">
                            {{ get_the_title() }}
                        </h1>

                        <p class="mt-8 max-w-xl text-xl leading-8 text-text-muted">
                            {{ get_the_excerpt() }}
                        </p>

                        <div class="mt-12 grid grid-cols-2 gap-5">

    <div class="rounded-3xl border border-border bg-white p-6 shadow-sm">
        <p class="text-sm text-text-muted">
            Prep Time
        </p>

        <p class="mt-2 text-2xl font-bold">
            {{ get_field('prep_time') }} min
        </p>
    </div>

    <div class="rounded-3xl border border-border bg-white p-6 shadow-sm">
        <p class="text-sm text-text-muted">
            Cook Time
        </p>

        <p class="mt-2 text-2xl font-bold">
            {{ get_field('cook_time') }} min
        </p>
    </div>

    <div class="rounded-3xl border border-border bg-white p-6 shadow-sm">
        <p class="text-sm text-text-muted">
            Servings
        </p>

        <p class="mt-2 text-2xl font-bold">
            {{ get_field('servings') }}
        </p>
    </div>

    <div class="rounded-3xl border border-border bg-white p-6 shadow-sm">
        <p class="text-sm text-text-muted">
            Difficulty
        </p>

        <p class="mt-2 text-2xl font-bold">
            {{ get_field('difficulty') }}
        </p>
    </div>

</div>
<div class="mt-10 flex flex-wrap gap-4">

    <button
        onclick="window.print(); return false;"
        class="rounded-xl bg-primary px-7 py-3 font-semibold text-white transition hover:opacity-90">

        Print Recipe

    </button>

    @if(get_field('youtube_url'))

        <a href="{{ get_field('youtube_url') }}"
           target="_blank"
           class="rounded-xl border border-border px-7 py-3 font-semibold transition hover:bg-gray-50">

            Watch Video

        </a>

    @endif

</div>

                    </div>

                </div>

            </x-container>

        </section>