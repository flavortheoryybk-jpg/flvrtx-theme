@if($posts = get_field('related_learn_articles'))

<x-ui.section>

    <x-ui.section-heading
        eyebrow="Learn More"
        title="Related Food Science"
        description="Understand the science behind this recipe." />

    <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">

        @foreach($posts as $post)

            @php(setup_postdata($post))

            @include('learn.card')

        @endforeach

        @php(wp_reset_postdata())

    </div>

</x-ui.section>

@endif