@extends('layouts.app')

@section('content')

<x-ui.section>

    <div class="mx-auto max-w-4xl text-center">

        <x-ui.badge>

            Error 404

        </x-ui.badge>

        <h1 class="mt-8 text-6xl font-black tracking-tight text-primary">

            Page Not Found

        </h1>

        <p class="mx-auto mt-8 max-w-2xl text-xl leading-8 text-text-muted">

            Sorry, the page you're looking for doesn't exist or may have been moved.
            Explore recipes, food science, videos, and trusted recommendations instead.

        </p>

        {{-- Search --}}
        <div class="mx-auto mt-12 max-w-2xl">

            <form
                action="{{ home_url('/') }}"
                method="get"
                class="flex flex-col gap-4 rounded-[28px] border border-border bg-white p-4 shadow-[0_20px_40px_rgba(0,0,0,0.06)] sm:flex-row">

                <div class="relative flex-1">

                    <i
                        data-lucide="search"
                        class="absolute left-5 top-1/2 h-5 w-5 -translate-y-1/2 text-text-muted">
                    </i>

                    <input
                        type="search"
                        name="s"
                        placeholder="Search FLVRTX..."
                        class="w-full border-0 bg-transparent py-4 pl-12 pr-4 outline-none">

                </div>

                <x-ui.button
                    type="submit"
                    size="lg">

                    Search

                </x-ui.button>

            </form>

        </div>

        {{-- Quick Links --}}
        <div class="mt-14 flex flex-wrap justify-center gap-4">

            <x-ui.button href="{{ home_url('/recipes') }}">

                Recipes

            </x-ui.button>

            <x-ui.button
                href="{{ home_url('/learn') }}"
                variant="secondary">

                Learn

            </x-ui.button>

            <x-ui.button
                href="{{ home_url('/watch') }}"
                variant="secondary">

                Watch

            </x-ui.button>

            <x-ui.button
                href="{{ home_url('/recommendations') }}"
                variant="secondary">

                Recommendations

            </x-ui.button>

            <x-ui.button
                href="{{ home_url('/') }}"
                variant="secondary">

                Home

            </x-ui.button>

        </div>

    </div>

</x-ui.section>

@endsection