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
<section class="py-20">
    <x-container>

        <div class="mb-12">
            <h2 class="text-4xl font-bold">Explore FLVRTX</h2>
            <p class="mt-3 text-text-muted">
                Discover every part of Flavor Theory.
            </p>
        </div>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

            @php
                $categories = [
                    ['Recipes', '🍛'],
                    ['Wellness', '🥗'],
                    ['Food Science', '🧪'],
                    ['Learn', '📚'],
                    ['Watch', '🎥'],
                    ['Shop', '🛒'],
                ];
            @endphp

            @foreach($categories as [$title, $icon])

                <a href="#"
                   class="group rounded-2xl border border-border bg-white p-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                    <div class="text-4xl">
                        {{ $icon }}
                    </div>

                    <h3 class="mt-6 text-2xl font-semibold">
                        {{ $title }}
                    </h3>

                    <p class="mt-3 text-text-muted">
                        Explore {{ strtolower($title) }} content.
                    </p>

                </a>

            @endforeach

        </div>

    </x-container>
</section>
<section class="py-24 bg-white">
    <x-container>

        <div class="flex items-end justify-between mb-12">

            <div>
                <p class="text-primary font-semibold uppercase tracking-wider">
                    Latest
                </p>

                <h2 class="mt-2 text-4xl font-bold">
                    Latest Recipes
                </h2>

                <p class="mt-3 text-text-muted">
                    Fresh recipes from the FLVRTX kitchen.
                </p>
            </div>

            <a href="#"
               class="hidden md:inline-flex text-primary font-semibold hover:underline">
                View All →
            </a>

        </div>

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

            @for ($i = 1; $i <= 3; $i++)

                <article class="overflow-hidden rounded-3xl border border-border bg-background transition hover:-translate-y-1 hover:shadow-xl">

                    <div class="aspect-[4/3] bg-gray-200 flex items-center justify-center">

                        Recipe Image

                    </div>

                    <div class="p-6">

                        <span class="text-sm text-primary font-medium">
                            Andhra Recipe
                        </span>

                        <h3 class="mt-3 text-2xl font-bold">
                            Recipe Title
                        </h3>

                        <p class="mt-3 text-text-muted">
                            Short recipe description goes here.
                        </p>

                        <a href="#"
                           class="mt-6 inline-flex font-semibold text-primary">
                            Read Recipe →
                        </a>

                    </div>

                </article>

            @endfor

        </div>

    </x-container>
</section>
@endsection

