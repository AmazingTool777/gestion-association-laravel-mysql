@props(['href'])

<a {{ $attributes->class([$activeClassName => $isActive($href)]) }} href={{ $href }}>
    {{ $slot }}
</a>
