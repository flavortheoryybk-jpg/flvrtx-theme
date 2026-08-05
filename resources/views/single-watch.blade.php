@extends('layouts.app')

@section('content')

@if(have_posts())

    @while(have_posts())

        @php(the_post())

        @include('watch.hero')

        @include('watch.video')

        @include('watch.content')

        @include('components.global.author-card')

        @include('components.global.share')

        @include('watch.related')

    @endwhile

@endif

@endsection