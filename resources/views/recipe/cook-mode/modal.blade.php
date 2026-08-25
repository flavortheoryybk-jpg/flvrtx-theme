@php
    $steps = collect(
        preg_split("/\R{2,}/", trim(get_field('instructions') ?? ''))
    )->filter()->values();
@endphp

<div
    x-data
    x-cloak
    x-show="$store.cookMode.open"
    x-transition.opacity.duration.300ms
    x-on:keydown.escape.window="$store.cookMode.close()"
    x-on:keydown.right.window="$store.cookMode.next()"
    x-on:keydown.left.window="$store.cookMode.previous()"
    class="fixed inset-0 z-[9999] bg-black/90"
    style="display:none;"
>

    <div class="flex h-screen flex-col bg-background">

        {{-- Header --}}
        <header class="border-b border-border bg-white">

            <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-5 lg:px-8">

                <div>

                    <p class="text-xs font-semibold uppercase tracking-[0.25em] text-primary">

                        FLVRTX Cook Mode

                    </p>

                    <h2 class="mt-2 text-2xl font-bold lg:text-3xl">

                        {{ get_the_title() }}

                    </h2>

                </div>

                <button
                    x-on:click="$store.cookMode.close()"
                    class="rounded-2xl border border-border p-3 transition hover:border-primary hover:text-primary">

                    <i data-lucide="x" class="h-6 w-6"></i>

                </button>

            </div>

        </header>

        {{-- Progress --}}
        <section class="border-b border-border bg-white">

            <div class="mx-auto max-w-6xl px-6 py-5 lg:px-8">

                <div class="mb-3 flex items-center justify-between">

                    <span class="font-semibold">

                        Step

                        <span x-text="$store.cookMode.current + 1"></span>

                        of

                        <span x-text="$store.cookMode.steps.length"></span>

                    </span>

                    <span class="text-text-muted">

                        <span x-text="Math.round($store.cookMode.progress())"></span>%

                    </span>

                </div>

                <div class="h-2 overflow-hidden rounded-full bg-border">

                    <div
                        class="h-full bg-primary transition-all duration-500"
                        :style="'width:' + $store.cookMode.progress() + '%'">

                    </div>

                </div>

            </div>

        </section>

        {{-- Step --}}
        <main class="flex flex-1 items-center justify-center overflow-y-auto px-6 py-12">

            <div class="mx-auto w-full max-w-5xl">

                <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-primary text-3xl font-bold text-white shadow-lg">

                    <span x-text="$store.cookMode.current + 1"></span>

                </div>

                <div
                    class="mx-auto mt-10 max-w-4xl whitespace-pre-line text-center text-xl leading-10 text-text lg:text-4xl lg:leading-[1.8]"
                    x-text="$store.cookMode.steps[$store.cookMode.current]">

                </div>

            </div>

        </main>

        {{-- Footer --}}
        <footer class="border-t border-border bg-white">

            <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-6 lg:px-8">

                <button
                    x-on:click="$store.cookMode.previous()"
                    :disabled="$store.cookMode.current === 0"
                    class="rounded-2xl border border-border px-6 py-3 font-semibold transition hover:border-primary hover:text-primary disabled:cursor-not-allowed disabled:opacity-40">

                    ← Previous

                </button>

                <template x-if="$store.cookMode.current < $store.cookMode.steps.length - 1">

                    <button
                        x-on:click="$store.cookMode.next()"
                        class="rounded-2xl bg-primary px-8 py-3 font-semibold text-white transition hover:opacity-90">

                        Next →

                    </button>

                </template>

                <template x-if="$store.cookMode.current === $store.cookMode.steps.length - 1">

                    <button
                        x-on:click="$store.cookMode.close()"
                        class="rounded-2xl bg-green-600 px-8 py-3 font-semibold text-white transition hover:bg-green-700">

                        Finish 🎉

                    </button>

                </template>

            </div>

        </footer>

    </div>

</div>