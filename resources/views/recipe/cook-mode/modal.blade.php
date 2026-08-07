@php
    $steps = collect(
        preg_split('/\r\n|\r|\n/', get_field('instructions') ?? '')
    )->filter()->values();
@endphp

<div
    x-cloak
    x-show="$store.cookMode.open"
    x-transition.opacity
    @keydown.escape.window="$store.cookMode.close()"
    @keydown.right.window="$store.cookMode.next()"
    @keydown.left.window="$store.cookMode.previous()"
    class="fixed inset-0 z-[9999] bg-black/90"
    style="display:none;"
>

    <div class="flex h-screen flex-col bg-background">

        {{-- Header --}}
        <div class="border-b border-border bg-white">

            <div class="mx-auto flex max-w-6xl items-center justify-between px-8 py-6">

                <div>

                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-primary">

                        Cook Mode

                    </p>

                    <h2 class="mt-2 text-3xl font-bold">

                        {{ get_the_title() }}

                    </h2>

                </div>

                <button
                    @click="$store.cookMode.close()"
                    class="rounded-2xl border border-border p-3 transition hover:border-primary">

                    <i data-lucide="x" class="h-6 w-6"></i>

                </button>

            </div>

        </div>

        {{-- Progress --}}
        <div class="border-b border-border bg-white">

            <div class="mx-auto max-w-6xl px-8 py-6">

                <div class="mb-4 flex items-center justify-between">

                    <span class="font-semibold">

                        Step

                        <span x-text="$store.cookMode.current+1"></span>

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
                        :style="'width:'+$store.cookMode.progress()+'%'">

                    </div>

                </div>

            </div>

        </div>

        {{-- Step --}}
        <div class="flex flex-1 items-center justify-center px-10">

            <div class="mx-auto max-w-5xl text-center">

                <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-primary text-3xl font-bold text-white">

                    <span x-text="$store.cookMode.current+1"></span>

                </div>

                <p
                    class="mt-12 text-3xl font-semibold leading-relaxed lg:text-6xl"
                    x-text="$store.cookMode.steps[$store.cookMode.current]">

                </p>

            </div>

        </div>

        {{-- Footer --}}
        <div class="border-t border-border bg-white">

            <div class="mx-auto flex max-w-6xl items-center justify-between p-8">

                <button
                    @click="$store.cookMode.previous()"
                    :disabled="$store.cookMode.current===0"
                    class="rounded-2xl border border-border px-6 py-3 font-semibold disabled:cursor-not-allowed disabled:opacity-40">

                    ← Previous

                </button>

                <template x-if="$store.cookMode.current < $store.cookMode.steps.length-1">

                    <button
                        @click="$store.cookMode.next()"
                        class="rounded-2xl bg-primary px-6 py-3 font-semibold text-white">

                        Next →

                    </button>

                </template>

                <template x-if="$store.cookMode.current === $store.cookMode.steps.length-1">

                    <button
                        @click="$store.cookMode.close()"
                        class="rounded-2xl bg-green-600 px-6 py-3 font-semibold text-white">

                        Finish 🎉

                    </button>

                </template>

            </div>

        </div>

    </div>

</div>