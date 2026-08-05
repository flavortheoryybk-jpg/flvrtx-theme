@include('recipe.table-of-contents')

<aside class="space-y-8 lg:sticky lg:top-28">

    {{-- Share --}}
    <div class="rounded-[32px] border border-border bg-white p-8 shadow-sm">

        <h3 class="text-xl font-bold">

            Share this Recipe

        </h3>

        <p class="mt-2 text-text-muted">

            Help others discover this recipe.

        </p>

        <div class="mt-6 flex gap-3">

            <button
                type="button"
                class="flex h-12 w-12 items-center justify-center rounded-xl border border-border transition-all duration-300 hover:border-primary hover:bg-primary hover:text-white">

                <i data-lucide="facebook"></i>

            </button>

            <button
                type="button"
                class="flex h-12 w-12 items-center justify-center rounded-xl border border-border transition-all duration-300 hover:border-primary hover:bg-primary hover:text-white">

                <i data-lucide="instagram"></i>

            </button>

            <button
                type="button"
                class="flex h-12 w-12 items-center justify-center rounded-xl border border-border transition-all duration-300 hover:border-primary hover:bg-primary hover:text-white">

                <i data-lucide="link"></i>

            </button>

        </div>

    </div>

    {{-- YouTube CTA --}}
    @if(get_field('youtube_url'))

    <div class="rounded-[32px] bg-primary p-8 text-white shadow-lg">

        <h3 class="text-2xl font-bold">

            Watch on YouTube

        </h3>

        <p class="mt-4 text-white/80">

            Prefer watching? Follow the complete recipe step by step.

        </p>

        <x-ui.button
            href="{{ get_field('youtube_url') }}"
            target="_blank"
            rel="noopener noreferrer"
            class="mt-6 bg-white !text-primary hover:opacity-90">

            ▶ Watch Now

        </x-ui.button>

    </div>

    @endif

    {{-- Newsletter --}}
    <div class="rounded-[32px] border border-border bg-background p-8">

        <h3 class="text-2xl font-bold">

            Join FLVRTX

        </h3>

        <p class="mt-4 leading-7 text-text-muted">

            Get recipes, food science articles, cooking tips and trusted recommendations delivered regularly.

        </p>

        <x-ui.button
            href="{{ home_url('/subscribe') }}"
            variant="primary"
            class="mt-6 w-full justify-center">

            Subscribe Free

        </x-ui.button>

    </div>

</aside>