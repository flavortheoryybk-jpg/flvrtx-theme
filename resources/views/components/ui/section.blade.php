@props([
    'as' => 'section',
    'container' => true,
])

<{{ $as }}
    {{ $attributes->merge([
        'class' => 'py-24 lg:py-24',
    ]) }}>

    @if ($container)

        <x-container>

            {{ $slot }}

        </x-container>

    @else

        {{ $slot }}

    @endif

</{{ $as }}>