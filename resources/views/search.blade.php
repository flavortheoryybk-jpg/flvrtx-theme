@extends('layouts.app')

@section('content')

<section class="bg-background py-24">

    <x-container>

        <div class="mx-auto max-w-3xl text-center">

            <x-ui.badge>

                Search

            </x-ui.badge>

            <h1 class="mt-6 text-5xl font-bold">

                Search Results

            </h1>

            <p class="mt-6 text-xl text-text-muted">

                Showing results for

                <span class="font-semibold text-text">

                    "{{ get_search_query() }}"

                </span>

            </p>

        </div>

    </x-container>

</section>

@endsection