@extends('layouts.app')

@section('content')

    {{-- Login Hero --}}
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
                        Welcome Back
                    </x-ui.pill>

                    <h1 class="mt-8 text-5xl font-bold tracking-tight sm:text-6xl">

                        Welcome Back to FLVRTX.

                    </h1>

                    <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-text-muted">

                        Sign in to continue your FLVRTX journey and keep
                        discovering better ways to understand food.

                    </p>

                </div>


                {{-- Login Card --}}
                <div class="mt-12 rounded-[32px] bg-white p-8 shadow-xl ring-1 ring-border/10 sm:p-10">

                    <form
                        method="POST"
                        action="{{ esc_url(admin_url('admin-post.php')) }}"
                        class="space-y-6">
                    
                        <input
                            type="hidden"
                            name="action"
                            value="flvrtx_login">
                    
                        <input
                            type="hidden"
                            name="redirect_to"
                            value="{{ esc_url($_GET['redirect_to'] ?? home_url('/')) }}">
                    
                        {!! wp_nonce_field('flvrtx_login', 'flvrtx_login_nonce', true, false) !!}


                        {{-- Email --}}
                        <div>

                            <label
                                for="login-email"
                                class="block text-sm font-semibold text-text">

                                Email

                            </label>

                            <input
                                id="login-email"
                                type="email"
                                name="email"
                                required
                                autocomplete="email"
                                class="mt-2 block w-full rounded-2xl border border-border bg-background px-5 py-4 text-text outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20"
                                placeholder="you@example.com">

                        </div>


                        {{-- Password --}}
                        <div>

                            <div class="flex items-center justify-between">

                                <label
                                    for="login-password"
                                    class="block text-sm font-semibold text-text">

                                    Password

                                </label>

                                <a
                                    href="{{ home_url('/forgot-password') }}"
                                    class="text-sm font-semibold text-primary hover:underline">

                                    Forgot password?

                                </a>

                            </div>

                            <input
                                id="login-password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                class="mt-2 block w-full rounded-2xl border border-border bg-background px-5 py-4 text-text outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20"
                                placeholder="Enter your password">

                        </div>


                        {{-- Remember Me --}}
                        <label class="flex items-center gap-3 text-sm text-text-muted">

                            <input
                                type="checkbox"
                                name="remember"
                                value="1"
                                class="h-4 w-4 rounded border-border text-primary focus:ring-primary">

                            <span>
                                Remember me
                            </span>

                        </label>


                        {{-- Submit --}}
                        <button
                            type="submit"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-primary px-7 py-4 text-sm font-semibold text-white shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:bg-primary/90">

                            Sign In

                            <i
                                data-lucide="arrow-right"
                                class="h-5 w-5">
                            </i>

                        </button>

                    </form>


                    {{-- Register --}}
                    <div class="mt-8 border-t border-border/20 pt-8 text-center">

                        <p class="text-sm text-text-muted">

                            Don't have a FLVRTX account?

                            <a
                                href="{{ home_url('/join') }}"
                                class="font-semibold text-primary hover:underline">

                                Join FLVRTX

                            </a>

                        </p>

                    </div>

                </div>

            </div>

        </x-container>

    </section>

@endsection