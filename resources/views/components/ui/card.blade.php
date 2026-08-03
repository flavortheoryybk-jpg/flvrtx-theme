@props([
    'href' => null,
])

@if($href)

<a
    href="{{ $href }}"
    {{ $attributes->merge([
        'class' => 'group block overflow-hidden rounded-3xl border border-border bg-white transition-all duration-300 hover:-translate-y-2 hover:shadow-xl'
    ]) }}>

    {{ $slot }}

</a>

@else

<div
    {{ $attributes->merge([
        'class' => 'overflow-hidden rounded-3xl border border-border bg-white'
    ]) }}>

    {{ $slot }}

</div>

@endif