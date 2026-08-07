<div {{ $attributes->merge([
    'class' => 'rounded-[32px] border border-border/60 bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg'
]) }}>

    {{ $slot }}

</div>