@extends('layouts.app')

@section('content')

@if (have_posts())

    @while (have_posts())

        @php
            the_post();
        @endphp

        <section class="bg-background py-20">

            <x-container>

                <div class="grid gap-16 lg:grid-cols-2">

                    <div>

                        @if (has_post_thumbnail())

                            {!! get_the_post_thumbnail(get_the_ID(), 'large', [
                                'class' => 'w-full rounded-3xl object-cover',
                            ]) !!}

                        @endif

                    </div>

                    <div>

                        <p class="text-primary font-semibold uppercase tracking-widest">
                            Recipe
                        </p>

                        <h1 class="mt-4 text-5xl font-bold">
                            {{ get_the_title() }}
                        </h1>

                        <p class="mt-6 text-lg text-text-muted">
                            {{ get_the_excerpt() }}
                        </p>

                        <div class="mt-10 grid grid-cols-2 gap-6">

                            <div>
                                <p class="text-sm text-text-muted">Prep Time</p>
                                <p class="text-xl font-semibold">
                                    {{ get_field('prep_time') }} min
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-text-muted">Cook Time</p>
                                <p class="text-xl font-semibold">
                                    {{ get_field('cook_time') }} min
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-text-muted">Servings</p>
                                <p class="text-xl font-semibold">
                                    {{ get_field('servings') }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-text-muted">Difficulty</p>
                                <p class="text-xl font-semibold">
                                    {{ get_field('difficulty') }}
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </x-container>

        </section>
        <section class="py-20 bg-white">

    <x-container>

        <h2 class="text-3xl font-bold">
            Ingredients
        </h2>
        @php
    $ingredients = collect(
        preg_split('/\r\n|\r|\n/', get_field('ingredients') ?? '')
    )->filter();
@endphp
<ul class="mt-8 space-y-4">

    @foreach($ingredients as $ingredient)

        <li class="flex items-start gap-3">

            <span class="text-primary font-bold">✓</span>

            <span>{{ $ingredient }}</span>

        </li>

    @endforeach

</ul>

    </x-container>

</section>
<section class="py-20 bg-background">

    <x-container>

        <h2 class="text-3xl font-bold">
            Instructions
        </h2>

        @php
            $steps = collect(
                preg_split('/\r\n|\r|\n/', get_field('instructions') ?? '')
            )->filter();
        @endphp

        <div class="mt-8 space-y-6">

            @foreach($steps as $index => $step)

                <div class="flex gap-4">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-primary text-white font-bold">
                        {{ $index + 1 }}
                    </div>

                    <div class="rounded-2xl border border-border bg-white p-5 flex-1">
                        {{ $step }}
                    </div>

                </div>

            @endforeach

        </div>

    </x-container>

</section>

    @endwhile

@endif

@endsection