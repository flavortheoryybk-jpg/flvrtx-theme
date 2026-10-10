<header
    x-data="{ mobileMenu: false }"
    x-init="$watch('mobileMenu', value => document.body.classList.toggle('overflow-hidden', value))"
    @keydown.escape.window="mobileMenu = false"
    class="sticky top-[var(--wp-admin--admin-bar--height,0px)] z-50 border-b border-border bg-white/90 backdrop-blur-xl">

    <x-container>

        <div class="flex h-[88px] items-center gap-2 md:gap-3 lg:gap-4">

            {{-- Logo --}}
            <div class="shrink-0">

                <x-logo />

            </div>


            {{-- Desktop Navigation --}}
            
            <nav
                class="hidden min-w-0 flex-1 md:block"
                aria-label="Primary Navigation">


                @if(has_nav_menu('primary_navigation'))

                    {!! wp_nav_menu([
                        'theme_location' => 'primary_navigation',
                        'menu_class' => 'nav-menu md:gap-2 md:text-xs lg:gap-4 lg:text-sm',
                        'container'      => false,
                        'echo'           => false,
                    ]) !!}

                @endif

            </nav>

            {{-- Desktop Actions --}}
            
            <div class="hidden shrink-0 items-center gap-1 md:flex md:gap-1 lg:gap-3">

            {{-- Search --}}
            <x-ui.button
                type="button"
                variant="secondary"
                class="shrink-0 gap-1 rounded-2xl px-2 py-2 text-[11px] whitespace-nowrap md:gap-1 md:px-2 md:py-2 md:text-[11px] lg:gap-3 lg:px-5 lg:py-3 lg:text-sm"
                @click="$dispatch('open-search')">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="h-4 w-4 lg:h-5 lg:w-5"
                    aria-hidden="true">

                    <circle cx="11" cy="11" r="7"></circle>
                    <path d="m20 20-3.5-3.5"></path>

                </svg>

                Search

            </x-ui.button>


            {{-- Member CTA --}}
            @if(is_user_logged_in())

                <a
                    href="{{ home_url('/my-flvrtx') }}"
                    class="inline-flex shrink-0 items-center justify-center gap-1 rounded-2xl bg-primary px-2 py-2 text-[10px] font-semibold text-white transition-all duration-300 hover:-translate-y-0.5 hover:bg-primary/90 md:gap-1 md:px-3 md:py-2 md:text-[11px] lg:gap-2 lg:px-5 lg:py-3 lg:text-sm">

                    My FLVRTX

                    <i
                        data-lucide="arrow-right"
                        class="h-4 w-4">
                    </i>

                </a>

            @else

                <a
                    href="{{ home_url('/join') }}"
                    class="inline-flex shrink-0 items-center justify-center gap-1 rounded-2xl bg-primary px-2 py-2 text-[10px] font-semibold text-white transition-all duration-300 hover:-translate-y-0.5 hover:bg-primary/90 md:gap-1 md:px-3 md:py-2 md:text-[11px] lg:gap-2 lg:px-5 lg:py-3 lg:text-sm">

                    Join FLVRTX

                    <i
                        data-lucide="arrow-right"
                        class="h-4 w-4">
                    </i>

                </a>

            @endif

        </div>


            {{-- Mobile Menu Button --}}
            <button
                type="button"
                @click="
                    mobileMenu = true;
                    $nextTick(() => window.createIcons())
                "
                aria-label="Open menu"
                
                class="ml-auto flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl border border-border transition-all duration-300 hover:border-primary hover:bg-primary hover:text-white md:hidden">

                <i
                    data-lucide="menu"
                    class="h-6 w-6">
                </i>

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

                <i
                    data-lucide="x"
                    class="h-6 w-6">
                </i>

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

                <i
                    data-lucide="search"
                    class="h-5 w-5">
                </i>

                Search

            </x-ui.button>
            @if(is_user_logged_in())

                <a
                    href="{{ home_url('/my-flvrtx') }}"
                    class="mt-4 inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-primary px-6 py-4 text-sm font-semibold text-white transition-all duration-300 hover:bg-primary/90">

                    My FLVRTX

                    <i
                        data-lucide="arrow-right"
                        class="h-5 w-5">
                    </i>

                </a>

            @else

                <a
                    href="{{ home_url('/join') }}"
                    class="mt-4 inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-primary px-6 py-4 text-sm font-semibold text-white transition-all duration-300 hover:bg-primary/90">

                    Join FLVRTX

                    <i
                        data-lucide="arrow-right"
                        class="h-5 w-5">
                    </i>

                </a>

            @endif

        </nav>


        {{-- Footer --}}
        <div class="border-t border-border p-6">

            <p class="text-sm text-text-muted">

                © {{ date('Y') }} FLVRTX

            </p>

        </div>

    </aside>

</header>