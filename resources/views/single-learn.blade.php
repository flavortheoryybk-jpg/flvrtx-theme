@extends('layouts.app')

@section('content')

@if(have_posts())

    @while(have_posts())

        @php(the_post())

        @include('learn.hero')

        @include('learn.content')

        @include('learn.did-you-know')

        @include('learn.key-takeaways')

        @include('learn.related-recipe')

        @include('components.global.author-card')

        @include('components.global.share')

        @include('learn.related-articles')

    @endwhile

@endif

@endsection