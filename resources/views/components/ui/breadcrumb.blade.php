@props([
    'items' => [],
])

<nav class="mb-8 flex flex-wrap items-center gap-2 text-sm text-text-muted">

    @foreach($items as $item)

        @if(!$loop->first)
            <span>/</span>
        @endif

        @if(isset($item['url']))
            <a href="{{ $item['url'] }}"
               class="transition hover:text-primary">

                {{ $item['label'] }}

            </a>
        @else

            <span class="text-text">

                {{ $item['label'] }}

            </span>

        @endif

    @endforeach

</nav>