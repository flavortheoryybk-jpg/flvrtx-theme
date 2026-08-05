<section class="pb-24 lg:pb-32">

    <x-container>

        @if (have_posts())

            <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">

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

                        @default

                            @include('search.card')

                    @endswitch

                @endwhile

            </div>

            <div class="mt-20">

                @include('search.pagination')

            </div>

        @else

            <div class="py-12">

                @include('search.empty')

            </div>

        @endif

    </x-container>

</section>