@if(get_the_content())

<x-ui.section id="recipe-guide">

    <div class="mx-auto max-w-5xl">

        <x-ui.section-heading
            eyebrow="Complete Guide"
            title="Everything You Need to Know"
            description="Go beyond the recipe with detailed explanations, practical cooking advice, and additional insights to help you master this dish."
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
                    prose-ul:my-6
                    prose-ol:my-6
                    prose-li:my-2
                    prose-li:text-text-muted
                    prose-li:marker:text-primary
                    prose-strong:text-text
                    prose-blockquote:border-primary
                    prose-blockquote:text-text
                    prose-code:text-primary
                    prose-a:text-primary
                    prose-a:no-underline
                    hover:prose-a:underline">

                {!! apply_filters('the_content', get_the_content()) !!}

            </div>

        </x-ui.card>

    </div>

</x-ui.section>

@endif