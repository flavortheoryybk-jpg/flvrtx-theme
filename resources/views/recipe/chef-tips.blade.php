@if(get_field('chef_tips'))

<section class="bg-background py-20">

    <x-container>

        <div class="mx-auto max-w-5xl">
            <x-ui.section-header
              badge="Chef Tips"
              title="Tips for the Best Results"
              description="Small techniques that make a big difference." />

            <div class="mt-10 rounded-3xl border border-primary/20 bg-primary/5 p-8">

                <ul class="space-y-5">

                    @foreach(explode("\n", trim(get_field('chef_tips'))) as $tip)

                        @if(trim($tip))

                            <li class="flex items-start gap-4">

                                <div class="mt-1 flex h-8 w-8 items-center justify-center rounded-full bg-primary text-white">

                                    <i data-lucide="lightbulb" class="h-4 w-4"></i>

                                </div>

                                <span class="text-lg leading-8">
                                    {{ trim($tip) }}
                                </span>

                            </li>

                        @endif

                    @endforeach

                </ul>

            </div>

        </div>

    </x-container>

</section>

@endif