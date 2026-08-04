@if(have_rows('faq'))

<section class="bg-background py-20">

    <x-container>

        <div class="mx-auto max-w-5xl">

            <x-ui.section-header
              badge="FAQ"
              title="Frequently Asked Questions"
              description="Everything you need to know before cooking this recipe." />

            <div class="mt-10 space-y-5">

                @while(have_rows('faq'))

                    @php(the_row())

                    <div
                        x-data="{ open: false }"
                        class="overflow-hidden rounded-3xl border border-border bg-white">

                        <button
                            @click="open = !open"
                            class="flex w-full items-center justify-between p-6 text-left">

                            <span class="text-lg font-semibold">
                                {{ get_sub_field('question') }}
                            </span>

                            <i
                                data-lucide="chevron-down"
                                class="h-5 w-5 transition-transform"
                                :class="{ 'rotate-180': open }">
                            </i>

                        </button>

                        <div
                            x-show="open"
                            x-collapse
                            class="border-t border-border px-6 py-5 text-text-muted"
                            style="display:none;">

                            {{ get_sub_field('answer') }}

                        </div>

                    </div>

                @endwhile

            </div>

        </div>

    </x-container>

</section>

@endif