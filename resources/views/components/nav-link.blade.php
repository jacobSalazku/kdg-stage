@props(['active'])

@php
    $classes = ($active ?? false)
    ? 'text-kdg-white text-md hover:text-kdg-white px-1 py-3 border-b-2 border-kdg-white '
    : 'text-kdg-white text-md hover:text-kdg-white px-1 py-3 border-b-2 border-transparent transition-all hover:border-kdg-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
