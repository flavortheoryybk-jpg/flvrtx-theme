@props([
    'color' => 'primary',
])

<span {{ $attributes->merge([
'class' => 'inline-flex items-center rounded-full bg-primary/8 px-4 py-2 text-xs font-semibold uppercase tracking-[0.15em] text-primary ring-1 ring-primary/15'
]) }}>

    {{ $slot }}

</span>