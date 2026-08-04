<section class="border-y border-border bg-background py-12">

    <x-container>

        <div class="grid gap-6 md:grid-cols-3 xl:grid-cols-6">

            {{-- Prep Time --}}
            <div class="rounded-3xl border border-border bg-white p-6 text-center">

                <i data-lucide="timer" class="mx-auto mb-4 h-7 w-7 text-primary"></i>

                <p class="text-sm uppercase tracking-wider text-text-muted">
                    Prep Time
                </p>

                <p class="mt-2 text-2xl font-bold">
                    {{ get_field('prep_time') }} min
                </p>

            </div>

            {{-- Cook Time --}}
            <div class="rounded-3xl border border-border bg-white p-6 text-center">

                <i data-lucide="flame" class="mx-auto mb-4 h-7 w-7 text-primary"></i>

                <p class="text-sm uppercase tracking-wider text-text-muted">
                    Cook Time
                </p>

                <p class="mt-2 text-2xl font-bold">
                    {{ get_field('cook_time') }} min
                </p>

            </div>

            {{-- Total Time --}}
            <div class="rounded-3xl border border-border bg-white p-6 text-center">

                <i data-lucide="clock-3" class="mx-auto mb-4 h-7 w-7 text-primary"></i>

                <p class="text-sm uppercase tracking-wider text-text-muted">
                    Total Time
                </p>

                <p class="mt-2 text-2xl font-bold">
                    {{ get_field('total_time') }} min
                </p>

            </div>

            {{-- Servings --}}
            <div class="rounded-3xl border border-border bg-white p-6 text-center">

                <i data-lucide="users" class="mx-auto mb-4 h-7 w-7 text-primary"></i>

                <p class="text-sm uppercase tracking-wider text-text-muted">
                    Servings
                </p>

                <p class="mt-2 text-2xl font-bold">
                    {{ get_field('servings') }}
                </p>

            </div>

            {{-- Difficulty --}}
            <div class="rounded-3xl border border-border bg-white p-6 text-center">

                <i data-lucide="chef-hat" class="mx-auto mb-4 h-7 w-7 text-primary"></i>

                <p class="text-sm uppercase tracking-wider text-text-muted">
                    Difficulty
                </p>

                <p class="mt-2 text-2xl font-bold">
                    {{ get_field('difficulty') }}
                </p>

            </div>

            {{-- Calories --}}
            <div class="rounded-3xl border border-border bg-white p-6 text-center">

                <i data-lucide="zap" class="mx-auto mb-4 h-7 w-7 text-primary"></i>

                <p class="text-sm uppercase tracking-wider text-text-muted">
                    Calories
                </p>

                <p class="mt-2 text-2xl font-bold">
                    {{ get_field('calories') }} kcal
                </p>

            </div>

        </div>

    </x-container>

</section>