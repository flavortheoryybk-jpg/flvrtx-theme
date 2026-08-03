@props([
    'color' => 'primary',
])

<span
    {{ $attributes->merge([
        'class' => 'inline-flex rounded-full bg-primary/10 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-primary'
    ]) }}>

    {{ $slot }}

</span>