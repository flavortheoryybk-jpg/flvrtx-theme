<header
    class="sticky top-0 z-50 border-b border-border bg-white/90 backdrop-blur-lg">

    <x-container>

        <div class="flex h-20 items-center justify-between">

            {{-- Logo --}}
            <x-logo />

            {{-- Desktop Navigation --}}
            <nav class="hidden lg:block">

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
            <div class="flex items-center gap-3">

                <a
                    href="{{ home_url('/?s=') }}"
                    class="hidden md:inline-flex items-center rounded-xl border border-border px-5 py-2.5 font-medium transition-all duration-300 hover:border-primary hover:bg-primary hover:text-white">

                    🔍 Search

                </a>

                <button
                    class="flex h-10 w-10 items-center justify-center rounded-xl border border-border transition hover:bg-primary hover:text-white lg:hidden">

                    ☰

                </button>

            </div>

        </div>

    </x-container>

</header>