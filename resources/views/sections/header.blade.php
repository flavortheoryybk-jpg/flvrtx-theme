<header
    class="sticky top-0 z-50 border-b border-border bg-white/80 backdrop-blur-md">

    <x-container>

        <div class="flex h-20 items-center justify-between">

            {{-- Logo --}}
            <a href="{{ home_url('/') }}"
               class="text-2xl font-bold tracking-tight text-primary">

                FLVRTX

            </a>

            {{-- Desktop Navigation --}}
            <nav class="hidden lg:flex">

    @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu([
            'theme_location' => 'primary_navigation',
            'menu_class' => 'flex items-center gap-8',
            'container' => false,
            'echo' => false,
        ]) !!}
    @endif

</nav>

            {{-- Right Side --}}
            <div class="flex items-center gap-4">

                <button
                    class="hidden md:flex rounded-full border border-border px-4 py-2 text-sm hover:border-primary">

                    Search

                </button>

                <button
                    class="lg:hidden rounded-md p-2">

                    ☰

                </button>

            </div>

        </div>

    </x-container>

</header>