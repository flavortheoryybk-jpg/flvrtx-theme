<section class="mt-16 border-t border-border pt-10">

    <div class="rounded-[32px] bg-white p-8 shadow-sm ring-1 ring-border/10 sm:p-10">

        <h3 class="text-4xl font-bold tracking-tight text-text">
            Share this Recipe
        </h3>

        <p class="mt-3 text-lg text-text-muted">
            Help others discover this recipe.
        </p>

        <div class="mt-8 flex flex-wrap gap-4">

            {{-- WhatsApp --}}
            <a
                href="https://wa.me/?text={{ urlencode(get_the_title() . ' ' . get_permalink()) }}"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Share on WhatsApp"
                title="Share on WhatsApp"
                class="flex h-16 w-16 items-center justify-center rounded-2xl border border-border bg-white text-text transition-all duration-300 hover:-translate-y-1 hover:border-primary hover:text-primary">

                <span class="text-lg font-bold">
                    WA
                </span>

            </a>


            {{-- Facebook --}}
            <a
                href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(get_permalink()) }}"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Share on Facebook"
                title="Share on Facebook"
                class="flex h-16 w-16 items-center justify-center rounded-2xl border border-border bg-white text-text transition-all duration-300 hover:-translate-y-1 hover:border-primary hover:text-primary">

                <span class="text-2xl font-bold">
                    f
                </span>

            </a>


            {{-- X --}}
            <a
                href="https://twitter.com/intent/tweet?url={{ urlencode(get_permalink()) }}&text={{ urlencode(get_the_title()) }}"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Share on X"
                title="Share on X"
                class="flex h-16 w-16 items-center justify-center rounded-2xl border border-border bg-white text-text transition-all duration-300 hover:-translate-y-1 hover:border-primary hover:text-primary">

                <span class="text-xl font-semibold leading-none">
                    𝕏
                </span>

            </a>


            {{-- Pinterest --}}
            @if(get_post_type() === 'recipe')

                <a
                    href="https://pinterest.com/pin/create/button/?url={{ urlencode(get_permalink()) }}&media={{ urlencode(get_the_post_thumbnail_url()) }}&description={{ urlencode(get_the_title()) }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Share on Pinterest"
                    title="Share on Pinterest"
                    class="flex h-16 w-16 items-center justify-center rounded-2xl border border-border bg-white text-text transition-all duration-300 hover:-translate-y-1 hover:border-primary hover:text-primary">

                    <span class="text-2xl font-bold">
                        P
                    </span>

                </a>

            @endif


            {{-- Copy Link --}}
            <button
                type="button"
                data-copy-link="{{ esc_attr(get_permalink()) }}"
                class="share-copy-link inline-flex h-16 items-center justify-center gap-3 rounded-2xl border border-border bg-white px-6 font-semibold text-text transition-all duration-300 hover:-translate-y-1 hover:border-primary hover:text-primary">

                <i
                    data-lucide="link"
                    class="share-copy-icon h-6 w-6">
                </i>

                <span class="share-copy-text">
                    Copy Link
                </span>

            </button>

        </div>

    </div>

</section>


<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.share-copy-link').forEach(function (button) {

        button.addEventListener('click', function () {

            const url = button.getAttribute('data-copy-link');
            const text = button.querySelector('.share-copy-text');
            const icon = button.querySelector('.share-copy-icon');

            if (!url || !text) {
                return;
            }

            navigator.clipboard.writeText(url).then(function () {

                text.textContent = 'Copied!';

                if (icon) {
                    icon.setAttribute('data-lucide', 'check');
                }

                if (window.createIcons) {
                    window.createIcons();
                }

                setTimeout(function () {

                    text.textContent = 'Copy Link';

                    if (icon) {
                        icon.setAttribute('data-lucide', 'link');
                    }

                    if (window.createIcons) {
                        window.createIcons();
                    }

                }, 2000);

            }).catch(function () {

                /*
                 * Fallback for browsers where Clipboard API is unavailable.
                 */
                const textarea = document.createElement('textarea');

                textarea.value = url;
                textarea.style.position = 'fixed';
                textarea.style.opacity = '0';

                document.body.appendChild(textarea);

                textarea.select();

                try {
                    document.execCommand('copy');

                    text.textContent = 'Copied!';

                    if (icon) {
                        icon.setAttribute('data-lucide', 'check');
                    }

                    if (window.createIcons) {
                        window.createIcons();
                    }

                    setTimeout(function () {

                        text.textContent = 'Copy Link';

                        if (icon) {
                            icon.setAttribute('data-lucide', 'link');
                        }

                        if (window.createIcons) {
                            window.createIcons();
                        }

                    }, 2000);

                } finally {

                    document.body.removeChild(textarea);

                }

            });

        });

    });

});
</script>