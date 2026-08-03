@extends('layouts.app')

@section('content')

@if (have_posts())

    @while (have_posts())

        @php
            the_post();
        @endphp

        @include('recipe.hero')

        @include('recipe.ingredients')

        @include('recipe.instructions')
        @include('recipe.flavor-theory')

    @endwhile

@endif

@endsection