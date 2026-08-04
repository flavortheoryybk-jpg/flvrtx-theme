@extends('layouts.app')

@section('content')

@if(have_posts())

    @while(have_posts())

        @php(the_post())

        @include('recommendation.hero')

        @include('recommendation.details')

        @include('recommendation.related')

    @endwhile

@endif

@endsection