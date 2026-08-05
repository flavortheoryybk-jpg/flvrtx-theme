<section class="bg-background py-20 lg:py-24" id="instructions">

    <x-container>

        <div class="max-w-4xl">

            <x-ui.section-heading
                eyebrow="Instructions"
                title="Step-by-Step Cooking Guide"
                description="Follow each step carefully for the best results." />

            @php
                $steps = collect(
                    preg_split('/\r\n|\r|\n/', get_field('instructions') ?? '')
                )->filter();
            @endphp

            <div class="mt-12 space-y-8">

                @foreach ($steps as $index => $step)

                    <div class="group flex gap-6">

                        {{-- Step Number --}}
                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-primary text-xl font-bold text-white shadow-lg transition-transform duration-300 group-hover:scale-105">

                            {{ $index + 1 }}

                        </div>

                        {{-- Step Content --}}
                        <div class="flex-1 rounded-[28px] border border-border bg-white p-8 shadow-[0_12px_32px_rgba(0,0,0,0.06)] transition-all duration-300 group-hover:-translate-y-1 group-hover:shadow-[0_20px_40px_rgba(0,0,0,0.10)]">

                            <p class="text-lg leading-8 text-text">

                                {{ $step }}

                            </p>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </x-container>

</section>