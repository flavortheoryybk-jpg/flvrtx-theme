<section class="pb-24 lg:pb-32">

    <x-container>

        <div class="grid gap-16 lg:grid-cols-12">

            {{-- Main Content --}}
            <div class="lg:col-span-8">

                @if (has_post_thumbnail())

                    <div class="mb-14 overflow-hidden rounded-[36px] shadow-[0_24px_48px_rgba(0,0,0,0.12)]">

                        {!! get_the_post_thumbnail(
                            get_the_ID(),
                            'large',
                            [
                                'class' => 'w-full object-cover',
                                'loading' => 'eager',
                                'fetchpriority' => 'high',
                                'decoding' => 'async',
                            ]
                        ) !!}

                    </div>

                @endif

                <article
                    class="prose prose-lg max-w-none
                    prose-headings:font-heading
                    prose-headings:font-bold
                    prose-headings:tracking-tight
                    prose-headings:text-text
                    prose-p:leading-8
                    prose-p:text-text-muted
                    prose-strong:text-text
                    prose-li:text-text-muted
                    prose-li:marker:text-primary
                    prose-blockquote:border-primary
                    prose-blockquote:text-text
                    prose-img:rounded-[32px]
                    prose-img:shadow-lg
                    prose-a:text-primary
                    prose-a:no-underline
                    hover:prose-a:underline">

                    {!! the_content() !!}

                </article>

            </div>

            {{-- Sidebar --}}
            <aside class="space-y-8 lg:col-span-4 lg:sticky lg:top-28 lg:self-start">

                {{-- Article Information --}}
                <x-ui.card>

                    <h3 class="text-xl font-bold">

                        Article Information

                    </h3>

                    <div class="mt-6 space-y-5">

                        @if(get_field('reading_time'))

                            <div class="flex items-center justify-between">

                                <span class="text-text-muted">

                                    Reading Time

                                </span>

                                <span class="font-semibold">

                                    {{ get_field('reading_time') }} min

                                </span>

                            </div>

                        @endif

                        @if(get_field('difficulty'))

                            <div class="flex items-center justify-between">

                                <span class="text-text-muted">

                                    Difficulty

                                </span>

                                <span class="font-semibold">

                                    {{ get_field('difficulty') }}

                                </span>

                            </div>

                        @endif

                        <div class="flex items-center justify-between">

                            <span class="text-text-muted">

                                Published

                            </span>

                            <span class="font-semibold">

                                {{ get_the_date('F j, Y') }}

                            </span>

                        </div>

                    </div>

                </x-ui.card>

                {{-- Share --}}
                <x-ui.card>

                    <h3 class="text-xl font-bold">

                        Share this Article

                    </h3>

                    <p class="mt-2 text-text-muted">

                        Help others discover this article.

                    </p>

                    <div class="mt-6 flex flex-wrap gap-3">

                        {{-- Facebook --}}
                        <a
                            href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(get_permalink()) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Share on Facebook"
                            title="Share on Facebook"
                            class="flex h-12 w-12 items-center justify-center rounded-xl border border-border transition-all duration-300 hover:border-primary hover:bg-primary hover:text-white">

                            <svg viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5" aria-hidden="true">
                                <path d="M14 8h3V4h-3c-3.31 0-5 1.69-5 5v3H6v4h3v8h4v-8h3l1-4h-4V9c0-.66.34-1 1-1z"/>
                            </svg>

                        </a>


                        {{-- X --}}
                        <a
                            href="https://twitter.com/intent/tweet?url={{ urlencode(get_permalink()) }}&text={{ urlencode(get_the_title()) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Share on X"
                            title="Share on X"
                            class="flex h-12 w-12 items-center justify-center rounded-xl border border-border transition-all duration-300 hover:border-primary hover:bg-primary hover:text-white">

                            <svg viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5" aria-hidden="true">
                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817-5.963 6.817H1.684l7.73-8.835L1.254 2.25H8.08l4.713 6.231 5.45-6.231zm-1.161 17.52h1.833L7.084 4.126H5.117L17.083 19.77z"/>
                            </svg>

                        </a>


                        {{-- WhatsApp --}}
                        <a
                            href="https://wa.me/?text={{ urlencode(get_the_title() . ' ' . get_permalink()) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Share on WhatsApp"
                            title="Share on WhatsApp"
                            class="flex h-12 w-12 items-center justify-center rounded-xl border border-border transition-all duration-300 hover:border-primary hover:bg-primary hover:text-white">

                            <svg viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5" aria-hidden="true">
                                <path d="M20.52 3.48A11.85 11.85 0 0 0 12.05 0C5.48 0 .13 5.35.13 11.92c0 2.1.55 4.15 1.6 5.95L.03 24l6.27-1.64a11.87 11.87 0 0 0 5.75 1.47h.01c6.57 0 11.92-5.35 11.92-11.92 0-3.18-1.24-6.17-3.46-8.43ZM12.06 21.83h-.01a9.9 9.9 0 0 1-5.04-1.38l-.36-.21-3.72.97.99-3.63-.23-.37a9.9 9.9 0 1 1 8.37 4.62Zm5.43-7.42c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.95 1.17-.17.2-.35.22-.65.07-.3-.15-1.25-.46-2.38-1.47-.88-.79-1.47-1.76-1.64-2.06-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.61-.92-2.21-.24-.58-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37-.27.3-1.04 1.02-1.04 2.48s1.07 2.88 1.22 3.08c.15.2 2.1 3.2 5.09 4.49.71.31 1.27.5 1.71.64.72.23 1.37.2 1.89.12.58-.09 1.76-.72 2.01-1.42.25-.7.25-1.3.17-1.42-.07-.12-.27-.2-.57-.35Z"/>
                            </svg>

                        </a>


                        {{-- LinkedIn --}}
                        <a
                            href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(get_permalink()) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Share on LinkedIn"
                            title="Share on LinkedIn"
                            class="flex h-12 w-12 items-center justify-center rounded-xl border border-border transition-all duration-300 hover:border-primary hover:bg-primary hover:text-white">

                            <svg viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5" aria-hidden="true">
                                <path d="M6.94 8.5H3.5V20h3.44V8.5ZM5.22 3A2.02 2.02 0 1 0 5.2 7.04 2.02 2.02 0 0 0 5.22 3ZM20.5 13.41c0-3.47-1.85-5.09-4.32-5.09-1.99 0-2.88 1.1-3.38 1.87V8.5H9.36V20h3.44v-6.39c0-1.68.32-3.31 2.4-3.31 2.05 0 2.08 1.92 2.08 3.42V20h3.44l-.22-6.59Z"/>
                            </svg>

                        </a>


                        {{-- Telegram --}}
                        <a
                            href="https://t.me/share/url?url={{ urlencode(get_permalink()) }}&text={{ urlencode(get_the_title()) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Share on Telegram"
                            title="Share on Telegram"
                            class="flex h-12 w-12 items-center justify-center rounded-xl border border-border transition-all duration-300 hover:border-primary hover:bg-primary hover:text-white">

                            <svg viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5" aria-hidden="true">
                                <path d="M21.9 3.2 18.6 20c-.25 1.18-.9 1.47-1.82.92l-5.02-3.7-2.42 2.33c-.27.27-.5.5-1.03.5l.37-5.11 9.3-8.4c.4-.37-.09-.57-.62-.2L5.86 13.7.9 12.15c-1.08-.34-1.1-1.08.23-1.6L20.5 3.05c.9-.33 1.68.2 1.4.15Z"/>
                            </svg>

                        </a>


                        {{-- Copy Link --}}
                        <button
                            type="button"
                            onclick="
                                const button = this;
                                const url = '{{ esc_url(get_permalink()) }}';
                                const message = button.querySelector('.copy-message');
                        
                                const showCopied = () => {
                                    message.classList.remove('opacity-0', 'translate-y-1');
                                    message.classList.add('opacity-100', 'translate-y-0');
                        
                                    setTimeout(() => {
                                        message.classList.remove('opacity-100', 'translate-y-0');
                                        message.classList.add('opacity-0', 'translate-y-1');
                                    }, 1800);
                                };
                        
                                if (navigator.clipboard && window.isSecureContext) {
                        
                                    navigator.clipboard.writeText(url)
                                        .then(showCopied)
                                        .catch(() => {
                        
                                            const input = document.createElement('textarea');
                        
                                            input.value = url;
                                            input.style.position = 'fixed';
                                            input.style.opacity = '0';
                        
                                            document.body.appendChild(input);
                        
                                            input.focus();
                                            input.select();
                        
                                            try {
                                                document.execCommand('copy');
                                                showCopied();
                                            } catch (error) {
                                                console.error('Unable to copy link:', error);
                                            }
                        
                                            document.body.removeChild(input);
                        
                                        });
                        
                                } else {
                                
                                    const input = document.createElement('textarea');
                        
                                    input.value = url;
                                    input.style.position = 'fixed';
                                    input.style.opacity = '0';
                        
                                    document.body.appendChild(input);
                        
                                    input.focus();
                                    input.select();
                        
                                    try {
                                        document.execCommand('copy');
                                        showCopied();
                                    } catch (error) {
                                        console.error('Unable to copy link:', error);
                                    }
                        
                                    document.body.removeChild(input);
                        
                                }
                            "
                            aria-label="Copy article link"
                            title="Copy link"
                            class="relative flex h-12 w-12 items-center justify-center rounded-xl border border-border transition-all duration-300 hover:border-primary hover:bg-primary hover:text-white">
                        
                            {{-- Link Icon --}}
                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="h-5 w-5"
                                aria-hidden="true">
                        
                                <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
                                <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
                        
                            </svg>
                        
                            {{-- Confirmation --}}
                            <span
                                class="copy-message pointer-events-none absolute left-1/2 top-full z-20 mt-3 -translate-x-1/2 translate-y-1 whitespace-nowrap rounded-lg bg-text px-3 py-1.5 text-xs font-semibold text-white opacity-0 shadow-lg transition-all duration-300">
                        
                                Link copied
                        
                            </span>
                        
                        </button>

                    </div>

                </x-ui.card>

            </aside>

        </div>

    </x-container>

</section>