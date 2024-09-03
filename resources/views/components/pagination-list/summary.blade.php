@php
    $itemsCount = count($paginator->items());
@endphp
@if ($paginator->hasPages())
    @php
        $total = $paginator->total();
        $startNth = ($paginator->currentPage() - 1) * $paginator->perPage() + 1;
        $endNth = $startNth + $itemsCount - 1;
    @endphp
    <p {{ $attributes->class(['text-gray-600 text-sm']) }}>
        Affichage des
        <strong class="text-black">{{ $startNth }}</strong>
        -
        <strong class="text-black">{{ $endNth }}</strong>
        des
        <strong class="text-black">{{ $total }}</strong> résultats
    </p>
@elseif ($itemsCount > 0)
    <p {{ $attributes->class(['text-gray-600 text-sm']) }}>
        <strong class="text-black">{{ $itemsCount }}</strong> résultats
    </p>
@else
    <p {{ $attributes->class(['text-gray-600 text-sm']) }}>
        Aucun resultat
    </p>
@endif
