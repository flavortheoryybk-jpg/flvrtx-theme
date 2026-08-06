<section class="mt-16 border-t border-border pt-10">

    <h3 class="text-xl font-bold">

        Share this Recipe

    </h3>

    <div class="mt-6 flex flex-wrap gap-4">

        <a
            href="https://wa.me/?text={{ urlencode(get_permalink()) }}"
            target="_blank"
            rel="noopener"
            class="rounded-xl border border-border px-5 py-3 transition hover:border-primary">

            WhatsApp

        </a>

        <a
            href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(get_permalink()) }}"
            target="_blank"
            rel="noopener"
            class="rounded-xl border border-border px-5 py-3 transition hover:border-primary">

            Facebook

        </a>

        <a
            href="https://twitter.com/intent/tweet?url={{ urlencode(get_permalink()) }}&text={{ urlencode(get_the_title()) }}"
            target="_blank"
            rel="noopener"
            class="rounded-xl border border-border px-5 py-3 transition hover:border-primary">

            X

        </a>

        @if(get_post_type() === 'recipe')

            <a
                href="https://pinterest.com/pin/create/button/?url={{ urlencode(get_permalink()) }}&media={{ urlencode(get_the_post_thumbnail_url()) }}&description={{ urlencode(get_the_title()) }}"
                target="_blank"
                rel="noopener"
                class="rounded-xl border border-border px-5 py-3 transition hover:border-primary">

                Pinterest

            </a>

        @endif

        <button
            onclick="navigator.clipboard.writeText('{{ get_permalink() }}')"
            class="rounded-xl bg-primary px-5 py-3 font-semibold text-white transition hover:opacity-90">

            Copy Link

        </button>

    </div>

</section>