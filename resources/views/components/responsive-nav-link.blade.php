@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex flex-row justify-center w-full text-kdg-white px-4 py-10 transition duration-150 ease-in-out hover:bg-p-black'
            :  'flex flex-row justify-center w-full text-kdg-white px-4 py-10 hover:bg-p-black duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
