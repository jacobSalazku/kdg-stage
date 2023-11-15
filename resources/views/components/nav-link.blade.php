@props(['active'])

@php
$classes = ($active ?? false)
            ? ' text-kdg-white text-md font-semibold hover:text-kdg-white px-2 py-8'
            :' transition delay-50 ease-out text-kdg-white hover:text-kdg-white px-4 py-8' ;
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
