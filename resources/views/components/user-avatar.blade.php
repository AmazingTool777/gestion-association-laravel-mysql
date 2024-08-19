@props(['photo', 'fontsize' => '14px', 'width' => '36px'])

<span class="app-user-avatar relative flex items-center justify-center"
    style="font-size: {{ $fontsize }}; width: {{ $width }}">
    @if (!$photo)
        {{ $getAccronym() }}
    @else
        <img src={{ "$photo" }} alt={{ "$firstname $lastname" }} class="w-full h-full object-cover">
    @endif
</span>
