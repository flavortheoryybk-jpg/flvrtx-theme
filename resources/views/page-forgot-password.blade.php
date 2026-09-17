@extends('layouts.app')

@section('content')

    <section class="relative overflow-hidden bg-background py-20 lg:py-28">

        <div class="absolute inset-0 -z-10 overflow-hidden">

            <div class="absolute -left-40 top-0 h-96 w-96 rounded-full bg-primary/5 blur-3xl"></div>

            <div class="absolute -right-40 bottom-0 h-96 w-96 rounded-full bg-primary/5 blur-3xl"></div>

        </div>

        <x-container>

            <div class="mx-auto max-w-2xl">

                <div class="text-center">

                    <x-ui.pill>
                        Account Recovery
                    </x-ui.pill>

                    <h1 class="mt-8 text-5xl font-bold tracking-tight sm:text-6xl">

                        Forgot Your Password?

                    </h1>

                    <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-text-muted">

                        Enter the email address associated with your FLVRTX
                        account and we'll send you a secure password reset link.

                    </p>

                </div>

                @php
                    $reset_status = isset($_GET['reset'])
                        ? sanitize_key(wp_unslash($_GET['reset']))
                        : '';
                @endphp
                
                <div class="mt-12 rounded-[32px] bg-white p-8 shadow-xl ring-1 ring-border/10 sm:p-10">
                
                    @if($reset_status === 'sent')
                
                        {{-- Success --}}
                        <div class="text-center">
                
                            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-primary/10">
                
                                <i
                                    data-lucide="mail-check"
                                    class="h-8 w-8 text-primary">
                                </i>
                
                            </div>
                
                            <h2 class="mt-6 text-2xl font-bold text-text">
                
                                Check Your Email
                
                            </h2>
                
                            <p class="mx-auto mt-4 max-w-md leading-7 text-text-muted">
                
                                If an account exists with that email address,
                                we've sent you a secure password reset link.
                
                            </p>
                
                            <p class="mt-3 text-sm text-text-muted">
                
                                The link may take a few minutes to arrive.
                                Please also check your spam or junk folder.
                
                            </p>
                
                            <a
                                href="{{ home_url('/login') }}"
                                class="mt-8 inline-flex items-center justify-center gap-2 rounded-2xl bg-primary px-7 py-4 text-sm font-semibold text-white shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:bg-primary/90">
                
                                Back to Sign In
                
                                <i
                                    data-lucide="arrow-right"
                                    class="h-5 w-5">
                                </i>
                
                            </a>
                
                        </div>
                
                    @else
                
                        {{-- Reset Form --}}
                        <form
                            method="POST"
                            action="{{ esc_url(admin_url('admin-post.php')) }}"
                            class="space-y-6">
                
                            <input
                                type="hidden"
                                name="action"
                                value="flvrtx_forgot_password">
                
                            {!! wp_nonce_field('flvrtx_forgot_password', 'flvrtx_forgot_password_nonce', true, false) !!}
                
                            <div>
                
                                <label
                                    for="forgot-email"
                                    class="block text-sm font-semibold text-text">
                
                                    Email
                
                                </label>
                
                                <input
                                    id="forgot-email"
                                    type="email"
                                    name="email"
                                    required
                                    autocomplete="email"
                                    class="mt-2 block w-full rounded-2xl border border-border bg-background px-5 py-4 text-text outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20"
                                    placeholder="you@example.com">
                
                            </div>
                
                            <button
                                type="submit"
                                class="inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-primary px-7 py-4 text-sm font-semibold text-white shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:bg-primary/90">
                
                                Send Reset Link
                
                                <i
                                    data-lucide="arrow-right"
                                    class="h-5 w-5">
                                </i>
                
                            </button>
                
                        </form>
                
                    @endif
                
                
                    {{-- Back to Login --}}
                    <div class="mt-8 border-t border-border/20 pt-8 text-center">
                
                        <a
                            href="{{ home_url('/login') }}"
                            class="text-sm font-semibold text-primary hover:underline">
                
                            ← Back to Sign In
                
                        </a>
                
                    </div>
                
                </div>

            </div>

        </x-container>

    </section>

@endsection