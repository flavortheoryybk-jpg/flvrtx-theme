<section class="py-20 bg-background">

    <x-container>

        <div class="mx-auto max-w-4xl">

            <div class="prose prose-lg max-w-none">

                {!! apply_filters('the_content', get_the_content()) !!}

            </div>

            @if(get_field('recommendation_reason'))

                <div class="mt-12 rounded-3xl bg-white p-8 shadow-sm border border-border">

                    <h2 class="text-2xl font-bold">
                        Why I Recommend It
                    </h2>

                    <div class="mt-4 prose max-w-none">

                        {!! get_field('recommendation_reason') !!}

                    </div>

                </div>

            @endif

        </div>

    </x-container>

</section>

<x-ui.section>

    <div class="grid gap-8 lg:grid-cols-3">

        {{-- Pros --}}
        <x-ui.card>

            <h2 class="text-2xl font-bold text-green-700">

                👍 Pros

            </h2>

            <ul class="mt-6 space-y-4">

                @foreach(explode("\n", trim(get_field('pros'))) as $item)

                    @if(trim($item))

                        <li class="flex gap-3">

                            <i data-lucide="check-circle" class="mt-1 h-5 w-5 text-green-600"></i>

                            <span>{{ trim($item) }}</span>

                        </li>

                    @endif

                @endforeach

            </ul>

        </x-ui.card>

        {{-- Cons --}}
        <x-ui.card>

            <h2 class="text-2xl font-bold text-red-700">

                👎 Cons

            </h2>

            <ul class="mt-6 space-y-4">

                @foreach(explode("\n", trim(get_field('cons'))) as $item)

                    @if(trim($item))

                        <li class="flex gap-3">

                            <i data-lucide="x-circle" class="mt-1 h-5 w-5 text-red-600"></i>

                            <span>{{ trim($item) }}</span>

                        </li>

                    @endif

                @endforeach

            </ul>

        </x-ui.card>

        {{-- Best For --}}
        <x-ui.card>

            <h2 class="text-2xl font-bold text-primary">

                🎯 Best For

            </h2>

            <ul class="mt-6 space-y-4">

                @foreach(explode("\n", trim(get_field('best_for'))) as $item)

                    @if(trim($item))

                        <li class="flex gap-3">

                            <i data-lucide="chef-hat" class="mt-1 h-5 w-5 text-primary"></i>

                            <span>{{ trim($item) }}</span>

                        </li>

                    @endif

                @endforeach

            </ul>

        </x-ui.card>

    </div>

</x-ui.section>