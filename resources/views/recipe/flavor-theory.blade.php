@if (get_field('flavor_theory'))

<section class="bg-gradient-to-br from-primary/5 via-background to-primary/10 py-24 lg:py-28" id="flavor-theory">

    <x-container>

        <div class="mx-auto max-w-5xl">

            <x-ui.section-heading
                eyebrow="🧪 FLVRTX LAB"
                title="Why This Recipe Works"
                description="Great cooking starts with understanding. Learn the science and techniques behind this recipe so you can confidently recreate it every time." />

            <div class="mt-14 overflow-hidden rounded-[36px] border border-primary/15 bg-white p-10 shadow-[0_24px_48px_rgba(0,0,0,0.08)] lg:p-12">

                <div class="prose prose-lg max-w-none
                    prose-headings:font-bold
                    prose-headings:tracking-tight
                    prose-headings:text-text
                    prose-p:leading-8
                    prose-p:text-text-muted
                    prose-strong:text-text
                    prose-li:text-text-muted
                    prose-li:marker:text-primary
                    prose-a:text-primary
                    prose-a:no-underline
                    hover:prose-a:underline">

                    {!! wp_kses_post(get_field('flavor_theory')) !!}

                </div>

            </div>

        </div>

    </x-container>

</section>

@endif