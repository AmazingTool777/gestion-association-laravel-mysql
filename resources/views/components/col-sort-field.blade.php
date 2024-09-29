@props(['key', 'orders', 'defaultQuery', 'title', 'isDefault' => null, 'alignEnd' => false])

<div class="dropdown col-sort-field">
    @php
        $sortFaIcon =
            Request::query('sort_by', $isDefault ? $key : null) !== $key
                ? 'sort'
                : (Request::query('order', $isDefault) === 'asc'
                    ? 'arrow-up text-primary'
                    : 'arrow-down text-primary');
    @endphp
    <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
        class="btn btn-sm btn-light dropdown-toggle">
        <i class="fa-solid fa-{{ $sortFaIcon }}" data-bs-toggle="tooltip"
            data-bs-title="Trier par {{ $title }}"></i>
    </a>
    <ul class="dropdown-menu @if ($alignEnd) dropdown-menu-end @endif">
        @foreach ($orders as $order)
            @php
                $faIcon = isset($order['fa-icon'])
                    ? $order['fa-icon']
                    : ($order['value'] === 'asc'
                        ? 'angle-up'
                        : 'angle-down');
                $url = DataListQueryParamsUtils::getSortParamURL($key, $order['value']);
                $isActive = DataListQueryParamsUtils::matchesSortQuery($key, $order['value'], $defaultQuery);
            @endphp
            <li>
                <a href="{{ $url }}"
                    class="dropdown-item @if ($isActive) active @endif text-sm">
                    <i class="fa-solid fa-{{ $faIcon }} mr-2"></i>
                    {{ $order['label'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
