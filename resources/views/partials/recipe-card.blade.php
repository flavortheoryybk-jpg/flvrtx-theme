<article class="overflow-hidden rounded-3xl border border-border bg-background transition hover:-translate-y-1 hover:shadow-xl">

    @if(has_post_thumbnail())
        <a href="{{ get_permalink() }}">
            {!! get_the_post_thumbnail(null, 'large', [
                'class' => 'aspect-[4/3] w-full object-cover'
            ]) !!}
        </a>
    @else
        <div class="aspect-[4/3] bg-gray-200 flex items-center justify-center">
            No Image
        </div>
    @endif

    <div class="p-6">

        <div class="text-sm font-medium text-primary">
            {{ get_the_category()[0]->name ?? 'Recipe' }}
        </div>

        <h3 class="mt-3 text-2xl font-bold">
            <a href="{{ get_permalink() }}">
                {{ get_the_title() }}
            </a>
        </h3>

        <p class="mt-3 text-text-muted">
            {{ wp_trim_words(get_the_excerpt(), 20) }}
        </p>

        <a href="{{ get_permalink() }}"
           class="mt-6 inline-flex font-semibold text-primary">
            Read Recipe →
        </a>

    </div>

</article>