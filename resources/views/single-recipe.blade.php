@extends('layouts.app')

@section('content')

@if (have_posts())

    @while (have_posts())

        @php
            the_post();
        @endphp

        @include('recipe.hero')
        
        @include('recipe.cook-mode.modal')

        @include('recipe.content')

        @include('components.global.author-card')

        @include('components.global.share')

        @include('recipe.related')

    @endwhile

@endif

@endsection