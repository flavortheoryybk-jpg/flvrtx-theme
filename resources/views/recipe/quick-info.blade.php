<section class="border-y border-border bg-white py-14">

    <x-container>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6">

            {{-- Prep Time --}}
            <x-ui.meta-item
                class="text-center"
                label="Prep Time"
                value="{{ get_field('prep_time') ?: '--' }} min">

                <i data-lucide="timer" class="mx-auto mb-4 h-7 w-7 text-primary"></i>

            </x-ui.meta-item>

            {{-- Cook Time --}}
            <x-ui.meta-item
                class="text-center"
                label="Cook Time"
                value="{{ get_field('cook_time') ?: '--' }} min">

                <i data-lucide="flame" class="mx-auto mb-4 h-7 w-7 text-primary"></i>

            </x-ui.meta-item>

            {{-- Total Time --}}
            <x-ui.meta-item
                class="text-center"
                label="Total Time"
                value="{{ get_field('total_time') ?: '--' }} min">

                <i data-lucide="clock-3" class="mx-auto mb-4 h-7 w-7 text-primary"></i>

            </x-ui.meta-item>

            {{-- Servings --}}
            <x-ui.meta-item
                class="text-center"
                label="Servings"
                value="{{ get_field('servings') ?: '--' }}">

                <i data-lucide="users" class="mx-auto mb-4 h-7 w-7 text-primary"></i>

            </x-ui.meta-item>

            {{-- Difficulty --}}
            <x-ui.meta-item
                class="text-center"
                label="Difficulty"
                value="{{ get_field('difficulty') ?: '--' }}">

                <i data-lucide="chef-hat" class="mx-auto mb-4 h-7 w-7 text-primary"></i>

            </x-ui.meta-item>

            {{-- Calories --}}
            <x-ui.meta-item
                class="text-center"
                label="Calories"
                value="{{ get_field('calories') ?: '--' }} kcal">

                <i data-lucide="zap" class="mx-auto mb-4 h-7 w-7 text-primary"></i>

            </x-ui.meta-item>

        </div>

    </x-container>

</section>