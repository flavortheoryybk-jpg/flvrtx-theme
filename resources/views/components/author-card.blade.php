<x-ui.card>

    <div class="flex items-center gap-6">

        <img
            src="{{ get_avatar_url(get_the_author_meta('ID'), ['size' => 120]) }}"
            class="h-20 w-20 rounded-full"
            alt="{{ get_the_author() }}">

        <div>

            <p class="text-sm uppercase tracking-widest text-primary">

                Author

            </p>

            <h3 class="mt-2 text-2xl font-bold">

                {{ get_the_author() }}

            </h3>

            <p class="mt-3 leading-7 text-text-muted">

                {{ get_the_author_meta('description') }}

            </p>

        </div>

    </div>

</x-ui.card>