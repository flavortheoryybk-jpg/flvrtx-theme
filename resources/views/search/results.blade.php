<section class="pb-20">

    <x-container>

        @if (have_posts())

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

                @while (have_posts())
                    @php(the_post())

                    @switch(get_post_type())

                        @case('recipe')
                            @include('recipe.card')
                            @break

                        @case('learn')
                            @include('learn.card')
                            @break

                        @case('watch')
                            @include('watch.card')
                            @break

                        @case('recommendation')
                            @include('recommendation.card')
                            @break

                    @endswitch

                @endwhile

            </div>

            @include('search.pagination')

        @else

            @include('search.empty')

        @endif

    </x-container>

</section>