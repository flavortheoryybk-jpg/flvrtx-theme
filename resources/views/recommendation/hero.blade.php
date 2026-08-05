<section class="bg-background py-24 lg:py-32">

    <x-container>

        <div class="grid items-center gap-20 lg:grid-cols-2">

            {{-- Product Information --}}
            <div>

                <x-ui.breadcrumbs
                    :items="[
                        ['label' => 'Home', 'url' => home_url('/')],
                        ['label' => 'Recommendations', 'url' => get_post_type_archive_link('recommendation')],
                        ['label' => get_the_title()],
                    ]" />

                <div class="mt-8">

                    <x-ui.badge>

                        FLVRTX Recommendation

                    </x-ui.badge>

                </div>

                <h1 class="mt-8 text-6xl lg:text-7xl font-bold leading-[1.05] tracking-tight lg:text-6xl">

                    {{ get_the_title() }}

                </h1>

                @if(get_field('recommendation_summary'))

                    <div class="mt-8 max-w-2xl text-lg leading-8 text-text-muted">

                        {!! wp_kses_post(get_field('recommendation_summary')) !!}

                    </div>

                @endif

                {{-- Product Meta --}}
                <div class="mt-10 flex flex-wrap gap-4">

                    @if(get_field('rating'))

                        <x-ui.badge class="bg-white">

                            ⭐ {{ get_field('rating') }}/5

                        </x-ui.badge>

                    @endif

                    @if(get_field('price'))

                        <x-ui.badge class="bg-white">

                            ₹ {{ get_field('price') }}

                        </x-ui.badge>

                    @endif

                    @if(get_field('brand'))

                        <x-ui.badge class="bg-white">

                            {{ get_field('brand') }}

                        </x-ui.badge>

                    @endif

                    @if(get_field('product_category'))

                        <x-ui.badge class="bg-white">

                            {{ get_field('product_category') }}

                        </x-ui.badge>

                    @endif

                </div>

                {{-- Trust --}}
                <div class="mt-10 rounded-[28px] border border-primary/15 bg-primary/5 p-6">

                    <div class="flex items-start gap-4">

                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-primary text-white">

                            <i data-lucide="shield-check"></i>

                        </div>

                        <div>

                            <h3 class="font-bold text-text">

                                Personally Recommended by FLVRTX

                            </h3>

                            <p class="mt-2 leading-7 text-text-muted">

                                Every recommendation is selected based on quality, value, usability, and our cooking experience.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Product Image --}}
            <div>

                @if(has_post_thumbnail())

                    <div class="overflow-hidden rounded-[36px] bg-white shadow-[0_24px_48px_rgba(0,0,0,0.12)]">

                        {!! get_the_post_thumbnail(
                            get_the_ID(),
                            'large',
                            [
                                'class' => 'w-full object-cover transition duration-500 hover:scale-105',
                                'loading' => 'eager',
                                'fetchpriority' => 'high',
                                'decoding' => 'async',
                            ]
                        ) !!}

                    </div>

                @endif

            </div>

        </div>

    </x-container>

</section>