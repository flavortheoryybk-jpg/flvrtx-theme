<section class="bg-white py-24 lg:py-32">

    <x-container>

        <x-ui.section-heading
            eyebrow="Explore"
            title="Everything You Need to Master Food"
            description="Recipes, food science, wellness, videos and trusted recommendations—all in one place."
            align="center" />

        @php
            $categories = [
                [
                    'title' => 'Recipes',
                    'icon' => '🍛',
                    'description' => 'Authentic recipes tested by FLVRTX.',
                    'url' => home_url('/recipes'),
                ],
                [
                    'title' => 'Wellness',
                    'icon' => '🥗',
                    'description' => 'Eat better with practical nutrition guides.',
                    'url' => home_url('/wellness'),
                ],
                [
                    'title' => 'Learn',
                    'icon' => '📚',
                    'description' => 'Understand the science behind cooking.',
                    'url' => home_url('/learn'),
                ],
                [
                    'title' => 'Watch',
                    'icon' => '🎥',
                    'description' => 'Premium cooking videos and tutorials.',
                    'url' => home_url('/watch'),
                ],
                [
                    'title' => 'Shop',
                    'icon' => '🛒',
                    'description' => 'Trusted kitchen tools and recommendations.',
                    'url' => home_url('/shop'),
                ],
                [
                    'title' => 'About',
                    'icon' => '👨‍🍳',
                    'description' => 'Learn the philosophy behind FLVRTX.',
                    'url' => home_url('/about'),
                ],
            ];
        @endphp

        <div class="mt-14 grid gap-8 sm:grid-cols-2 xl:grid-cols-3">

            @foreach ($categories as $category)

                <a
                    href="{{ $category['url'] }}"
                    class="group rounded-3xl border border-border bg-background p-8 transition-all duration-300 hover:-translate-y-2 hover:border-primary hover:shadow-xl">

                    <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-primary/10 text-4xl transition-all duration-300 group-hover:bg-primary group-hover:scale-110">

                        <span class="transition duration-300 group-hover:scale-110">

                            {{ $category['icon'] }}

                        </span>

                    </div>

                    <h3 class="mt-8 text-2xl font-bold tracking-tight transition-colors duration-300 group-hover:text-primary">

                        {{ $category['title'] }}

                    </h3>

                    <p class="mt-4 leading-7 text-text-muted">

                        {{ $category['description'] }}

                    </p>

                    <div class="mt-8 flex items-center font-semibold text-primary">

                        Explore

                        <span class="ml-2 transition-transform duration-300 group-hover:translate-x-1">

                            →

                        </span>

                    </div>

                </a>

            @endforeach

        </div>

    </x-container>

</section>