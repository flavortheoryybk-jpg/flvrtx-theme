<section class="bg-background py-24">

    <x-container>

        <div class="grid items-center gap-16 lg:grid-cols-2">

            <div>

                <x-ui.badge>
                    Recommendation
                </x-ui.badge>

                <h1 class="mt-6 text-5xl font-bold leading-tight lg:text-6xl">

                    {{ get_the_title() }}

                </h1>

                @if(get_field('recommendation_summary'))

                    <div class="mt-6 text-lg leading-8 text-text-muted">

                        {!! get_field('recommendation_summary') !!}

                    </div>

                @endif

                <div class="mt-10 flex flex-wrap gap-6">

                    @if(get_field('rating'))

                        <div class="rounded-2xl border border-border bg-white px-5 py-3">

                            ⭐ {{ get_field('rating') }}/5

                        </div>

                    @endif

                    @if(get_field('price'))

                        <div class="rounded-2xl border border-border bg-white px-5 py-3">

                            ₹ {{ get_field('price') }}

                        </div>

                    @endif

                    @if(get_field('product_category'))

                        <div class="rounded-2xl border border-border bg-white px-5 py-3">

                            {{ get_field('product_category') }}

                        </div>

                    @endif

                </div>

            </div>

            <div>

                @if(has_post_thumbnail())

                    {!! get_the_post_thumbnail(
                        get_the_ID(),
                        'large',
                        [
                            'class' => 'w-full rounded-3xl shadow-xl'
                        ]
                    ) !!}

                @endif

            </div>

        </div>

    </x-container>

</section>