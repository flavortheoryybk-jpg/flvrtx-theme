<section class="border-y border-border/30 bg-background py-16">

    <x-container>

        <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">

            <x-ui.stat-card
                icon="timer"
                label="Prep Time"
                :value="get_field('prep_time').' min'"
            />

            <x-ui.stat-card
                icon="flame"
                label="Cook Time"
                :value="get_field('cook_time').' min'"
            />

            <x-ui.stat-card
                icon="clock-3"
                label="Total Time"
                :value="get_field('total_time').' min'"
            />

            <x-ui.stat-card
                icon="users"
                label="Servings"
                :value="get_field('servings')"
            />

            <x-ui.stat-card
                icon="chef-hat"
                label="Difficulty"
                :value="get_field('difficulty')"
            />

            <x-ui.stat-card
                icon="zap"
                label="Calories"
                :value="get_field('calories').' kcal'"
            />

            <x-ui.stat-card
                icon="utensils-crossed"
                label="Cuisine"
                :value="get_field('cuisine')"
            />

            <x-ui.stat-card
                icon="bookmark"
                label="Course"
                :value="get_field('course')"
            />

        </div>

    </x-container>

</section>