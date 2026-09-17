@extends('layouts.app')

@section('content')

    @if(!is_user_logged_in())

        <section class="bg-background py-24 lg:py-32">

            <x-container>

                <div class="mx-auto max-w-2xl text-center">

                    <x-ui.pill>
                        FLVRTX Members
                    </x-ui.pill>

                    <h1 class="mt-8 text-5xl font-bold tracking-tight sm:text-6xl">

                        Your FLVRTX Journey Starts Here.

                    </h1>

                    <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-text-muted">

                        Sign in to access your FLVRTX account and keep
                        your favorite discoveries in one place.

                    </p>

                    <div class="mt-10 flex justify-center gap-4">

                        <a
                            href="{{ home_url('/login') }}"
                            class="inline-flex items-center justify-center gap-2 rounded-2xl bg-primary px-7 py-4 text-sm font-semibold text-white transition-all duration-300 hover:-translate-y-0.5 hover:bg-primary/90">

                            Sign In

                            <i
                                data-lucide="arrow-right"
                                class="h-5 w-5">
                            </i>

                        </a>

                        <a
                            href="{{ home_url('/join') }}"
                            class="inline-flex items-center justify-center rounded-2xl border border-border bg-white px-7 py-4 text-sm font-semibold text-text transition-all duration-300 hover:-translate-y-0.5">

                            Join FLVRTX

                        </a>

                    </div>

                </div>

            </x-container>

        </section>

    @else

        @php
            $current_user = wp_get_current_user();

            /*
             * Get recipes saved by the current user.
             */
            $saved_recipe_ids = get_user_meta(
                $current_user->ID,
                '_flvrtx_saved_recipes',
                true
            );

            if (!is_array($saved_recipe_ids)) {
                $saved_recipe_ids = [];
            }

            /*
             * Get only valid recipe posts from the saved IDs.
             */
            $saved_recipes = [];

            if (!empty($saved_recipe_ids)) {

                $saved_recipes = get_posts([
                    'post_type'      => 'recipe',
                    'post_status'    => 'publish',
                    'post__in'       => array_map('intval', $saved_recipe_ids),
                    'orderby'        => 'post__in',
                    'posts_per_page' => -1,
                ]);

            }
            /*
             * Get Learn articles saved by the current user.
             */
            $saved_learn_ids = get_user_meta(
                $current_user->ID,
                '_flvrtx_saved_learn',
                true
            );

            if (!is_array($saved_learn_ids)) {
                $saved_learn_ids = [];
            }

            /*
             * Get only valid published Learn articles.
             */
            $saved_learn = [];

            if (!empty($saved_learn_ids)) {

                $saved_learn = get_posts([
                    'post_type'      => 'learn',
                    'post_status'    => 'publish',
                    'post__in'       => array_map('intval', $saved_learn_ids),
                    'orderby'        => 'post__in',
                    'posts_per_page' => -1,
                ]);

            }
            /*
             * Get videos saved by the current user.
             */
            $saved_video_ids = get_user_meta(
                $current_user->ID,
                '_flvrtx_saved_videos',
                true
            );

            if (!is_array($saved_video_ids)) {
                $saved_video_ids = [];
            }

            /*
             * Get only valid published Watch videos.
             */
            $saved_videos = [];

            if (!empty($saved_video_ids)) {

                $saved_videos = get_posts([
                    'post_type'      => 'watch',
                    'post_status'    => 'publish',
                    'post__in'       => array_map('intval', $saved_video_ids),
                    'orderby'        => 'post__in',
                    'posts_per_page' => -1,
                ]);

            }
            /*
             * Get Picks saved by the current user.
             */
            $saved_pick_ids = get_user_meta(
                $current_user->ID,
                '_flvrtx_saved_picks',
                true
            );
            
            if (!is_array($saved_pick_ids)) {
                $saved_pick_ids = [];
            }
            
            /*
             * Get only valid published Recommendations.
             */
            $saved_picks = [];
            
            if (!empty($saved_pick_ids)) {
            
                $saved_picks = get_posts([
                    'post_type'      => 'recommendation',
                    'post_status'    => 'publish',
                    'post__in'       => array_map('intval', $saved_pick_ids),
                    'orderby'        => 'post__in',
                    'posts_per_page' => -1,
                ]);
            
            }
        @endphp


        <section class="bg-background py-20 lg:py-28">

            <x-container>

                {{-- Welcome --}}
                <div class="mx-auto max-w-4xl text-center">

                    <x-ui.pill>
                        My FLVRTX
                    </x-ui.pill>

                    <h1 class="mt-8 text-5xl font-bold tracking-tight sm:text-6xl">

                        Welcome back,
                        {{ $current_user->display_name }}.

                    </h1>

                    <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-text-muted">

                        Your personal space for everything you discover
                        and save on FLVRTX.

                    </p>

                </div>


                {{-- Member Cards --}}
                <div class="mx-auto mt-16 grid max-w-5xl gap-6 sm:grid-cols-2 lg:grid-cols-4">

                    {{-- Saved Recipes --}}
                    <a
                        href="#saved-recipes"
                        class="group rounded-[32px] bg-white p-8 shadow-sm ring-1 ring-border/10 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                        <i
                            data-lucide="heart"
                            class="h-7 w-7 text-primary">
                        </i>

                        <h2 class="mt-8 text-xl font-bold">
                            Saved Recipes
                        </h2>

                        <p class="mt-3 text-sm leading-7 text-text-muted">
                            {{ count($saved_recipes) }}
                            {{ count($saved_recipes) === 1 ? 'recipe' : 'recipes' }}
                            saved.
                        </p>

                    </a>


                    {{-- Saved Learn --}}
                    <a
                        href="#saved-learn"
                        class="group rounded-[32px] bg-white p-8 shadow-sm ring-1 ring-border/10 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                        <i
                            data-lucide="book-open"
                            class="h-7 w-7 text-primary">
                        </i>

                        <h2 class="mt-8 text-xl font-bold">
                            Saved Learn
                        </h2>

                        <p class="mt-3 text-sm leading-7 text-text-muted">

                            {{ count($saved_learn) }}
                            {{ count($saved_learn) === 1 ? 'article' : 'articles' }}
                            saved.

                        </p>

                    </a>


                    {{-- Saved Videos --}}
                    <a
                        href="#saved-videos"
                        class="group rounded-[32px] bg-white p-8 shadow-sm ring-1 ring-border/10 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                        <i
                            data-lucide="play-circle"
                            class="h-7 w-7 text-primary">
                        </i>

                        <h2 class="mt-8 text-xl font-bold">
                            Saved Videos
                        </h2>

                        <p class="mt-3 text-sm leading-7 text-text-muted">

                            {{ count($saved_videos) }}
                            {{ count($saved_videos) === 1 ? 'video' : 'videos' }}
                            saved.

                        </p>

                    </a>


                    {{-- Saved Picks --}}
                    <a
                        href="#saved-picks"
                        class="group rounded-[32px] bg-white p-8 shadow-sm ring-1 ring-border/10 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                        <i
                            data-lucide="bookmark"
                            class="h-7 w-7 text-primary">
                        </i>

                        <h2 class="mt-8 text-xl font-bold">
                            Saved Picks
                        </h2>

                        <p class="mt-3 text-sm leading-7 text-text-muted">

                            {{ count($saved_picks) }}
                            {{ count($saved_picks) === 1 ? 'pick' : 'picks' }}
                            saved.

                        </p>

                    </a>

                </div>


                {{-- Saved Recipes --}}
                <div
                    id="saved-recipes"
                    class="mx-auto mt-20 max-w-5xl scroll-mt-32">

                    <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">

                        <div>

                            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-text-muted">
                                Your Collection
                            </p>

                            <h2 class="mt-3 text-3xl font-bold tracking-tight">
                                Saved Recipes
                            </h2>

                        </div>

                        <a
                            href="{{ home_url('/recipes') }}"
                            class="text-sm font-semibold text-primary hover:underline">

                            Explore Recipes →

                        </a>

                    </div>


                    @if(!empty($saved_recipes))

                        <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

                            @foreach($saved_recipes as $recipe)

                                <article class="group overflow-hidden rounded-[28px] bg-white shadow-sm ring-1 ring-border/10 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                                    {{-- Recipe Link --}}
                                    <a href="{{ get_permalink($recipe->ID) }}">

                                        @if(has_post_thumbnail($recipe->ID))

                                            {!! get_the_post_thumbnail(
                                                $recipe->ID,
                                                'medium_large',
                                                [
                                                    'class' => 'aspect-[4/3] w-full object-cover transition-transform duration-500 group-hover:scale-[1.02]',
                                                    'alt'   => esc_attr(get_the_title($recipe->ID)),
                                                ]
                                            ) !!}

                                        @endif

                                    </a>


                                    {{-- Content --}}
                                    <div class="p-6">

                                        <a href="{{ get_permalink($recipe->ID) }}">

                                            <h3 class="text-xl font-bold tracking-tight transition-colors duration-300 hover:text-primary">

                                                {{ get_the_title($recipe->ID) }}

                                            </h3>

                                            @if(get_post_field('post_excerpt', $recipe->ID))

                                                <p class="mt-3 line-clamp-2 text-sm leading-6 text-text-muted">

                                                    {{ get_the_excerpt($recipe->ID) }}

                                                </p>

                                            @endif

                                        </a>


                                        {{-- Actions --}}
                                        <div class="mt-5 flex items-center justify-between gap-3 border-t border-border/20 pt-5">

                                            <a
                                                href="{{ get_permalink($recipe->ID) }}"
                                                class="text-sm font-semibold text-primary hover:underline">

                                                View Recipe →

                                            </a>


                                            {{-- Remove --}}
                                            <form
                                                method="POST"
                                                action="{{ admin_url('admin-post.php') }}">

                                                <input
                                                    type="hidden"
                                                    name="action"
                                                    value="flvrtx_unsave_recipe">

                                                <input
                                                    type="hidden"
                                                    name="recipe_id"
                                                    value="{{ $recipe->ID }}">

                                                <input
                                                    type="hidden"
                                                    name="flvrtx_unsave_recipe_nonce"
                                                    value="{{ wp_create_nonce('flvrtx_unsave_recipe') }}">

                                                <button
                                                    type="submit"
                                                    class="inline-flex items-center gap-2 rounded-xl border border-border px-3 py-2 text-xs font-semibold text-text-muted transition-all duration-300 hover:border-primary hover:text-primary">

                                                    <i
                                                        data-lucide="bookmark-x"
                                                        class="h-4 w-4">
                                                    </i>

                                                    Remove

                                                </button>

                                            </form>

                                        </div>

                                    </div>

                                </article>

                            @endforeach

                        </div>

                    @else

                        <div class="mt-8 rounded-[32px] bg-white p-10 text-center shadow-sm ring-1 ring-border/10">

                            <i
                                data-lucide="bookmark"
                                class="mx-auto h-10 w-10 text-primary">
                            </i>

                            <h3 class="mt-6 text-2xl font-bold">

                                No saved recipes yet.

                            </h3>

                            <p class="mx-auto mt-3 max-w-lg text-text-muted">

                                Discover recipes you love and save them here
                                so you can easily find them again.

                            </p>

                            <a
                                href="{{ home_url('/recipes') }}"
                                class="mt-8 inline-flex items-center justify-center gap-2 rounded-2xl bg-primary px-6 py-3 text-sm font-semibold text-white transition-all duration-300 hover:-translate-y-0.5 hover:bg-primary/90">

                                Explore Recipes

                                <i
                                    data-lucide="arrow-right"
                                    class="h-5 w-5">
                                </i>

                            </a>

                        </div>

                    @endif

                </div>
                {{-- Saved Learn --}}
                <div
                    id="saved-learn"
                    class="mx-auto mt-20 max-w-5xl scroll-mt-32">

                    <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">

                        <div>

                            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-text-muted">
                                Your Collection
                            </p>

                            <h2 class="mt-3 text-3xl font-bold tracking-tight">
                                Saved Learn
                            </h2>

                        </div>

                        <a
                            href="{{ home_url('/learn') }}"
                            class="text-sm font-semibold text-primary hover:underline">

                            Explore Learn →

                        </a>

                    </div>


                    @if(!empty($saved_learn))

                        <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

                            @foreach($saved_learn as $article)

                                <article class="group overflow-hidden rounded-[28px] bg-white shadow-sm ring-1 ring-border/10 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                                    {{-- Article Image --}}
                                    <a href="{{ get_permalink($article->ID) }}">

                                        @if(has_post_thumbnail($article->ID))

                                            {!! get_the_post_thumbnail(
                                                $article->ID,
                                                'medium_large',
                                                [
                                                    'class' => 'aspect-[4/3] w-full object-cover transition-transform duration-500 group-hover:scale-[1.02]',
                                                    'alt'   => esc_attr(get_the_title($article->ID)),
                                                ]
                                            ) !!}

                                        @endif

                                    </a>


                                    {{-- Content --}}
                                    <div class="p-6">

                                        <a href="{{ get_permalink($article->ID) }}">

                                            <div class="flex items-center justify-between gap-3">

                                                <x-ui.pill>
                                                    Food Science
                                                </x-ui.pill>

                                                @if(get_field('reading_time', $article->ID))

                                                    <span class="text-xs text-text-muted">

                                                        {{ get_field('reading_time', $article->ID) }} min read

                                                    </span>

                                                @endif

                                            </div>

                                            <h3 class="mt-5 text-xl font-bold tracking-tight transition-colors duration-300 hover:text-primary">

                                                {{ get_the_title($article->ID) }}

                                            </h3>

                                            @if(get_post_field('post_excerpt', $article->ID))

                                                <p class="mt-3 line-clamp-2 text-sm leading-6 text-text-muted">

                                                    {{ get_the_excerpt($article->ID) }}

                                                </p>

                                            @endif

                                        </a>


                                        {{-- Actions --}}
                                        <div class="mt-5 flex items-center justify-between gap-3 border-t border-border/20 pt-5">

                                            <a
                                                href="{{ get_permalink($article->ID) }}"
                                                class="text-sm font-semibold text-primary hover:underline">

                                                Read Article →

                                            </a>


                                            {{-- Remove --}}
                                            <form
                                                method="POST"
                                                action="{{ admin_url('admin-post.php') }}">

                                                <input
                                                    type="hidden"
                                                    name="action"
                                                    value="flvrtx_unsave_learn">

                                                <input
                                                    type="hidden"
                                                    name="learn_id"
                                                    value="{{ $article->ID }}">

                                                <input
                                                    type="hidden"
                                                    name="flvrtx_unsave_learn_nonce"
                                                    value="{{ wp_create_nonce('flvrtx_unsave_learn') }}">

                                                <button
                                                    type="submit"
                                                    class="inline-flex items-center gap-2 rounded-xl border border-border px-3 py-2 text-xs font-semibold text-text-muted transition-all duration-300 hover:border-primary hover:text-primary">

                                                    <i
                                                        data-lucide="bookmark-x"
                                                        class="h-4 w-4">
                                                    </i>

                                                    Remove

                                                </button>

                                            </form>

                                        </div>

                                    </div>

                                </article>

                            @endforeach

                        </div>

                    @else

                        <div class="mt-8 rounded-[32px] bg-white p-10 text-center shadow-sm ring-1 ring-border/10">

                            <i
                                data-lucide="book-open"
                                class="mx-auto h-10 w-10 text-primary">
                            </i>

                            <h3 class="mt-6 text-2xl font-bold">

                                No saved articles yet.

                            </h3>

                            <p class="mx-auto mt-3 max-w-lg text-text-muted">

                                Save useful food science articles and come back to
                                them whenever you want.

                            </p>

                            <a
                                href="{{ home_url('/learn') }}"
                                class="mt-8 inline-flex items-center justify-center gap-2 rounded-2xl bg-primary px-6 py-3 text-sm font-semibold text-white transition-all duration-300 hover:-translate-y-0.5 hover:bg-primary/90">

                                Explore Learn

                                <i
                                    data-lucide="arrow-right"
                                    class="h-5 w-5">
                                </i>

                            </a>

                        </div>

                    @endif

                </div>
                {{-- Saved Videos --}}
                <div
                    id="saved-videos"
                    class="mx-auto mt-20 max-w-5xl scroll-mt-32">

                    <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">

                        <div>

                            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-text-muted">
                                Your Collection
                            </p>

                            <h2 class="mt-3 text-3xl font-bold tracking-tight">
                                Saved Videos
                            </h2>

                        </div>

                        <a
                            href="{{ home_url('/watch') }}"
                            class="text-sm font-semibold text-primary hover:underline">

                            Explore Watch →

                        </a>

                    </div>


                    @if(!empty($saved_videos))

                        <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

                            @foreach($saved_videos as $video)

                                @php
                                    $youtube_url = get_field('youtube_url', $video->ID);
                                    $youtube_id = null;

                                    if ($youtube_url) {
                                        preg_match(
                                            '/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([A-Za-z0-9_-]{11})/',
                                            $youtube_url,
                                            $matches
                                        );

                                        $youtube_id = $matches[1] ?? null;
                                    }
                                @endphp


                                <article class="group overflow-hidden rounded-[28px] bg-white shadow-sm ring-1 ring-border/10 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

                                    {{-- Thumbnail --}}
                                    <a href="{{ get_permalink($video->ID) }}">

                                        @if(has_post_thumbnail($video->ID))

                                            {!! get_the_post_thumbnail(
                                                $video->ID,
                                                'medium_large',
                                                [
                                                    'class' => 'aspect-video w-full object-cover transition-transform duration-500 group-hover:scale-[1.02]',
                                                    'alt'   => esc_attr(get_the_title($video->ID)),
                                                ]
                                            ) !!}

                                        @elseif($youtube_id)

                                            <img
                                                src="https://img.youtube.com/vi/{{ $youtube_id }}/hqdefault.jpg"
                                                alt="{{ get_the_title($video->ID) }}"
                                                class="aspect-video w-full object-cover transition-transform duration-500 group-hover:scale-[1.02]"
                                                loading="lazy"
                                                decoding="async">

                                        @endif

                                    </a>


                                    {{-- Content --}}
                                    <div class="p-6">

                                        <a href="{{ get_permalink($video->ID) }}">

                                            <div class="flex items-center justify-between gap-3">

                                                <x-ui.pill>
                                                    Video
                                                </x-ui.pill>

                                                @if(get_field('video_duration', $video->ID))

                                                    <span class="text-xs text-text-muted">

                                                        {{ get_field('video_duration', $video->ID) }}

                                                    </span>

                                                @endif

                                            </div>


                                            <h3 class="mt-5 text-xl font-bold tracking-tight transition-colors duration-300 hover:text-primary">

                                                {{ get_the_title($video->ID) }}

                                            </h3>


                                            @if(get_post_field('post_excerpt', $video->ID))

                                                <p class="mt-3 line-clamp-2 text-sm leading-6 text-text-muted">

                                                    {{ get_the_excerpt($video->ID) }}

                                                </p>

                                            @endif

                                        </a>


                                        {{-- Actions --}}
                                        <div class="mt-5 flex items-center justify-between gap-3 border-t border-border/20 pt-5">

                                            <a
                                                href="{{ get_permalink($video->ID) }}"
                                                class="text-sm font-semibold text-primary hover:underline">

                                                Watch Video →

                                            </a>


                                            {{-- Remove --}}
                                            <form
                                                method="POST"
                                                action="{{ admin_url('admin-post.php') }}">

                                                <input
                                                    type="hidden"
                                                    name="action"
                                                    value="flvrtx_unsave_video">

                                                <input
                                                    type="hidden"
                                                    name="video_id"
                                                    value="{{ $video->ID }}">

                                                <input
                                                    type="hidden"
                                                    name="flvrtx_unsave_video_nonce"
                                                    value="{{ wp_create_nonce('flvrtx_unsave_video') }}">

                                                <button
                                                    type="submit"
                                                    class="inline-flex items-center gap-2 rounded-xl border border-border px-3 py-2 text-xs font-semibold text-text-muted transition-all duration-300 hover:border-primary hover:text-primary">

                                                    <i
                                                        data-lucide="bookmark-x"
                                                        class="h-4 w-4">
                                                    </i>

                                                    Remove

                                                </button>

                                            </form>

                                        </div>

                                    </div>

                                </article>

                            @endforeach

                        </div>

                    @else

                        <div class="mt-8 rounded-[32px] bg-white p-10 text-center shadow-sm ring-1 ring-border/10">

                            <i
                                data-lucide="play-circle"
                                class="mx-auto h-10 w-10 text-primary">
                            </i>

                            <h3 class="mt-6 text-2xl font-bold">

                                No saved videos yet.

                            </h3>

                            <p class="mx-auto mt-3 max-w-lg text-text-muted">

                                Save useful FLVRTX videos and come back to them
                                whenever you want.

                            </p>

                            <a
                                href="{{ home_url('/watch') }}"
                                class="mt-8 inline-flex items-center justify-center gap-2 rounded-2xl bg-primary px-6 py-3 text-sm font-semibold text-white transition-all duration-300 hover:-translate-y-0.5 hover:bg-primary/90">

                                Explore Watch

                                <i
                                    data-lucide="arrow-right"
                                    class="h-5 w-5">
                                </i>

                            </a>

                        </div>

                    @endif

                </div>

                {{-- Saved Picks --}}
                <div
                    id="saved-picks"
                    class="mx-auto mt-20 max-w-5xl scroll-mt-32">
                
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                
                        <div>
                
                            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-text-muted">
                                Your Collection
                            </p>
                
                            <h2 class="mt-3 text-3xl font-bold tracking-tight">
                                Saved Picks
                            </h2>
                
                        </div>
                
                        <a
                            href="{{ home_url('/recommendations') }}"
                            class="text-sm font-semibold text-primary hover:underline">
                
                            Explore Recommendations →
                
                        </a>
                
                    </div>
                
                
                    @if(!empty($saved_picks))
                
                        <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                
                            @foreach($saved_picks as $pick)
                
                                <article class="group overflow-hidden rounded-[28px] bg-white shadow-sm ring-1 ring-border/10 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                
                                    {{-- Product Image --}}
                                    <a href="{{ get_permalink($pick->ID) }}">
                
                                        @if(has_post_thumbnail($pick->ID))
                
                                            {!! get_the_post_thumbnail(
                                                $pick->ID,
                                                'medium_large',
                                                [
                                                    'class' => 'aspect-square w-full object-cover transition-transform duration-500 group-hover:scale-[1.02]',
                                                    'alt'   => esc_attr(get_the_title($pick->ID)),
                                                ]
                                            ) !!}
                
                                        @endif
                
                                    </a>
                
                
                                    {{-- Content --}}
                                    <div class="p-6">
                
                                        <a href="{{ get_permalink($pick->ID) }}">
                
                                            <div class="flex items-center justify-between gap-3">
                
                                                <x-ui.pill>
                                                    FLVRTX Pick
                                                </x-ui.pill>
                
                                                @if(get_field('rating', $pick->ID))
                
                                                    <span class="text-sm text-text-muted">
                
                                                        ⭐ {{ get_field('rating', $pick->ID) }}/5
                
                                                    </span>
                
                                                @endif
                
                                            </div>
                
                
                                            <h3 class="mt-5 text-xl font-bold tracking-tight transition-colors duration-300 hover:text-primary">
                
                                                {{ get_the_title($pick->ID) }}
                
                                            </h3>
                
                
                                            @if(get_field('recommendation_summary', $pick->ID))
                
                                                <p class="mt-3 line-clamp-2 text-sm leading-6 text-text-muted">
                
                                                    {!! wp_kses_post(get_field('recommendation_summary', $pick->ID)) !!}
                
                                                </p>
                
                                            @endif
                
                                        </a>
                
                
                                        {{-- Actions --}}
                                        <div class="mt-5 flex items-center justify-between gap-3 border-t border-border/20 pt-5">
                
                                            <a
                                                href="{{ get_permalink($pick->ID) }}"
                                                class="text-sm font-semibold text-primary hover:underline">
                
                                                View Pick →
                
                                            </a>
                
                
                                            {{-- Remove --}}
                                            <form
                                                method="POST"
                                                action="{{ admin_url('admin-post.php') }}">
                
                                                <input
                                                    type="hidden"
                                                    name="action"
                                                    value="flvrtx_unsave_pick">
                
                                                <input
                                                    type="hidden"
                                                    name="pick_id"
                                                    value="{{ $pick->ID }}">
                
                                                <input
                                                    type="hidden"
                                                    name="flvrtx_unsave_pick_nonce"
                                                    value="{{ wp_create_nonce('flvrtx_unsave_pick') }}">
                
                                                <button
                                                    type="submit"
                                                    class="inline-flex items-center gap-2 rounded-xl border border-border px-3 py-2 text-xs font-semibold text-text-muted transition-all duration-300 hover:border-primary hover:text-primary">
                
                                                    <i
                                                        data-lucide="bookmark-x"
                                                        class="h-4 w-4">
                                                    </i>
                
                                                    Remove
                
                                                </button>
                
                                            </form>
                
                                        </div>
                
                                    </div>
                
                                </article>
                
                            @endforeach
                
                        </div>
                
                    @else
                
                        <div class="mt-8 rounded-[32px] bg-white p-10 text-center shadow-sm ring-1 ring-border/10">
                
                            <i
                                data-lucide="bookmark"
                                class="mx-auto h-10 w-10 text-primary">
                            </i>
                
                            <h3 class="mt-6 text-2xl font-bold">
                
                                No saved picks yet.
                
                            </h3>
                
                            <p class="mx-auto mt-3 max-w-lg text-text-muted">
                
                                Save products you trust and want to remember for
                                your future kitchen purchases.
                
                            </p>
                
                            <a
                                href="{{ home_url('/recommendations') }}"
                                class="mt-8 inline-flex items-center justify-center gap-2 rounded-2xl bg-primary px-6 py-3 text-sm font-semibold text-white transition-all duration-300 hover:-translate-y-0.5 hover:bg-primary/90">
                
                                Explore Recommendations
                
                                <i
                                    data-lucide="arrow-right"
                                    class="h-5 w-5">
                                </i>
                
                            </a>
                
                        </div>
                
                    @endif
                
                </div>


                {{-- Account --}}
                <div class="mx-auto mt-16 max-w-5xl rounded-[32px] bg-white p-8 shadow-sm ring-1 ring-border/10 sm:p-10">

                    <div class="flex flex-col items-start justify-between gap-6 sm:flex-row sm:items-center">

                        <div>

                            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-text-muted">
                                Account
                            </p>

                            <p class="mt-3 text-lg font-semibold text-text">
                                {{ $current_user->user_email }}
                            </p>

                        </div>

                        <a
                            href="{{ add_query_arg(
                                [
                                    'flvrtx_logout' => '1',
                                    '_wpnonce' => wp_create_nonce('flvrtx_logout'),
                                ],
                                home_url('/')
                            ) }}"
                            class="inline-flex items-center justify-center gap-2 rounded-2xl border border-border px-6 py-3 text-sm font-semibold text-text transition-all duration-300 hover:-translate-y-0.5 hover:border-primary hover:text-primary">

                            Log Out

                            <i
                                data-lucide="log-out"
                                class="h-4 w-4">
                            </i>

                        </a>

                    </div>

                </div>

            </x-container>

        </section>

    @endif

@endsection