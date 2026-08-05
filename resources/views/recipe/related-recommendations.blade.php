@if($posts = get_field('related_recommendations'))

<x-ui.section>

    <x-ui.section-heading
        eyebrow="Recommended Products"
        title="Tools & Ingredients"
        description="Products that pair perfectly with this recipe." />

    <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">

        @foreach($posts as $post)

            @php(setup_postdata($post))

            @include('recommendation.card')

        @endforeach

        @php(wp_reset_postdata())

    </div>

</x-ui.section>

@endif