@if(get_field('did_you_know'))

<section class="py-20">

    <x-container>

        <div class="mx-auto max-w-4xl">

            <div class="rounded-[32px] border border-primary/20 bg-gradient-to-br from-primary/5 to-primary/10 p-10">

                <div class="flex items-start gap-6">

                    <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-primary text-white">

                        <i data-lucide="lightbulb" class="h-8 w-8"></i>

                    </div>

                    <div>

                        <p class="text-sm font-semibold uppercase tracking-widest text-primary">
                            Did You Know?
                        </p>

                        <h2 class="mt-3 text-3xl font-bold">
                            A Small Fact That Changes How You Cook
                        </h2>

                        <p class="mt-6 text-lg leading-8 text-text-muted">

                            {!! nl2br(e(get_field('did_you_know'))) !!}

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </x-container>

</section>

@endif