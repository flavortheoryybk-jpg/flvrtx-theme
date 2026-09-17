@extends('layouts.app')

@section('content')

    @php
        $key = isset($_GET['key'])
            ? sanitize_text_field(wp_unslash($_GET['key']))
            : '';

        $login = isset($_GET['login'])
            ? sanitize_user(wp_unslash($_GET['login']))
            : '';

        $user = null;
        $reset_error = false;

        if ($key && $login) {
            $user = check_password_reset_key($key, $login);

            if (is_wp_error($user)) {
                $reset_error = true;
            }
        } else {
            $reset_error = true;
        }
    @endphp

    <section class="relative overflow-hidden bg-background py-20 lg:py-28">

        <x-container>

            <div class="mx-auto max-w-2xl">

                <div class="text-center">

                    <x-ui.pill>
                        Account Recovery
                    </x-ui.pill>

                    <h1 class="mt-8 text-5xl font-bold tracking-tight sm:text-6xl">

                        Create a New Password.

                    </h1>

                    <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-text-muted">

                        Choose a new password for your FLVRTX account.

                    </p>

                </div>

                @if($reset_error)

                    <div class="mt-12 rounded-[32px] bg-white p-8 text-center shadow-xl ring-1 ring-border/10 sm:p-10">

                        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-primary/10">

                            <i
                                data-lucide="link"
                                class="h-7 w-7 text-primary">
                            </i>

                        </div>

                        <h2 class="mt-6 text-2xl font-bold">

                            This reset link is no longer valid.

                        </h2>

                        <p class="mt-3 leading-7 text-text-muted">

                            Please request a new password reset link.

                        </p>

                        <a
                            href="{{ home_url('/forgot-password') }}"
                            class="mt-8 inline-flex items-center justify-center rounded-2xl bg-primary px-7 py-4 text-sm font-semibold text-white">

                            Request New Link

                        </a>

                    </div>

                @else

                    <div class="mt-12 rounded-[32px] bg-white p-8 shadow-xl ring-1 ring-border/10 sm:p-10">

                        <form
                            method="POST"
                            action="{{ esc_url(admin_url('admin-post.php')) }}"
                            class="space-y-6">

                            <input
                                type="hidden"
                                name="action"
                                value="flvrtx_reset_password">

                            <input
                                type="hidden"
                                name="key"
                                value="{{ esc_attr($key) }}">

                            <input
                                type="hidden"
                                name="login"
                                value="{{ esc_attr($login) }}">

                            {!! wp_nonce_field('flvrtx_reset_password', 'flvrtx_reset_password_nonce', true, false) !!}

                            <div>

                                <label
                                    for="reset-password"
                                    class="block text-sm font-semibold text-text">

                                    New Password

                                </label>

                                <input
                                    id="reset-password"
                                    type="password"
                                    name="password"
                                    required
                                    minlength="8"
                                    autocomplete="new-password"
                                    class="mt-2 block w-full rounded-2xl border border-border bg-background px-5 py-4 text-text outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20"
                                    placeholder="At least 8 characters">

                            </div>

                            <div>

                                <label
                                    for="reset-password-confirm"
                                    class="block text-sm font-semibold text-text">

                                    Confirm Password

                                </label>

                                <input
                                    id="reset-password-confirm"
                                    type="password"
                                    name="password_confirm"
                                    required
                                    minlength="8"
                                    autocomplete="new-password"
                                    class="mt-2 block w-full rounded-2xl border border-border bg-background px-5 py-4 text-text outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20"
                                    placeholder="Enter your password again">

                            </div>

                            <button
                                type="submit"
                                class="inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-primary px-7 py-4 text-sm font-semibold text-white shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:bg-primary/90">

                                Reset Password

                                <i
                                    data-lucide="arrow-right"
                                    class="h-5 w-5">
                                </i>

                            </button>

                        </form>

                    </div>

                @endif

            </div>

        </x-container>

    </section>

@endsection