@extends('layouts.app')

@section('content')

@if (have_posts())

    @while (have_posts())

        @php
            the_post();
        @endphp

        @include('recipe.hero')

        @include('recipe.quick-info')

        @include('recipe.content')

        @include('recipe.video')

        @include('recipe.related')

    @endwhile

@endif

@endsection