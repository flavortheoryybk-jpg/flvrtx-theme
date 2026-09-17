<section class="bg-background py-24 lg:py-32">

    <x-container>

        <div class="grid items-center gap-20 lg:grid-cols-2">

            {{-- Product Information --}}
            <div>

                <nav
                    aria-label="Breadcrumb"
                    class="text-sm text-text-muted">
                
                    <ol class="flex flex-wrap items-center gap-2">
                
                        <li>
                            <a
                                href="{{ home_url('/') }}"
                                class="transition-colors hover:text-primary">
                                Home
                            </a>
                        </li>
                
                        <li aria-hidden="true">
                            /
                        </li>
                
                        <li>
                            <a
                                href="{{ get_post_type_archive_link('recommendation') }}"
                                class="transition-colors hover:text-primary">
                                Recommendations
                            </a>
                        </li>
                
                        <li aria-hidden="true">
                            /
                        </li>
                
                        <li class="text-text">
                            {{ get_the_title() }}
                        </li>
                
                    </ol>
                
                </nav>

                <div class="mt-8">

                    <x-ui.badge>

                        FLVRTX Recommendation

                    </x-ui.badge>

                </div>

                <h1 class="mt-8 text-6xl lg:text-7xl font-bold leading-[1.05] tracking-tight lg:text-6xl">

                    {{ get_the_title() }}

                </h1>

                @if(get_field('recommendation_summary'))

                    <div class="mt-8 max-w-2xl text-lg leading-8 text-text-muted">

                        {!! wp_kses_post(get_field('recommendation_summary')) !!}

                    </div>

                @endif

                @if(get_field('verdict'))

                <div class="mt-8 rounded-[28px] border border-primary/15 bg-primary/5 p-6">

                    <div class="flex items-start gap-4">

                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-primary text-white">

                            <i
                                data-lucide="sparkles"
                                class="h-6 w-6">
                            </i>

                        </div>

                        <div>

                            <p class="text-sm font-semibold uppercase tracking-widest text-primary">

                                FLVRTX Verdict

                            </p>

                            <p class="mt-2 text-lg font-semibold leading-8 text-text">

                                {{ get_field('verdict') }}

                            </p>

                        </div>

                    </div>

                </div>

            @endif

                {{-- Product Meta --}}
                <div class="mt-10 flex flex-wrap gap-4">

                    @if(get_field('rating'))

                        <x-ui.badge class="bg-white">

                            ⭐ {{ get_field('rating') }}/5

                        </x-ui.badge>

                    @endif

                    @if(get_field('price'))

                        <x-ui.badge class="bg-white">

                            ₹ {{ get_field('price') }}

                        </x-ui.badge>

                    @endif

                    @if(get_field('brand'))

                        <x-ui.badge class="bg-white">

                            {{ get_field('brand') }}

                        </x-ui.badge>

                    @endif

                    @php
                        $categories = get_the_terms(get_the_ID(), 'recommendation_category');
                    @endphp
                    
                    @if($categories && ! is_wp_error($categories))
                    
                        <x-ui.badge class="bg-white">
                    
                            {{ $categories[0]->name }}
                    
                        </x-ui.badge>
                    
                    @endif

                </div>
                
                {{-- Save Pick --}}
                <div class="mt-8">

                    @if(is_user_logged_in())

                        @php
                            $saved_picks = get_user_meta(
                                get_current_user_id(),
                                '_flvrtx_saved_picks',
                                true
                            );

                            if (!is_array($saved_picks)) {
                                $saved_picks = [];
                            }

                            $is_saved = in_array(get_the_ID(), $saved_picks, true);
                        @endphp


                        @if($is_saved)

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
                                    value="{{ get_the_ID() }}">

                                <input
                                    type="hidden"
                                    name="flvrtx_unsave_pick_nonce"
                                    value="{{ wp_create_nonce('flvrtx_unsave_pick') }}">

                                <button
                                    type="submit"
                                    class="inline-flex items-center gap-2 rounded-2xl border border-primary bg-primary px-5 py-3 text-sm font-semibold text-white transition-all duration-300 hover:-translate-y-0.5 hover:bg-primary/90">

                                    <i
                                        data-lucide="bookmark-check"
                                        class="h-5 w-5">
                                    </i>

                                    Saved

                                </button>

                            </form>

                        @else

                            <form
                                method="POST"
                                action="{{ admin_url('admin-post.php') }}">

                                <input
                                    type="hidden"
                                    name="action"
                                    value="flvrtx_save_pick">

                                <input
                                    type="hidden"
                                    name="pick_id"
                                    value="{{ get_the_ID() }}">

                                <input
                                    type="hidden"
                                    name="flvrtx_save_pick_nonce"
                                    value="{{ wp_create_nonce('flvrtx_save_pick') }}">

                                <button
                                    type="submit"
                                    class="inline-flex items-center gap-2 rounded-2xl border border-border bg-white px-5 py-3 text-sm font-semibold text-text transition-all duration-300 hover:-translate-y-0.5 hover:border-primary hover:text-primary">

                                    <i
                                        data-lucide="bookmark"
                                        class="h-5 w-5">
                                    </i>

                                    Save Pick

                                </button>

                            </form>

                        @endif

                    @else

                        <a
                            href="{{ add_query_arg(
                                'redirect_to',
                                get_permalink(),
                                home_url('/login/')
                            ) }}"
                            class="inline-flex items-center justify-center gap-2 rounded-2xl border border-border bg-white px-5 py-3 text-sm font-semibold text-text transition-all duration-300 hover:-translate-y-0.5 hover:border-primary hover:text-primary">

                            <i
                                data-lucide="bookmark"
                                class="h-5 w-5">
                            </i>

                            Sign in to Save

                        </a>

                    @endif

                </div>

                {{-- Trust --}}
                <div class="mt-10 rounded-[28px] border border-primary/15 bg-primary/5 p-6">

                    <div class="flex items-start gap-4">

                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-primary text-white">

                            <i data-lucide="shield-check"></i>

                        </div>

                        <div>

                            <h3 class="font-bold text-text">

                                Personally Recommended by FLVRTX

                            </h3>

                            <p class="mt-2 leading-7 text-text-muted">

                                Every recommendation is selected based on quality, value, usability, and our cooking experience.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Product Image --}}
            <div>

                @if(has_post_thumbnail())

                    <div class="overflow-hidden rounded-[36px] bg-white shadow-[0_24px_48px_rgba(0,0,0,0.12)]">

                        {!! get_the_post_thumbnail(
                            get_the_ID(),
                            'large',
                            [
                                'class' => 'w-full object-cover transition duration-500 hover:scale-105',
                                'loading' => 'eager',
                                'fetchpriority' => 'high',
                                'decoding' => 'async',
                            ]
                        ) !!}

                    </div>

                @endif

            </div>

        </div>

    </x-container>

</section>