<section class="pb-24">

    <x-container>

        <div class="grid gap-16 lg:grid-cols-12">

            {{-- Main Content --}}
            <div class="lg:col-span-8">

                @if(has_post_thumbnail())

                    <div class="mb-12">

                        {!! get_the_post_thumbnail(
                            get_the_ID(),
                            'large',
                            [
                                'class' => 'w-full rounded-3xl object-cover shadow-xl'
                            ]
                        ) !!}

                    </div>

                @endif

                <article class="prose prose-lg max-w-none">

                    {!! the_content() !!}

                </article>

            </div>

            {{-- Sidebar --}}
            <aside class="space-y-8 lg:col-span-4 lg:sticky lg:top-28 lg:self-start">

                {{-- Article Information --}}
                <x-ui.card>

                    <h3 class="text-xl font-bold">
                        Article Information
                    </h3>

                    <div class="mt-6 space-y-4">

                        @if(get_field('reading_time'))

                            <div class="flex items-center justify-between">

                                <span class="text-text-muted">
                                    Reading Time
                                </span>

                                <span class="font-semibold">
                                    {{ get_field('reading_time') }} min
                                </span>

                            </div>

                        @endif

                        @if(get_field('difficulty'))

                            <div class="flex items-center justify-between">

                                <span class="text-text-muted">
                                    Difficulty
                                </span>

                                <span class="font-semibold">
                                    {{ get_field('difficulty') }}
                                </span>

                            </div>

                        @endif

                        <div class="flex items-center justify-between">

                            <span class="text-text-muted">
                                Published
                            </span>

                            <span class="font-semibold">
                                {{ get_the_date('M d, Y') }}
                            </span>

                        </div>

                    </div>

                </x-ui.card>

                {{-- Share --}}
                <x-ui.card>

                    <h3 class="text-xl font-bold">
                        Share this Article
                    </h3>

                    <div class="mt-6 flex gap-3">

                        <button class="rounded-xl border border-border p-3 hover:bg-primary hover:text-white">
                            <i data-lucide="facebook"></i>
                        </button>

                        <button class="rounded-xl border border-border p-3 hover:bg-primary hover:text-white">
                            <i data-lucide="twitter"></i>
                        </button>

                        <button class="rounded-xl border border-border p-3 hover:bg-primary hover:text-white">
                            <i data-lucide="link"></i>
                        </button>

                    </div>

                </x-ui.card>

            </aside>

        </div>

    </x-container>

</section>