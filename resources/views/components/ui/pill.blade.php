@props([
    'color' => 'primary',
])

<span {{ $attributes->merge([
    'class' => 'inline-flex items-center rounded-full border border-primary/15 bg-primary/5 px-4 py-2 text-xs font-semibold uppercase tracking-[0.15em] text-primary'
]) }}>

    {{ $slot }}

</span>