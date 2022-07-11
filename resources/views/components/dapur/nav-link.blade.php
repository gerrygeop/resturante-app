@props(['active'])

@php
$classes = $active ?? false ? 'border-indigo-600 text-indigo-600 font-semibold' : 'border-transparent hover:border-slate-300 text-gray-500 hover:text-gray-700 font-medium';
@endphp

<a
   {{ $attributes->merge(['class' => 'block px-4 mb-6 text-sm ' . $classes . ' bg-transparent focus:text-indigo-800 border-l-2 focus:outline-none focus:shadow-outline']) }}>
   {{ $slot }}
</a>
