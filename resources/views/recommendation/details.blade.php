<section class="py-20 bg-background">

    <x-container>

        <div class="mx-auto max-w-4xl">

            <div class="prose prose-lg max-w-none">

                {!! the_content() !!}

            </div>

            @if(get_field('recommendation_reason'))

                <div class="mt-12 rounded-3xl bg-white p-8 shadow-sm border border-border">

                    <h2 class="text-2xl font-bold">
                        Why I Recommend It
                    </h2>

                    <div class="mt-4 prose max-w-none">

                        {!! get_field('recommendation_reason') !!}

                    </div>

                </div>

            @endif

            <div class="mt-12 flex flex-wrap gap-4">

                @if(get_field('amazon_link'))

                    <a href="{{ get_field('amazon_link') }}"
                       target="_blank"
                       class="rounded-xl bg-primary px-6 py-3 font-semibold text-white">

                        Buy on Amazon

                    </a>

                @endif

                @if(get_field('flipkart_link'))

                    <a href="{{ get_field('flipkart_link') }}"
                       target="_blank"
                       class="rounded-xl border border-border px-6 py-3 font-semibold">

                        Buy on Flipkart

                    </a>

                @endif

                @if(get_field('meesho_link'))

                    <a href="{{ get_field('meesho_link') }}"
                       target="_blank"
                       class="rounded-xl border border-border px-6 py-3 font-semibold">

                        Buy on Meesho

                    </a>

                @endif

            </div>

        </div>

    </x-container>

</section>