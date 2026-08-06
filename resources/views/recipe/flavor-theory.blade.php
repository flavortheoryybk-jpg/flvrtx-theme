@if(get_field('flavor_theory'))

<x-ui.section
    id="flavor-theory"
    class="bg-gradient-to-br from-primary/5 via-background to-primary/10">

    <div class="mx-auto max-w-5xl">

        <x-ui.section-heading
            eyebrow="FLVRTX LAB"
            title="Why This Recipe Works"
            description="Understanding the science behind a recipe helps you cook with confidence, troubleshoot mistakes, and consistently achieve better results."
        />

        <x-ui.card class="mt-16">

            <div
                class="prose prose-lg max-w-none
                    prose-headings:font-bold
                    prose-headings:tracking-tight
                    prose-headings:text-text
                    prose-headings:scroll-mt-28
                    prose-p:leading-8
                    prose-p:text-text-muted
                    prose-p:mb-6
                    prose-strong:text-text
                    prose-ul:my-6
                    prose-ol:my-6
                    prose-li:my-2
                    prose-li:text-text-muted
                    prose-li:marker:text-primary
                    prose-blockquote:border-primary
                    prose-blockquote:text-text
                    prose-code:text-primary
                    prose-a:text-primary
                    prose-a:no-underline
                    hover:prose-a:underline">

                {!! wp_kses_post(get_field('flavor_theory')) !!}

            </div>

        </x-ui.card>

    </div>

</x-ui.section>

@endif