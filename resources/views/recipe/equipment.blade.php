@if(get_field('equipment'))

<section class="py-20">

    <x-container>

        <div class="mx-auto max-w-5xl">

            <x-ui.section-header
               badge="Equipment"
               title="What You'll Need"
               description="Gather these tools before you begin cooking." />

            <div class="mt-10 rounded-3xl border border-border bg-white p-8">

                <ul class="space-y-4">

                    @foreach(explode("\n", trim(get_field('equipment'))) as $item)

                        @if(trim($item))

                            <li class="flex items-start gap-4">

                                <div class="mt-1 flex h-8 w-8 items-center justify-center rounded-full bg-primary/10">

                                    <i data-lucide="chef-hat" class="h-4 w-4 text-primary"></i>

                                </div>

                                <span class="text-lg">
                                    {{ trim($item) }}
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