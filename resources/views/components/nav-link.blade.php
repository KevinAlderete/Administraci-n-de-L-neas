@props(['active'])

@php
$classes = ($active ?? false)
            ? 'relative flex items-center space-x-4 bg-gradient-to-r rounded-full from-sky-800 to-cyan-600 px-4 py-3 text-white'
            : 'bg group hover:bg-gray-700 flex items-center space-x-4 rounded-full px-4 py-3 text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
