@props([
    'type' => 'text',
])

<input
    type="{{ $type }}"
    {{ $attributes->merge([
        'class'=>'w-full rounded-2xl border border-border bg-white px-5 py-3 outline-none transition-all focus:border-primary'
    ]) }}>