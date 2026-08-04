@extends('layouts.app')

@section('content')

@include('learn.hero')

@endsection

@if(have_posts())

    @while(have_posts())

        @php(the_post())

<section class="py-24">

    <x-container>

        <div class="mx-auto max-w-4xl">

            <nav class="mb-8 text-sm text-text-muted">

                <a href="{{ home_url('/') }}">Home</a>

                /

                <a href="{{ home_url('/learn') }}">Learn</a>

            </nav>

            <span class="text-sm font-semibold uppercase tracking-widest text-primary">

                Learn

            </span>

            <h1 class="mt-5 text-6xl font-bold leading-tight">

                {{ get_the_title() }}

            </h1>

            <p class="mt-8 text-xl leading-8 text-text-muted">

                {{ get_the_excerpt() }}

            </p>

            @if(has_post_thumbnail())

                <div class="mt-12">

                    {!! get_the_post_thumbnail(get_the_ID(),'large',[
                        'class'=>'w-full rounded-3xl'
                    ]) !!}

                </div>

            @endif

            <article class="prose prose-lg mt-16 max-w-none">

                {!! the_content() !!}

            </article>

        </div>

    </x-container>

</section>

    @endwhile

@endif

@endsection