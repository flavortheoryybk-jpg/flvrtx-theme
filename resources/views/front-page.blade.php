@extends('layouts.app')

@section('content')

<section class="bg-background py-24 lg:py-36">
    <x-container>

        <div class="grid items-center gap-16 lg:grid-cols-2">

            {{-- Left Content --}}
            <div>

                <span class="inline-flex rounded-full border border-primary/20 bg-primary/5 px-4 py-2 text-sm font-medium text-primary">
                    Premium Food Education
                </span>

                <h1 class="mt-6 text-5xl font-bold leading-tight text-text lg:text-7xl">
                    The Science Behind Great Food
                </h1>

                <p class="mt-6 max-w-xl text-lg leading-8 text-text-muted">
                    Discover recipes, food science, wellness and cooking techniques through
                    premium visuals, research-backed content and practical experiments.
                </p>

                <div class="mt-10 flex flex-wrap gap-4">

                    <a href="#"
                       class="rounded-xl bg-primary px-8 py-4 font-semibold text-white transition hover:bg-primary-dark">
                        Explore Recipes
                    </a>

                    <a href="#"
                       class="rounded-xl border border-border bg-white px-8 py-4 font-semibold transition hover:bg-gray-50">
                        Watch on YouTube
                    </a>

                </div>

            </div>

            {{-- Right Content --}}
            <div class="flex justify-center">

                <div class="aspect-square w-full max-w-md rounded-3xl bg-gradient-to-br from-primary/15 to-accent/15 border border-border shadow-lg flex items-center justify-center">

                    <span class="text-lg text-text-muted">
                        Hero Image
                    </span>

                </div>

            </div>

        </div>

    </x-container>
</section>

@endsection