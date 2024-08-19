{{-- @props(['href', 'activeClassName' => 'active']) --}}

<a {{ $attributes->class([$activeClassName => $isActive($href)]) }} href={{ $href }}>
    {{ $slot }}
</a>
