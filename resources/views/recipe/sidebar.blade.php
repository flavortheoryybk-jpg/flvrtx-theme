@include('recipe.table-of-contents')
<aside class="space-y-8 lg:sticky lg:top-28">

    {{-- Share --}}
    <div class="rounded-3xl border border-border bg-white p-6">

        <h3 class="text-xl font-bold">
            Share this Recipe
        </h3>

        <div class="mt-6 flex gap-3">

            <a href="#" class="flex h-12 w-12 items-center justify-center rounded-xl border border-border hover:bg-primary hover:text-white">
                <i data-lucide="facebook"></i>
            </a>

            <a href="#" class="flex h-12 w-12 items-center justify-center rounded-xl border border-border hover:bg-primary hover:text-white">
                <i data-lucide="instagram"></i>
            </a>

            <a href="#" class="flex h-12 w-12 items-center justify-center rounded-xl border border-border hover:bg-primary hover:text-white">
                <i data-lucide="link"></i>
            </a>

        </div>

    </div>

    {{-- YouTube CTA --}}
    <div class="rounded-3xl bg-primary p-8 text-white">

        <h3 class="text-2xl font-bold">
            Watch it on YouTube
        </h3>

        <p class="mt-4 opacity-90">
            Prefer watching instead of reading?
        </p>

        <a
            href="{{ get_field('youtube_url') }}"
            target="_blank"
            class="mt-6 inline-flex items-center gap-2 rounded-xl bg-white px-6 py-3 font-semibold text-primary">

            <i data-lucide="play"></i>

            Watch Now

        </a>

    </div>

    {{-- Newsletter --}}
    <div class="rounded-3xl border border-border bg-background p-8">

        <h3 class="text-xl font-bold">
            Never Miss a Recipe
        </h3>

        <p class="mt-4 text-text-muted">
            New recipes, cooking science and recommendations every week.
        </p>

        <a
            href="{{ home_url('/subscribe') }}"
            class="mt-6 inline-flex items-center gap-2 font-semibold text-primary">

            Subscribe

            <i data-lucide="arrow-right"></i>

        </a>

    </div>

</aside>