<section class="bg-background py-20 lg:py-24">

    <x-container>

        <div class="mx-auto max-w-4xl">

            <article
                class="prose prose-lg max-w-none
                prose-headings:font-heading
                prose-headings:font-bold
                prose-headings:tracking-tight
                prose-headings:text-text
                prose-p:leading-8
                prose-p:text-text-muted
                prose-strong:text-text
                prose-li:text-text-muted
                prose-li:marker:text-primary
                prose-img:rounded-3xl
                prose-img:shadow-lg
                prose-a:text-primary
                prose-a:no-underline
                hover:prose-a:underline">

                {!! apply_filters('the_content', get_the_content()) !!}

            </article>

            @if(get_field('recommendation_reason'))

                <div class="mt-16 rounded-[32px] border border-primary/15 bg-gradient-to-br from-primary/5 to-white p-10 shadow-[0_20px_40px_rgba(0,0,0,0.06)]">

                    <div class="flex items-start gap-5">

                        <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-primary text-white">

                            <i data-lucide="badge-check"></i>

                        </div>

                        <div>

                            <h2 class="text-3xl font-bold">

                                Why We Recommend It

                            </h2>

                            <div class="prose mt-5 max-w-none">

                                {!! wp_kses_post(get_field('recommendation_reason')) !!}

                            </div>

                        </div>

                    </div>

                </div>

            @endif

        </div>

    </x-container>

</section>

<section class="bg-white py-20 lg:py-24">

    <x-container>

        <div class="grid gap-8 lg:grid-cols-3">

            {{-- Pros --}}
            <x-ui.card class="h-full">

                <h2 class="text-2xl font-bold text-green-700">

                    👍 Pros

                </h2>

                <ul class="mt-8 space-y-5">

                    @foreach(collect(preg_split('/\r\n|\r|\n/', get_field('pros') ?? ''))->filter() as $item)

                        <li class="flex items-start gap-4">

                            <i data-lucide="check-circle" class="mt-1 h-5 w-5 shrink-0 text-green-600"></i>

                            <span class="leading-7">

                                {{ trim($item) }}

                            </span>

                        </li>

                    @endforeach

                </ul>

            </x-ui.card>

            {{-- Cons --}}
            <x-ui.card class="h-full">

                <h2 class="text-2xl font-bold text-red-700">

                    👎 Cons

                </h2>

                <ul class="mt-8 space-y-5">

                    @foreach(collect(preg_split('/\r\n|\r|\n/', get_field('cons') ?? ''))->filter() as $item)

                        <li class="flex items-start gap-4">

                            <i data-lucide="x-circle" class="mt-1 h-5 w-5 shrink-0 text-red-600"></i>

                            <span class="leading-7">

                                {{ trim($item) }}

                            </span>

                        </li>

                    @endforeach

                </ul>

            </x-ui.card>

            {{-- Best For --}}
            <x-ui.card class="h-full">

                <h2 class="text-2xl font-bold text-primary">

                    🎯 Best For

                </h2>

                <ul class="mt-8 space-y-5">

                    @foreach(collect(preg_split('/\r\n|\r|\n/', get_field('best_for') ?? ''))->filter() as $item)

                        <li class="flex items-start gap-4">

                            <i data-lucide="chef-hat" class="mt-1 h-5 w-5 shrink-0 text-primary"></i>

                            <span class="leading-7">

                                {{ trim($item) }}

                            </span>

                        </li>

                    @endforeach

                </ul>

            </x-ui.card>

        </div>

    </x-container>

</section>