<a href="{{ get_permalink() }}"
   class="group overflow-hidden rounded-3xl border border-border bg-white transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

    @if(has_post_thumbnail())

        {!! get_the_post_thumbnail(get_the_ID(), 'medium_large', [
            'class' => 'aspect-video w-full object-cover'
        ]) !!}

    @endif

    <div class="p-6">

        <span class="text-xs font-semibold uppercase tracking-widest text-primary">
            Learn
        </span>

        <h3 class="mt-3 text-2xl font-bold transition group-hover:text-primary">
            {{ get_the_title() }}
        </h3>

        <p class="mt-4 line-clamp-3 text-text-muted">
            {{ get_the_excerpt() }}
        </p>

        <span class="mt-6 inline-block font-semibold text-primary">
            Read Article →
        </span>

    </div>

</a>