<section class="bg-background py-24 lg:py-32">

    <x-container>

        <x-ui.section-heading
            eyebrow="Explore"
            title="Everything You Need to Master Food"
            description="Recipes, food science, videos, and trusted recommendations—all designed to help you become a better cook."
        />

        @php
            $categories = [
                [
                    'title' => 'Recipes',
                    'icon' => 'chef-hat',
                    'description' => 'Authentic recipes tested and refined before publishing.',
                    'url' => home_url('/recipes'),
                ],
                [
                    'title' => 'Learn',
                    'icon' => 'flask-conical',
                    'description' => 'Understand the science behind ingredients and cooking.',
                    'url' => home_url('/learn'),
                ],
                [
                    'title' => 'Watch',
                    'icon' => 'play-circle',
                    'description' => 'Step-by-step cooking videos and premium tutorials.',
                    'url' => home_url('/watch'),
                ],
                [
                    'title' => 'Recommendations',
                    'icon' => 'badge-check',
                    'description' => 'Kitchen tools, ingredients, and products personally recommended.',
                    'url' => home_url('/recommendation'),
                ],
                [
                    'title' => 'About',
                    'icon' => 'sparkles',
                    'description' => 'Discover the philosophy and mission behind FLVRTX.',
                    'url' => home_url('/about'),
                ],
                [
                    'title' => 'Search',
                    'icon' => 'search',
                    'description' => 'Quickly find recipes, articles, videos, and recommendations.',
                    'url' => home_url('/?s='),
                ],
            ];
        @endphp

        <div class="mt-16 grid gap-8 md:grid-cols-2 xl:grid-cols-3">

            @foreach($categories as $category)

                <a
                    href="{{ $category['url'] }}"
                    class="group">

                    <x-ui.card class="flex h-full flex-col">

                        <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-primary/10 transition-all duration-300 group-hover:bg-primary">

                            <i
                                data-lucide="{{ $category['icon'] }}"
                                class="h-8 w-8 text-primary transition-all duration-300 group-hover:scale-110 group-hover:text-white">
                            </i>

                        </div>

                        <h3 class="mt-8 text-2xl font-bold tracking-tight transition-colors duration-300 group-hover:text-primary">

                            {{ $category['title'] }}

                        </h3>

                        <p class="mt-5 flex-1 leading-8 text-text-muted">

                            {{ $category['description'] }}

                        </p>

                        <div class="mt-8 flex items-center gap-2 font-semibold text-primary">

                            <span>

                                Explore

                            </span>

                            <i
                                data-lucide="arrow-right"
                                class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1">
                            </i>

                        </div>

                    </x-ui.card>

                </a>

            @endforeach

        </div>

    </x-container>

</section>