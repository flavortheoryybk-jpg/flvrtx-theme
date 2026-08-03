@extends('layouts.app')

@section('content')

<section class="py-32">

    <x-container>

        <div class="mx-auto max-w-2xl text-center">

            <p class="text-primary font-semibold uppercase tracking-widest">
                Error 404
            </p>

            <h1 class="mt-4 text-6xl font-bold">
                Page Not Found
            </h1>

            <p class="mt-6 text-lg text-text-muted">
                The page you're looking for doesn't exist or may have been moved.
            </p>

            <div class="mt-10 flex flex-wrap justify-center gap-4">

                <x-ui.button href="{{ home_url('/') }}">
                    Go Home
                </x-ui.button>

                <x-ui.button
                    href="{{ get_post_type_archive_link('recipe') }}"
                    variant="secondary">

                    Browse Recipes

                </x-ui.button>

            </div>

        </div>

    </x-container>

</section>

@endsection