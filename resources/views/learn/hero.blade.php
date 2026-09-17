<section class="bg-background py-24 lg:py-32">

    <x-container>

        <div class="mx-auto max-w-5xl text-center">

            <x-ui.badge>

                FLVRTX Learn

            </x-ui.badge>

            <h1 class="mt-8 text-6xl lg:text-7xl font-bold leading-[1.05] tracking-tight lg:text-6xl">

                {{ get_the_title() }}

            </h1>

            @if (get_field('summary'))

                <p class="mx-auto mt-8 max-w-3xl text-xl leading-9 text-text-muted">

                    {{ get_field('summary') }}

                </p>

            @endif

            <div class="mt-12 flex flex-wrap items-center justify-center gap-4">

                @if (get_field('reading_time'))

                    <x-ui.badge class="bg-white">

                        📖 {{ get_field('reading_time') }} min read

                    </x-ui.badge>

                @endif

                <x-ui.badge class="bg-white">

                    📅 {{ get_the_date('F j, Y') }}

                </x-ui.badge>

                @if (get_field('difficulty'))

                    <x-ui.badge class="bg-white">

                        🎓 {{ get_field('difficulty') }}

                    </x-ui.badge>

                @endif

            </div>
            {{-- Save Article --}}
            <div class="mt-8 flex justify-center">
            
                @if(is_user_logged_in())
            
                    @php
                        $saved_learn = get_user_meta(
                            get_current_user_id(),
                            '_flvrtx_saved_learn',
                            true
                        );
            
                        if (!is_array($saved_learn)) {
                            $saved_learn = [];
                        }
            
                        $is_saved = in_array(get_the_ID(), $saved_learn, true);
                    @endphp
            
                    @if($is_saved)
            
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
                                value="{{ get_the_ID() }}">
            
                            <input
                                type="hidden"
                                name="flvrtx_unsave_learn_nonce"
                                value="{{ wp_create_nonce('flvrtx_unsave_learn') }}">
            
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
                                value="flvrtx_save_learn">
            
                            <input
                                type="hidden"
                                name="learn_id"
                                value="{{ get_the_ID() }}">
            
                            <input
                                type="hidden"
                                name="flvrtx_save_learn_nonce"
                                value="{{ wp_create_nonce('flvrtx_save_learn') }}">
            
                            <button
                                type="submit"
                                class="inline-flex items-center gap-2 rounded-2xl border border-border bg-white px-5 py-3 text-sm font-semibold text-text transition-all duration-300 hover:-translate-y-0.5 hover:border-primary hover:text-primary">
            
                                <i
                                    data-lucide="bookmark"
                                    class="h-5 w-5">
                                </i>
            
                                Save Article
            
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
                        class="inline-flex items-center gap-2 rounded-2xl border border-border bg-white px-5 py-3 text-sm font-semibold text-text transition-all duration-300 hover:-translate-y-0.5 hover:border-primary hover:text-primary">
            
                        <i
                            data-lucide="bookmark"
                            class="h-5 w-5">
                        </i>
            
                        Sign in to Save
            
                    </a>
            
                @endif
            
            </div>

        </div>

    </x-container>

</section>