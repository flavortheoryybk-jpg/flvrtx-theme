<section class="bg-background py-20 lg:py-28">

    <x-container>

        <div class="grid items-center gap-20 lg:grid-cols-2">

            {{-- Image --}}
            <div>

                @if (has_post_thumbnail())

                    {!! get_the_post_thumbnail(
                        get_the_ID(),
                        'large',
                        [
                            'class' => 'aspect-[4/3] w-full rounded-[36px] object-cover shadow-[0_30px_60px_rgba(0,0,0,0.15)] transition-all duration-500 hover:-translate-y-2 hover:scale-[1.02]',
                            'loading' => 'eager',
                            'fetchpriority' => 'high',
                            'decoding' => 'async',
                        ]
                    ) !!}

                @endif

            </div>

            {{-- Content --}}
            <div>

                <x-ui.breadcrumbs
                    :items="[
                        ['label' => 'Home', 'url' => home_url('/')],
                        ['label' => 'Recipes', 'url' => home_url('/recipes')],
                        ['label' => get_the_title()],
                    ]" />

                <div class="mt-8">

                    <x-ui.badge>

                        Recipe

                    </x-ui.badge>

                </div>

                <h1 class="mt-8 text-5xl font-bold leading-[1.05] tracking-tight lg:text-6xl">

                    {{ get_the_title() }}

                </h1>

                <p class="mt-8 max-w-xl text-xl leading-9 text-text-muted">

                    {{ get_the_excerpt() }}

                </p>

                {{-- Meta --}}
                <div class="mt-12 grid grid-cols-2 gap-5">

                    <x-ui.meta-item
                        label="Prep Time"
                        value="{{ get_field('prep_time') ?: '--' }} min" />

                    <x-ui.meta-item
                        label="Cook Time"
                        value="{{ get_field('cook_time') ?: '--' }} min" />

                    <x-ui.meta-item
                        label="Servings"
                        value="{{ get_field('servings') ?: '--' }}" />

                    <x-ui.meta-item
                        label="Difficulty"
                        value="{{ get_field('difficulty') ?: '--' }}" />

                </div>

                {{-- CTA --}}
                <div class="mt-10 flex flex-wrap gap-4">

                    <x-ui.button
                        onclick="window.print(); return false;">

                        Print Recipe

                    </x-ui.button>

                    @if (get_field('youtube_url'))

                        <x-ui.button
                            href="{{ get_field('youtube_url') }}"
                            variant="secondary"
                            target="_blank"
                            rel="noopener noreferrer">

                            Watch Video

                        </x-ui.button>

                    @endif

                </div>

            </div>

        </div>

    </x-container>

</section>