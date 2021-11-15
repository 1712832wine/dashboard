@props(['active', 'route'])

@php
$classes = request()->routeIs($route) ? 'active' : '';
@endphp

<li>
    <a href="{{ route($route) }}" {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
</li>
