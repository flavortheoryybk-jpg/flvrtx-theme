<div {{ $attributes->merge([
    'class' => 'rounded-[32px] bg-white p-8 shadow-sm ring-1 ring-border/10 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg'
]) }}>

    {{ $slot }}

</div>