<section class="bg-white py-20 lg:py-24" id="ingredients">

    <x-container>

        <div class="max-w-4xl">

            <x-ui.section-heading
                eyebrow="Ingredients"
                title="Everything You'll Need"
                description="Use fresh, high-quality ingredients for the best flavor and texture." />

            @php
                $ingredients = collect(
                    preg_split('/\r\n|\r|\n/', get_field('ingredients') ?? '')
                )->filter();
            @endphp

            <div class="mt-12 overflow-hidden rounded-[32px] border border-border bg-white shadow-[0_20px_40px_rgba(0,0,0,0.06)]">

                <ul class="divide-y divide-border">

                    @foreach ($ingredients as $ingredient)

                        <li class="flex items-center gap-5 p-6 transition-colors duration-300 hover:bg-primary/5">

                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-primary/10 text-lg font-bold text-primary">

                                ✓

                            </div>

                            <span class="text-lg font-medium leading-7 text-text">

                                {{ $ingredient }}

                            </span>

                        </li>

                    @endforeach

                </ul>

            </div>

        </div>

    </x-container>

</section>