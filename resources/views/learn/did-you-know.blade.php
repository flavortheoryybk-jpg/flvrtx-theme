@if (get_field('did_you_know'))

<section class="bg-background py-24 lg:py-24" id="did-you-know">

    <x-container>

        <div class="mx-auto max-w-4xl">

            <div class="overflow-hidden rounded-[36px] border border-primary/15 bg-gradient-to-br from-primary/5 via-white to-primary/10 shadow-[0_24px_48px_rgba(0,0,0,0.08)]">

                <div class="p-10 lg:p-12">

                    <div class="flex items-start gap-6">

                        <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-primary text-white shadow-lg">

                            <i data-lucide="lightbulb" class="h-8 w-8"></i>

                        </div>

                        <div class="flex-1">

                            <x-ui.badge>

                                Did You Know?

                            </x-ui.badge>

                            <h2 class="mt-6 text-4xl font-bold tracking-tight">

                                A Small Fact That Changes How You Cook

                            </h2>

                            <div class="mt-8 text-lg leading-8 text-text-muted">

                                {!! nl2br(e(get_field('did_you_know'))) !!}

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </x-container>

</section>

@endif