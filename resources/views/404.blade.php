@extends('layouts.app')

@section('content')

<x-ui.section>

    <div class="mx-auto max-w-3xl text-center">

        <div class="text-8xl font-black text-primary">

            404

        </div>

        <h1 class="mt-8 text-5xl font-bold">

            Page Not Found

        </h1>

        <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-text-muted">

            The page you're looking for doesn't exist or may have been moved.
            Explore our latest recipes, food science articles, videos, or recommendations.

        </p>

        <div class="mt-12 flex flex-wrap justify-center gap-4">

            <a href="{{ home_url('/recipes') }}"
               class="rounded-xl bg-primary px-6 py-3 font-semibold text-white">

                Explore Recipes

            </a>

            <a href="{{ home_url('/learn') }}"
               class="rounded-xl border border-border px-6 py-3 font-semibold">

                Learn Food Science

            </a>

            <a href="{{ home_url('/watch') }}"
               class="rounded-xl border border-border px-6 py-3 font-semibold">

                Watch Videos

            </a>

            <a href="{{ home_url('/') }}"
               class="rounded-xl border border-border px-6 py-3 font-semibold">

                Go Home

            </a>

        </div>

    </div>

</x-ui.section>

@endsection