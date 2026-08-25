<section class="py-8 lg:py-10 bg-background" id="instructions">

    <x-container>

        <div class="mx-auto max-w-5xl">

            <x-ui.section-heading
                eyebrow="Cooking"
                title="Step-by-Step Instructions"
                description="Follow each step carefully for the best results."
            />

            @php
                $steps = collect(
                    preg_split("/\R{2,}/", trim(get_field('instructions') ?? ''))
                )->filter();
            @endphp

            <div class="relative mt-10">

                {{-- Timeline --}}
                <div class="absolute left-6 top-0 bottom-0 hidden w-px bg-border/30 md:block"></div>

                <div class="space-y-10">

                    @foreach($steps as $index => $step)

                        <div class="relative flex gap-6">

                            {{-- Step Number --}}
                            <div class="relative z-10 flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-primary text-lg font-bold text-white shadow-lg">

                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}

                            </div>

                            {{-- Step Content --}}
                            <div class="flex-1 rounded-[28px] bg-white p-8 shadow-sm ring-1 ring-border/10 transition-all duration-300 hover:shadow-lg">

                                <div class="prose prose-lg max-w-none text-text">

                                    {!! nl2br(e($step)) !!}
                                
                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </x-container>

</section>