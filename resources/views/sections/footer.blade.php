<footer class="border-t border-border bg-white">

    <x-container>

        <div class="grid gap-16 py-24 lg:grid-cols-[1.5fr_1fr_1fr_1fr]">

            {{-- Brand --}}
            <div>

                <x-logo />

                <p class="mt-6 max-w-md leading-8 text-text-muted">
                    FLVRTX is a premium food education platform dedicated to recipes, food science, wellness, and trusted recommendations—helping you understand food and cook with confidence.
                </p>

                <div class="mt-8 flex flex-wrap items-center gap-3 text-sm font-medium text-text-muted">

                    <span>🍽 Recipes</span>

                    <span>•</span>

                    <span>🧪 Learn</span>

                    <span>•</span>

                    <span>🎥 Watch</span>

                    <span>•</span>

                    <span>⭐ Reviews</span>

                </div>

            </div>

            {{-- Explore --}}
            <div>

                <h3 class="text-lg font-bold">
                    Explore
                </h3>

                <ul class="mt-6 space-y-4">

                    <li><a href="{{ home_url('/recipes') }}" class="transition-colors duration-300 transition-colors duration-300 hover:text-primary">Recipes</a></li>

                    <li><a href="{{ home_url('/learn') }}" class="transition-colors duration-300 transition-colors duration-300 hover:text-primary">Learn</a></li>

                    <li><a href="{{ home_url('/watch') }}" class="transition-colors duration-300 transition-colors duration-300 hover:text-primary">Watch</a></li>

                    <li><a href="{{ home_url('/wellness') }}" class="transition-colors duration-300 transition-colors duration-300 hover:text-primary">Wellness</a></li>

                    <li><a href="{{ home_url('/shop') }}" class="transition-colors duration-300 transition-colors duration-300 hover:text-primary">Recommendations</a></li>

                </ul>

            </div>

            {{-- Company --}}
            <div>

                <h3 class="text-lg font-bold">
                    Company
                </h3>

                <ul class="mt-6 space-y-4">

                    <li><a href="{{ home_url('/about') }}" class="transition-colors duration-300 transition-colors duration-300 hover:text-primary">About</a></li>

                    <li><a href="{{ home_url('/contact') }}" class="transition-colors duration-300 transition-colors duration-300 hover:text-primary">Contact</a></li>

                    <li><a href="{{ home_url('/privacy-policy') }}" class="transition-colors duration-300 transition-colors duration-300 hover:text-primary">Privacy Policy</a></li>

                    <li><a href="{{ home_url('/terms-of-service') }}" class="transition-colors duration-300 transition-colors duration-300 hover:text-primary">Terms of Service</a></li>

                </ul>

            </div>

            {{-- Follow --}}
            <div>

                <h3 class="text-lg font-bold">
                    Follow
                </h3>

                <ul class="mt-6 space-y-4">

                    <li>
                        <a
                            href="https://www.youtube.com/@FLVRTX"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="transition-colors duration-300 transition-colors duration-300 hover:text-primary">

                            YouTube

                        </a>
                    </li>

                    <li>
                        <a
                            href="https://www.instagram.com/flavortheory_flvrtx/?hl=en"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="transition-colors duration-300 transition-colors duration-300 hover:text-primary">

                            Instagram

                        </a>
                    </li>

                    <li>
                        <a
                            href="https://in.pinterest.com/flavortheory/"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="transition-colors duration-300 transition-colors duration-300 hover:text-primary">

                            Pinterest

                        </a>
                    </li>

                </ul>

            </div>

        </div>

        <div class="flex flex-col items-center justify-between gap-4 border-t border-border py-8 text-sm text-text-muted md:flex-row">

            <p>
                © {{ date('Y') }} FLVRTX. All rights reserved.
            </p>

            <p class="text-center md:text-right">
                Understand Food. Cook With Confidence.
            </p>

        </div>

    </x-container>

</footer>