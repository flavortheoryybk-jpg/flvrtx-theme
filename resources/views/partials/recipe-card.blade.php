<article
    class="group overflow-hidden rounded-3xl border border-border bg-white transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">

    <a href="{{ get_permalink() }}" class="block overflow-hidden">

        @if(has_post_thumbnail())

            {!! get_the_post_thumbnail(null, 'large', [
                'class' => 'aspect-[4/3] w-full object-cover transition duration-500 group-hover:scale-105'
            ]) !!}

        @else

            <div class="aspect-[4/3] flex items-center justify-center bg-gray-100">
                No Image
            </div>

        @endif

    </a>

    <div class="p-6">

          <span
    class="inline-flex rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold uppercase tracking-wider text-primary">
    {{ ucfirst(get_post_type()) }}
          </span>

        <h3 class="mt-4 text-2xl font-bold leading-tight">

            <a href="{{ get_permalink() }}"
               class="transition group-hover:text-primary">

                {{ get_the_title() }}

            </a>

        </h3>

        <p class="mt-4 text-text-muted leading-7">

            {{ wp_trim_words(get_the_excerpt(), 20) }}

        </p>

        <div class="mt-6">

            <x-ui.button
                href="{{ get_permalink() }}"
                variant="outline">

                Read Recipe →

            </x-ui.button>

        </div>

    </div>

</article>