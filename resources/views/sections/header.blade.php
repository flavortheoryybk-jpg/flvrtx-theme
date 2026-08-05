<header
    x-data="{ mobileMenu: false }"
    x-init="$watch('mobileMenu', value => document.body.classList.toggle('overflow-hidden', value))"
    @keydown.escape.window="mobileMenu = false"
    class="sticky top-0 z-50 border-b border-border bg-white/90 backdrop-blur-xl">

    <x-container>

        <div class="flex h-[88px] items-center justify-between">

            {{-- Logo --}}
            <x-logo />

            {{-- Desktop Navigation --}}
            <nav
                class="hidden lg:block"
                aria-label="Primary Navigation">

                @if(has_nav_menu('primary_navigation'))

                    {!! wp_nav_menu([
                        'theme_location' => 'primary_navigation',
                        'menu_class'     => 'nav-menu',
                        'container'      => false,
                        'echo'           => false,
                    ]) !!}

                @endif

            </nav>

            {{-- Desktop Search --}}
            <div class="hidden lg:flex">

                <x-ui.button
                    type="button"
                    variant="secondary"
                    class="gap-3 rounded-2xl px-6"
                    @click="$dispatch('open-search')">

                    <i data-lucide="search" class="h-5 w-5"></i>

                    Search

                </x-ui.button>

            </div>

            {{-- Mobile Menu Button --}}
            <button
                type="button"
                @click="
                    mobileMenu = true;
                    $nextTick(() => window.createIcons())
                "
                aria-label="Open menu"
                class="flex h-11 w-11 items-center justify-center rounded-2xl border border-border transition-all duration-300 hover:border-primary hover:bg-primary hover:text-white lg:hidden">

                <i data-lucide="menu" class="h-6 w-6"></i>

            </button>

        </div>

    </x-container>

    {{-- Overlay --}}
    <div
        x-show="mobileMenu"
        x-transition.opacity
        @click="mobileMenu = false"
        class="fixed inset-0 z-40 bg-black/50 backdrop-blur-sm"
        style="display:none">

    </div>

    {{-- Mobile Drawer --}}
    <aside
        x-show="mobileMenu"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        @click.outside="mobileMenu = false"
        class="fixed right-0 top-0 z-50 flex h-screen w-80 max-w-[90vw] flex-col bg-white shadow-2xl"
        style="display:none">

        {{-- Drawer Header --}}
        <div class="flex items-center justify-between border-b border-border p-6">

            <x-logo />

            <button
                type="button"
                @click="
                    mobileMenu = false;
                    $nextTick(() => window.createIcons())
                "
                aria-label="Close menu"
                class="rounded-xl p-2 transition hover:bg-background">

                <i data-lucide="x" class="h-6 w-6"></i>

            </button>

        </div>

        {{-- Navigation --}}
        <nav
            class="flex-1 p-6"
            aria-label="Mobile Navigation">

            @if(has_nav_menu('primary_navigation'))

                {!! wp_nav_menu([
                    'theme_location' => 'primary_navigation',
                    'menu_class'     => 'nav-menu mobile',
                    'container'      => false,
                    'echo'           => false,
                ]) !!}

            @endif

            <x-ui.button
                type="button"
                variant="secondary"
                class="mt-8 w-full justify-center"
                @click="
                    mobileMenu = false;
                    $dispatch('open-search')
                ">

                <i data-lucide="search" class="h-5 w-5"></i>

                Search

            </x-ui.button>

        </nav>

        {{-- Footer --}}
        <div class="border-t border-border p-6">

            <p class="text-sm text-text-muted">

                © {{ date('Y') }} FLVRTX

            </p>

        </div>

    </aside>

</header>