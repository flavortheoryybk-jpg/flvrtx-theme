@props([
    'items' => [],
    'icon' => 'check',
])

<ul class="divide-y divide-border/20 rounded-[32px] border border-border/30 bg-white">

    @foreach($items as $item)

        <li class="flex items-start gap-5 p-6 transition-colors duration-300 hover:bg-primary/5">

            <div class="mt-1 flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-primary/10">

                <i
                    data-lucide="{{ $icon }}"
                    class="h-5 w-5 text-primary">
                </i>

            </div>

            <span class="text-lg leading-8">

                {{ $item }}

            </span>

        </li>

    @endforeach

</ul>