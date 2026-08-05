@if (have_rows('faq'))

<section class="bg-background py-20 lg:py-24" id="faq">

    <x-container>

        <div class="mx-auto max-w-4xl">

            <x-ui.section-heading
                eyebrow="FAQ"
                title="Frequently Asked Questions"
                description="Answers to the most common questions about this recipe." />

            <div class="mt-12 space-y-5">

                @while (have_rows('faq'))

                    @php(the_row())

                    <div
                        x-data="{ open: false }"
                        class="overflow-hidden rounded-[28px] border border-border bg-white shadow-sm transition-all duration-300 hover:shadow-md">

                        <button
                            @click="open = !open"
                            class="flex w-full items-center justify-between p-7 text-left">

                            <span class="pr-6 text-lg font-semibold leading-7 text-text">

                                {{ get_sub_field('question') }}

                            </span>

                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary/10">

                                <i
                                    data-lucide="chevron-down"
                                    class="h-5 w-5 text-primary transition-transform duration-300"
                                    :class="{ 'rotate-180': open }">
                                </i>

                            </div>

                        </button>

                        <div
                            x-show="open"
                            x-collapse
                            style="display:none"
                            class="border-t border-border">

                            <div class="p-7 leading-8 text-text-muted">

                                {{ get_sub_field('answer') }}

                            </div>

                        </div>

                    </div>

                @endwhile

            </div>

        </div>

    </x-container>

</section>

@endif