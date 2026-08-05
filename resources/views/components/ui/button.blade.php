@props([
    'variant' => 'primary',
])

@php
$classes = match($variant){
    'secondary' => 'border border-border bg-white text-text hover:border-primary transition-colors duration-300 hover:text-primary',
    'ghost' => 'text-primary hover:bg-primary/5',
    default => 'bg-primary text-white hover:opacity-90'
};
@endphp

<a {{ $attributes->merge([
'class' => "inline-flex items-center justify-center gap-2 rounded-xl px-6 py-3 font-semibold transition-all duration-300 $classes"
]) }}>

    {{ $slot }}

</a>