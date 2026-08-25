<section class="bg-background py-24 lg:py-32">

    <x-container>

        <div class="grid items-center gap-16 lg:grid-cols-2 lg:gap-20">

            {{-- Book Information --}}
            <div>

                <x-ui.badge>
                    FLVRTX Book
                </x-ui.badge>

                <h1 class="mt-8 text-5xl font-bold leading-[1.05] tracking-tight lg:text-7xl">

                    {{ get_the_title() }}

                </h1>

                <p class="mt-6 text-2xl font-medium leading-relaxed text-text">

                    Understand the Why. Master the How. Cook with Confidence.

                </p>

                <p class="mt-8 max-w-2xl text-lg leading-8 text-text-muted">

                    Recipes tell you what to do. Understanding tells you why.
                    Learn the fundamentals behind Indian cooking so you can observe,
                    taste, adjust, troubleshoot, and eventually create your own dishes
                    with confidence.

                </p>

                <div class="mt-10 flex flex-wrap gap-4">

                    <x-ui.button
                        href="#purchase"
                        size="lg">

                        Get the Book

                    </x-ui.button>

                </div>

            </div>


            {{-- Book Cover --}}
            <div class="flex justify-center lg:justify-end">

                @if(has_post_thumbnail())

                    <div class="max-w-md overflow-hidden rounded-[24px] shadow-[0_30px_60px_rgba(0,0,0,0.16)]">

                        {!! get_the_post_thumbnail(
                            get_the_ID(),
                            'large',
                            [
                                'class' => 'h-auto w-full object-contain',
                                'loading' => 'eager',
                                'fetchpriority' => 'high',
                                'decoding' => 'async',
                            ]
                        ) !!}

                    </div>

                @else

                    <div class="flex aspect-[2/3] w-full max-w-md items-center justify-center rounded-[24px] border border-border bg-white p-10 text-center text-text-muted">

                        Book Cover

                    </div>

                @endif

            </div>

        </div>

    </x-container>

</section>