@if(get_field('key_takeaways'))

<x-ui.section>

    <div class="mx-auto max-w-5xl">

        <x-ui.section-header
            badge="Key Takeaways"
            title="What You Should Remember"
            description="The most important lessons from this article." />

        <div class="grid gap-6 md:grid-cols-2">

            @foreach(explode("\n", trim(get_field('key_takeaways'))) as $item)

                @if(trim($item))

                    <x-ui.card>

                        <div class="flex items-start gap-4">

                            <div class="mt-1 flex h-10 w-10 items-center justify-center rounded-full bg-primary text-white">

                                <i data-lucide="check"></i>

                            </div>

                            <p class="text-lg leading-8">

                                {{ trim($item) }}

                            </p>

                        </div>

                    </x-ui.card>

                @endif

            @endforeach

        </div>

    </div>

</x-ui.section>

@endif