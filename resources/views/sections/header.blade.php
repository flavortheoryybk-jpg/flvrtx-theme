<header
    x-data="{ mobileMenu: false }"
    x-init="$watch('mobileMenu', value => document.body.classList.toggle('overflow-hidden', value))"
    @keydown.escape.window="mobileMenu = false"
    class="sticky top-0 z-50 border-b border-border bg-white/90 backdrop-blur-lg">

    <x-container>

        <div class="flex h-20 items-center justify-between">

            {{-- Logo --}}
            <a href="{{ home_url('/') }}">
                <x-logo />
            </a>

            {{-- Desktop Navigation --}}
            <nav class="hidden lg:block">

                @if (has_nav_menu('primary_navigation'))

                    {!! wp_nav_menu([
                        'theme_location' => 'primary_navigation',
                        'menu_class' => 'flex items-center gap-8 text-sm font-medium',
                        'container' => false,
                        'echo' => false,
                    ]) !!}

                @endif

            </nav>

            {{-- Desktop Search --}}
            <div class="hidden items-center gap-3 lg:flex">

                <a
                    href="{{ home_url('/?s=') }}"
                    class="rounded-xl border border-border px-5 py-2.5 font-medium transition hover:border-primary hover:bg-primary hover:text-white">

                    🔍 Search

                </a>

            </div>

            {{-- Mobile Hamburger --}}
            <button
                @click="mobileMenu = true"
                class="flex h-10 w-10 items-center justify-center rounded-xl border border-border transition hover:bg-primary hover:text-white lg:hidden">

                ☰

            </button>

        </div>

    </x-container>

    {{-- Overlay --}}
    <div
        x-show="mobileMenu"
        x-transition.opacity
        @click="mobileMenu = false"
        class="fixed inset-0 z-40 bg-black/50"
        style="display:none">

    </div>

    {{-- Mobile Menu --}}
    <aside
        x-show="mobileMenu"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        @click.outside="mobileMenu = false"
        class="fixed right-0 top-0 z-50 flex h-screen w-80 flex-col bg-white shadow-2xl"
        style="display:none">

        <div class="flex items-center justify-between border-b border-border p-6">

            <x-logo />

            <button
                @click="mobileMenu = false"
                class="text-3xl leading-none">

                ×

            </button>

        </div>

        <nav class="flex-1 p-6">

            @if (has_nav_menu('primary_navigation'))

                {!! wp_nav_menu([
                    'theme_location' => 'primary_navigation',
                    'menu_class' => 'space-y-6 text-lg font-semibold',
                    'container' => false,
                    'echo' => false,
                ]) !!}

            @endif

            <a
                href="{{ home_url('/?s=') }}"
                class="mt-8 inline-flex rounded-xl border border-border px-5 py-3 font-medium">

                🔍 Search

            </a>

        </nav>

        <div class="border-t border-border p-6">

            <p class="text-sm text-text-muted">

                © {{ date('Y') }} FLVRTX

            </p>

        </div>

    </aside>

</header>