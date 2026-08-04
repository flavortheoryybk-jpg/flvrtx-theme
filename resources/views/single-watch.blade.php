@extends('layouts.app')

@section('content')

@if(have_posts())

    @while(have_posts())

        @php(the_post())

        @include('watch.hero')

        @include('watch.video')

        @include('watch.content')

    @endwhile

@endif

@endsection