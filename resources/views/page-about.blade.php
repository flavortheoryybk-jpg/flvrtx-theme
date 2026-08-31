@extends('layouts.app')

@section('content')

    {{-- About Hero --}}
    <section class="relative overflow-hidden bg-background py-24 lg:py-32">

        <div class="absolute inset-0 -z-10 overflow-hidden">

            <div class="absolute -left-40 top-0 h-96 w-96 rounded-full bg-primary/5 blur-3xl"></div>

            <div class="absolute -right-40 bottom-0 h-96 w-96 rounded-full bg-primary/5 blur-3xl"></div>

        </div>

        <x-container>

            <div class="mx-auto max-w-4xl text-center">

                <x-ui.pill>
                    About FLVRTX
                </x-ui.pill>

                <h1 class="mt-8 text-5xl font-bold leading-[1.05] tracking-tight sm:text-6xl lg:text-7xl">

                    Understand Food.<br>

                    <span class="text-primary">
                        Cook With Confidence.
                    </span>

                </h1>

                <p class="mx-auto mt-8 max-w-2xl text-lg leading-8 text-text-muted lg:text-xl">

                    FLVRTX is a food education platform built to help you understand
                    what happens in your kitchen — not simply follow a recipe.

                </p>

            </div>

        </x-container>

    </section>


    {{-- What is FLVRTX --}}
    <section class="bg-white py-24 lg:py-32">

        <x-container>

            <div class="grid items-center gap-16 lg:grid-cols-2">

                <div>

                    <x-ui.pill>
                        What We Believe
                    </x-ui.pill>

                    <h2 class="mt-6 text-4xl font-bold tracking-tight lg:text-5xl">

                        Cooking becomes easier when you understand it.

                    </h2>

                </div>

                <div class="space-y-6 text-lg leading-8 text-text-muted">

                    <p>
                        A recipe can tell you what to do. But understanding food
                        helps you know <strong class="text-text">why</strong> you're doing it.
                    </p>

                    <p>
                        FLVRTX brings together recipes, food science, cooking
                        techniques, practical experiments, trusted recommendations,
                        videos, and books to make cooking more understandable.
                    </p>

                    <p>
                        The goal is simple: help you make better decisions in the
                        kitchen with more confidence and less guesswork.
                    </p>

                </div>

            </div>

        </x-container>

    </section>


    {{-- What You'll Find --}}
    <section class="bg-background py-24 lg:py-32">

        <x-container>

            <div class="mx-auto max-w-3xl text-center">

                <x-ui.pill>
                    Explore FLVRTX
                </x-ui.pill>

                <h2 class="mt-6 text-4xl font-bold tracking-tight lg:text-5xl">

                    More Than Just Recipes.

                </h2>

                <p class="mt-6 text-lg leading-8 text-text-muted">

                    Everything is designed to help you become a more confident,
                    curious, and capable cook.

                </p>

            </div>


            <div class="mt-16 grid gap-6 md:grid-cols-2 lg:grid-cols-3">

                {{-- Recipes --}}
                <x-ui.card class="group">

                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary/10 text-primary">

                        <i data-lucide="chef-hat" class="h-6 w-6"></i>

                    </div>

                    <h3 class="mt-6 text-2xl font-bold">
                        Recipes
                    </h3>

                    <p class="mt-3 leading-7 text-text-muted">
                        Practical recipes with clear ingredients, techniques,
                        and guidance to help you cook with confidence.
                    </p>

                </x-ui.card>


                {{-- Food Science --}}
                <x-ui.card class="group">

                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary/10 text-primary">

                        <i data-lucide="flask-conical" class="h-6 w-6"></i>

                    </div>

                    <h3 class="mt-6 text-2xl font-bold">
                        Food Science
                    </h3>

                    <p class="mt-3 leading-7 text-text-muted">
                        Understand the science behind ingredients, cooking
                        techniques, texture, flavor, and transformation.
                    </p>

                </x-ui.card>


                {{-- Watch --}}
                <x-ui.card class="group">

                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary/10 text-primary">

                        <i data-lucide="play-circle" class="h-6 w-6"></i>

                    </div>

                    <h3 class="mt-6 text-2xl font-bold">
                        Watch
                    </h3>

                    <p class="mt-3 leading-7 text-text-muted">
                        Watch cooking experiments, recipes, techniques, and
                        food-focused content designed to make learning visual.
                    </p>

                </x-ui.card>


                {{-- Recommendations --}}
                <x-ui.card class="group">

                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary/10 text-primary">

                        <i data-lucide="badge-check" class="h-6 w-6"></i>

                    </div>

                    <h3 class="mt-6 text-2xl font-bold">
                        Recommendations
                    </h3>

                    <p class="mt-3 leading-7 text-text-muted">
                        Thoughtful recommendations for kitchen products and
                        tools that are genuinely useful.
                    </p>

                </x-ui.card>


                {{-- Books --}}
                <x-ui.card class="group">

                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary/10 text-primary">

                        <i data-lucide="book-open" class="h-6 w-6"></i>

                    </div>

                    <h3 class="mt-6 text-2xl font-bold">
                        Books
                    </h3>

                    <p class="mt-3 leading-7 text-text-muted">
                        Deeper ideas and practical knowledge for people who
                        want to take their understanding further.
                    </p>

                </x-ui.card>


                {{-- Experiments --}}
                <x-ui.card class="group">

                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-primary/10 text-primary">

                        <i data-lucide="beaker" class="h-6 w-6"></i>

                    </div>

                    <h3 class="mt-6 text-2xl font-bold">
                        Experiments
                    </h3>

                    <p class="mt-3 leading-7 text-text-muted">
                        Explore what changes when ingredients, techniques,
                        temperatures, and methods change.
                    </p>

                </x-ui.card>

            </div>

        </x-container>

    </section>


    {{-- Philosophy --}}
    <section class="bg-primary py-24 text-white lg:py-32">

        <x-container>

            <div class="mx-auto max-w-4xl text-center">

                <p class="text-sm font-semibold uppercase tracking-[0.3em] text-white/70">
                    The FLVRTX Philosophy
                </p>

                <h2 class="mt-8 text-4xl font-bold tracking-tight sm:text-5xl lg:text-6xl">
                    Cook. Taste. Understand.
                </h2>

                <p class="mx-auto mt-8 max-w-2xl text-lg leading-8 text-white/80">
                    We believe the best cooks aren't simply people who know
                    hundreds of recipes. They're people who understand ingredients,
                    techniques, flavors, and how to adapt when things don't go as planned.
                </p>

            </div>

        </x-container>

    </section>


    {{-- Mission --}}
    <section class="bg-white py-24 lg:py-32">

        <x-container>

            <div class="mx-auto max-w-4xl text-center">

                <x-ui.pill>
                    Our Mission
                </x-ui.pill>

                <h2 class="mt-6 text-4xl font-bold tracking-tight lg:text-5xl">

                    Make food easier to understand.

                </h2>

                <p class="mx-auto mt-8 max-w-2xl text-lg leading-8 text-text-muted">

                    FLVRTX exists to bridge the gap between following instructions
                    and actually understanding what's happening in the kitchen.

                    Whether you're cooking your first meal or trying to perfect
                    something you've made a hundred times, we want to help you
                    make better decisions with confidence.

                </p>

            </div>

        </x-container>

    </section>


    {{-- Final CTA --}}
    <section class="bg-background py-24 lg:py-32">

        <x-container>

            <div class="mx-auto max-w-4xl rounded-[40px] bg-primary px-8 py-16 text-center text-white shadow-2xl lg:px-16">

                <h2 class="text-4xl font-bold tracking-tight lg:text-5xl">

                    Ready to understand food differently?

                </h2>

                <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-white/80">

                    Explore recipes, learn the science, watch the experiments,
                    and start cooking with more confidence.

                </p>

                <div class="mt-8 flex flex-wrap justify-center gap-4">

    <a
        href="{{ home_url('/recipes') }}"
        class="inline-flex items-center justify-center rounded-2xl bg-white px-6 py-3.5 text-sm font-semibold text-primary shadow-sm transition-all duration-300 hover:bg-white/90">

        Explore Recipes →

    </a>

    <a
        href="{{ home_url('/learn') }}"
        class="inline-flex items-center justify-center rounded-2xl border border-white/30 bg-transparent px-6 py-3.5 text-sm font-semibold text-white transition-all duration-300 hover:bg-white hover:text-primary">

        Learn More

    </a>

</div>

            </div>

        </x-container>

    </section>

@endsection