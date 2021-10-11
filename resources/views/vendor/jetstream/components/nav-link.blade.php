@props(['active'])

@php
$classes = $active ?? false ? 'active2' : '';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
