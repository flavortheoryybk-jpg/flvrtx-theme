<section class="pb-24 lg:pb-32">

    <x-container>

        <div class="grid gap-16 lg:grid-cols-12">

            {{-- Main Content --}}
            <div class="lg:col-span-8">

                @if (has_post_thumbnail())

                    <div class="mb-14 overflow-hidden rounded-[36px] shadow-[0_24px_48px_rgba(0,0,0,0.12)]">

                        {!! get_the_post_thumbnail(
                            get_the_ID(),
                            'large',
                            [
                                'class' => 'w-full object-cover',
                                'loading' => 'eager',
                                'fetchpriority' => 'high',
                                'decoding' => 'async',
                            ]
                        ) !!}

                    </div>

                @endif

                <article
                    class="prose prose-lg max-w-none
                    prose-headings:font-heading
                    prose-headings:font-bold
                    prose-headings:tracking-tight
                    prose-headings:text-text
                    prose-p:leading-8
                    prose-p:text-text-muted
                    prose-strong:text-text
                    prose-li:text-text-muted
                    prose-li:marker:text-primary
                    prose-blockquote:border-primary
                    prose-blockquote:text-text
                    prose-img:rounded-[32px]
                    prose-img:shadow-lg
                    prose-a:text-primary
                    prose-a:no-underline
                    hover:prose-a:underline">

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

                    <div class="mt-6 space-y-5">

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

                                {{ get_the_date('F j, Y') }}

                            </span>

                        </div>

                    </div>

                </x-ui.card>

                {{-- Share --}}
                <x-ui.card>

                    <h3 class="text-xl font-bold">

                        Share this Article

                    </h3>

                    <p class="mt-2 text-text-muted">

                        Help others discover this article.

                    </p>

                    <div class="mt-6 flex gap-3">

                        <button
                            class="flex h-12 w-12 items-center justify-center rounded-xl border border-border transition-all duration-300 hover:border-primary hover:bg-primary hover:text-white">

                            <i data-lucide="facebook"></i>

                        </button>

                        <button
                            class="flex h-12 w-12 items-center justify-center rounded-xl border border-border transition-all duration-300 hover:border-primary hover:bg-primary hover:text-white">

                            <i data-lucide="twitter"></i>

                        </button>

                        <button
                            class="flex h-12 w-12 items-center justify-center rounded-xl border border-border transition-all duration-300 hover:border-primary hover:bg-primary hover:text-white">

                            <i data-lucide="link"></i>

                        </button>

                    </div>

                </x-ui.card>

            </aside>

        </div>

    </x-container>

</section>