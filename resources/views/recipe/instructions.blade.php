<section class="py-20 bg-background">

    <x-container>

        <h2 class="text-3xl font-bold">
            Instructions
        </h2>

        @php
            $steps = collect(
                preg_split('/\r\n|\r|\n/', get_field('instructions') ?? '')
            )->filter();
        @endphp

        <div class="mt-10 space-y-6">

            @foreach($steps as $index => $step)

              <div class="flex gap-5">

                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-primary text-lg font-bold text-white shadow-sm">

                    {{ $index + 1 }}

                </div>

                <div class="flex-1 rounded-3xl border border-border bg-white p-6 shadow-sm">

                    <p class="leading-8 text-lg">
                        {{ $step }}
                    </p>

                </div>

              </div>

              @endforeach

        </div>

    </x-container>

</section>