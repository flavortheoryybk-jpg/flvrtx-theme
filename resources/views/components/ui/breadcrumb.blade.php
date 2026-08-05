@props([
    'items' => [],
])

<nav
    class="mb-8"
    aria-label="{{ __('Breadcrumb', 'flvrtx') }}">

    <ol class="flex flex-wrap items-center gap-2 text-sm text-text-muted">

        @foreach ($items as $item)

            <li class="flex items-center gap-2">

                @unless ($loop->first)

                    <span
                        class="select-none text-text-muted"
                        aria-hidden="true">

                        /

                    </span>

                @endunless

                @if (isset($item['url']))

                    <a
                        href="{{ $item['url'] }}"
                        class="transition-colors duration-300 hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">

                        {{ $item['label'] }}

                    </a>

                @else

                    <span
                        class="font-medium text-text"
                        aria-current="page">

                        {{ $item['label'] }}

                    </span>

                @endif

            </li>

        @endforeach

    </ol>

</nav>