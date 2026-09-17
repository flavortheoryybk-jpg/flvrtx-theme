@extends('layouts.app')

@section('content')

    {{-- Join Hero --}}
    <section class="relative overflow-hidden bg-background py-20 lg:py-28">

        <div class="absolute inset-0 -z-10 overflow-hidden">

            <div class="absolute -left-40 top-0 h-96 w-96 rounded-full bg-primary/5 blur-3xl"></div>

            <div class="absolute -right-40 bottom-0 h-96 w-96 rounded-full bg-primary/5 blur-3xl"></div>

        </div>

        <x-container>

            <div class="mx-auto max-w-2xl">

                {{-- Heading --}}
                <div class="text-center">

                    <x-ui.pill>
                        Join FLVRTX
                    </x-ui.pill>

                    <h1 class="mt-8 text-5xl font-bold tracking-tight sm:text-6xl">

                        Join the FLVRTX Journey.

                    </h1>

                    <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-text-muted">

                        Become part of a growing community that wants to
                        understand food, cook better, and discover why
                        things work in the kitchen.

                    </p>

                </div>


                {{-- Registration Card --}}
                <div class="mt-12 rounded-[32px] bg-white p-8 shadow-xl ring-1 ring-border/10 sm:p-10">

                    <form
                        method="POST"
                        action="{{ esc_url(admin_url('admin-post.php')) }}"
                        class="space-y-6">

                        <input type="hidden" name="action" value="flvrtx_register">

                        {!! wp_nonce_field('flvrtx_register', 'flvrtx_register_nonce', true, false) !!}

                        {{-- Name --}}
                        <div>

                            <label
                                for="join-name"
                                class="block text-sm font-semibold text-text">

                                Name

                            </label>

                            <input
                                id="join-name"
                                type="text"
                                name="name"
                                required
                                autocomplete="name"
                                class="mt-2 block w-full rounded-2xl border border-border bg-background px-5 py-4 text-text outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20"
                                placeholder="Your name">

                        </div>


                        {{-- Email --}}
                        <div>

                            <label
                                for="join-email"
                                class="block text-sm font-semibold text-text">

                                Email

                            </label>

                            <input
                                id="join-email"
                                type="email"
                                name="email"
                                required
                                autocomplete="email"
                                class="mt-2 block w-full rounded-2xl border border-border bg-background px-5 py-4 text-text outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20"
                                placeholder="you@example.com">

                        </div>


                        {{-- Password --}}
                        <div>

                            <label
                                for="join-password"
                                class="block text-sm font-semibold text-text">

                                Password

                            </label>

                            <input
                                id="join-password"
                                type="password"
                                name="password"
                                required
                                minlength="8"
                                autocomplete="new-password"
                                class="mt-2 block w-full rounded-2xl border border-border bg-background px-5 py-4 text-text outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20"
                                placeholder="At least 8 characters">

                        </div>


                        {{-- Submit --}}
                        <button
                            type="submit"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-primary px-7 py-4 text-sm font-semibold text-white shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:bg-primary/90">

                            Join FLVRTX for free

                            <i
                                data-lucide="arrow-right"
                                class="h-5 w-5">
                            </i>

                        </button>

                    </form>


                    {{-- Existing Member --}}
                    <div class="mt-8 border-t border-border/20 pt-8 text-center">

                        <p class="text-sm text-text-muted">

                            Already part of FLVRTX?

                            <a
                                href="{{ home_url('/login') }}"
                                class="font-semibold text-primary hover:underline">

                                Sign in

                            </a>

                        </p>

                    </div>

                </div>

            </div>

        </x-container>

    </section>

@endsection