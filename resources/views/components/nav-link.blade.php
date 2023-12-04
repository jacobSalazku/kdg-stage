@props(['active'])

@php
    $classes = ($active ?? false)
    ? 'text-kdg-white text-md hover:text-kdg-white px-2 py-6 border-b-2 border-kdg-white hover:border-kdg-white'
    : 'text-kdg-white text-md hover:text-kdg-white px-2 py-6 border-b-2 border-transparent';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
