@props(['active'])

@php
    $classes = ($active ?? false)
    ? 'text-kdg-white text-md hover:text-kdg-white px-3 py-1.5 border-b-2 border-transparent bg-kdg-dark-blue rounded'
    : 'flex-row justify-center bg-kdg-blue text-kdg-white py-1.5 px-2 rounded transition-all hover:bg-kdg-dark-blue'

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
