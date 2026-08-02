<section class="py-20">
    <x-container>

        <div class="mb-12">
            <h2 class="text-4xl font-bold">Explore FLVRTX</h2>
            <p class="mt-3 text-text-muted">
                Discover every part of Flavor Theory.
            </p>
        </div>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

            @php
                $categories = [
    [
        'title' => 'Recipes',
        'icon' => '🍛',
        'url' => home_url('/recipes'),
    ],
    [
        'title' => 'Wellness',
        'icon' => '🥗',
        'url' => home_url('/wellness'),
    ],
    [
        'title' => 'Learn',
        'icon' => '📚',
        'url' => home_url('/learn'),
    ],
    [
        'title' => 'Watch',
        'icon' => '🎥',
        'url' => home_url('/watch'),
    ],
    [
        'title' => 'Shop',
        'icon' => '🛒',
        'url' => home_url('/shop'),
    ],
    [
        'title' => 'About',
        'icon' => '👨',
        'url' => home_url('/about'),
    ],
  ];
            @endphp

            @foreach($categories as $category)

                <a href="{{ $category['url'] }}"
   class="group rounded-2xl border border-border bg-white p-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                    <div class="text-4xl">
                        {{ $category['icon'] }}
                    </div>

                    <h3 class="mt-6 text-2xl font-semibold">
                        {{ $category['title'] }}
                    </h3>

                    <p class="mt-3 text-text-muted">
                        Explore {{ strtolower($category['title']) }} content.
                    </p>

                </a>

            @endforeach

        </div>

    </x-container>
</section>