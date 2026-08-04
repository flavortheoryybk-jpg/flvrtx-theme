@if(
    get_field('amazon_link') ||
    get_field('flipkart_link') ||
    get_field('meesho_link')
)

<x-ui.section>

    <x-ui.section-header
        badge="Buy Now"
        title="Where to Buy"
        description="Purchase this product from trusted retailers." />

    <div class="flex flex-wrap gap-4">

        @if(get_field('amazon_link'))

            <a
                href="{{ get_field('amazon_link') }}"
                target="_blank"
                rel="nofollow sponsored noopener"
                class="rounded-xl bg-primary px-6 py-3 font-semibold text-white">

                Buy on Amazon

            </a>

        @endif

        @if(get_field('flipkart_link'))

            <a
                href="{{ get_field('flipkart_link') }}"
                target="_blank"
                rel="nofollow sponsored noopener"
                class="rounded-xl border border-border px-6 py-3 font-semibold">
            
                Buy on Flipkart
            
            </a>

        @endif

        @if(get_field('meesho_link'))

            <a
                href="{{ get_field('meesho_link') }}"
                target="_blank"
                rel="nofollow sponsored noopener"
                class="rounded-xl border border-border px-6 py-3 font-semibold">
            
                Buy on Meesho
            
            </a>

        @endif

    </div>

</x-ui.section>

@endif