@if(get_field('flavor_theory'))

<section class="py-24 bg-gradient-to-br from-primary/5 via-white to-primary/10">

    <x-container>

        <div class="mx-auto max-w-5xl">

            <x-ui.section-header
              badge="🧪 FLVRTX LAB"
              title="Why This Recipe Works"
              description="Understanding the science behind cooking helps you become a better cook, not just follow instructions." />

            <div class="mt-12 rounded-[32px] border border-primary/20 bg-white p-10 shadow-xl">

                <div class="prose prose-lg max-w-none prose-headings:font-bold prose-headings:text-text prose-p:text-text-muted prose-li:text-text-muted">

                    {!! wp_kses_post(get_field('flavor_theory')) !!}

                </div>

            </div>

        </div>

    </x-container>

</section>

@endif