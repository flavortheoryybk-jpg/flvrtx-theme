@extends('layouts.app')

@section('content')

@if (have_posts())

    @while (have_posts())

        @php
            the_post();
        @endphp

        @include('recipe.hero')

        @include('recipe.cook-mode.button')
        
        @include('recipe.cook-mode.modal')

        @include('recipe.quick-info')

        @include('recipe.content')

        @include('recipe.video')

        @include('components.author-card')

        @include('components.share')

        @include('recipe.related')

    @endwhile

@endif

@endsection