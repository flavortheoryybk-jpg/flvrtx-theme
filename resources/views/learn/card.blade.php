<a href="{{ get_permalink() }}"
   class="group block overflow-hidden rounded-3xl border border-border bg-white transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">

    @if(has_post_thumbnail())

        <div class="overflow-hidden">

            {!! get_the_post_thumbnail(get_the_ID(), 'medium_large', [
                'class' => 'aspect-video w-full object-cover transition duration-500 group-hover:scale-105'
            ]) !!}

        </div>

    @endif

    <div class="p-7">

        <span class="text-xs font-semibold uppercase tracking-widest text-primary">
            Learn
        </span>

        <h3 class="mt-3 text-2xl font-bold leading-snug transition group-hover:text-primary">

            {{ get_the_title() }}

        </h3>

        <p class="mt-4 line-clamp-3 leading-7 text-text-muted">

            {{ get_the_excerpt() }}

        </p>

        <span class="mt-8 inline-flex items-center gap-2 font-semibold text-primary">

            Read Article

            →

        </span>

    </div>

</a>