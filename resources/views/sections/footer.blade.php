<footer class="border-t border-border bg-background">

    <x-container>

        <div class="grid gap-16 py-20 lg:grid-cols-4">

            {{-- Brand --}}
            <div>

                <x-logo />

                <p class="mt-6 leading-7 text-text-muted">
                    FLVRTX is a premium food education platform exploring recipes, food science, wellness, and cooking techniques to help you understand why food works.
                </p>

            </div>

            {{-- Explore --}}
            <div>

                <h3 class="font-bold">
                    Explore
                </h3>

                <ul class="mt-6 space-y-3">

                        <li>
                            <a href="{{ home_url('/recipes') }}"
                               class="transition-colors duration-300 hover:text-primary">
                                Recipes
                            </a>
                        </li>

                        <li>
                            <a href="{{ home_url('/learn') }}"
                               class="transition-colors duration-300 hover:text-primary">
                                Learn
                            </a>
                        </li>

                        <li>
                            <a href="{{ home_url('/wellness') }}"
                               class="transition-colors duration-300 hover:text-primary">
                                Wellness
                            </a>
                        </li>

                        <li>
                            <a href="{{ home_url('/watch') }}"
                               class="transition-colors duration-300 hover:text-primary">
                                Watch
                            </a>
                        </li>

                </ul>

            </div>

            {{-- Company --}}
            <div>

                <h3 class="font-bold">
                    Company
                </h3>

                <ul class="mt-6 space-y-3">

                    <li>
                        <a href="{{ home_url('/about') }}"
                           class="transition-colors duration-300 hover:text-primary">
                            About
                        </a>
                    </li>

                    <li>
                        <a href="{{ home_url('/contact') }}"
                           class="transition-colors duration-300 hover:text-primary">
                            Contact
                        </a>
                    </li>

                    <li>
                        <a href="{{ home_url('/privacy-policy') }}"
                           class="transition-colors duration-300 hover:text-primary">
                            Privacy Policy
                        </a>
                    </li>

                </ul>

            </div>

            {{-- Social --}}
            <div>

                <h3 class="font-bold">
                    Follow
                </h3>

                <ul class="mt-6 space-y-3">

                    <li>
                        <a href="https://www.youtube.com/@FLVRTX"
                           class="transition-colors duration-300 hover:text-primary"
                           target="_blank">
                            YouTube
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/flavortheory_flvrtx/?hl=en"
                           class="transition-colors duration-300 hover:text-primary"
                           target="_blank">
                            Instagram
                        </a>
                      </li>
                    <li>
                        <a href="https://in.pinterest.com/flavortheory/"
                           class="transition-colors duration-300 hover:text-primary"
                           target="_blank">
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

            <p>
                Understanding food, one recipe at a time.
            </p>

        </div>

    </x-container>

</footer>