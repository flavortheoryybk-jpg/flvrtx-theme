{{--
Template Name: Book Page
--}}

@extends('layouts.app')

@section('content')

    @while(have_posts())

        @php(the_post())

        @include('book.hero')

        @include('book.why')

        @include('book.learn')

        @include('book.audience')

        @include('book.difference')

        @include('book.inside')

        @include('book.philosophy')

        @include('book.purchase')

        @include('book.faq')

        @include('book.final-cta')

    @endwhile

@endsection