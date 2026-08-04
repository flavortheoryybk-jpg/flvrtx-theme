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

    @endwhile

@endif

@endsection