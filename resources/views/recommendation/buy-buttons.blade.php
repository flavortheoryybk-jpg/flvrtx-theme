@if (
    get_field('amazon_link') ||
    get_field('flipkart_link') ||
    get_field('meesho_link')
)

<section class="bg-background py-20 lg:py-24">

    <x-container>

        <div class="mx-auto max-w-5xl">

            <x-ui.section-heading
                eyebrow="Buy Now"
                title="Where to Buy"
                description="Purchase this product from trusted retailers. Some links may be affiliate links that help support FLVRTX at no additional cost to you." />

            <div class="mt-12 rounded-[32px] border border-border bg-white p-8 shadow-[0_20px_40px_rgba(0,0,0,0.06)]">

                <div class="flex flex-wrap gap-4">

                    @if(get_field('amazon_link'))

                        <x-ui.button
                            href="{{ get_field('amazon_link') }}"
                            target="_blank"
                            rel="nofollow sponsored noopener noreferrer"
                            size="lg">

                            🛒 Buy on Amazon

                        </x-ui.button>

                    @endif

                    @if(get_field('flipkart_link'))

                        <x-ui.button
                            href="{{ get_field('flipkart_link') }}"
                            variant="secondary"
                            target="_blank"
                            rel="nofollow sponsored noopener noreferrer"
                            size="lg">

                            🛍 Buy on Flipkart

                        </x-ui.button>

                    @endif

                    @if(get_field('meesho_link'))

                        <x-ui.button
                            href="{{ get_field('meesho_link') }}"
                            variant="secondary"
                            target="_blank"
                            rel="nofollow sponsored noopener noreferrer"
                            size="lg">

                            🛒 Buy on Meesho

                        </x-ui.button>

                    @endif

                </div>

                <div class="mt-8 rounded-2xl border border-primary/15 bg-primary/5 p-5">

                    <p class="text-sm leading-7 text-text-muted">

                        <strong class="text-text">Affiliate Disclosure:</strong>
                        Some links on this page may be affiliate links. If you purchase through them, FLVRTX may earn a small commission at no extra cost to you. We only recommend products we genuinely trust and would use ourselves.

                    </p>

                </div>

            </div>

        </div>

    </x-container>

</section>

@endif