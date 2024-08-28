@props(['params', 'defaultQuery', 'pageSize' => null])

<section aria-label="Triage" aria-describedby="page-sort-toggle" class="dropdown">
    <button id="page-sort-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"
        class="btn btn-light dropdown-toggle font-semibold">
        <i class="fa-solid fa-sort mr-2"></i>
        Trier par:
    </button>
    <ul class="dropdown-menu">
        @php
            $count = count($params);
        @endphp
        @for ($i = 0; $i < $count; $i++)
            @php
                $param = $params[$i];
            @endphp
            <li>
                <h6 class="dropdown-header">{{ $param['name'] }}</h6>
            </li>
            @foreach ($param['orders'] as $order)
                <li>
                    @php
                        $faIcon = isset($order['fa-icon'])
                            ? $order['fa-icon']
                            : ($order['value'] === 'asc'
                                ? 'angle-up'
                                : 'angle-down');
                    @endphp
                    <a href="{{ DataListQueryParamsUtils::getSortParamURL($param['key'], $order['value'], $pageSize) }}"
                        class="dropdown-item @if (DataListQueryParamsUtils::matchesSortQuery($param['key'], $order['value'], $defaultQuery)) active @endif">
                        <i class="fa-solid fa-{{ $faIcon }} mr-2"></i>
                        {{ $order['label'] }}
                    </a>
                </li>
            @endforeach
            @if ($i < $count - 1)
                <li>
                    <hr class="dropdown-divider">
                </li>
            @endif
        @endfor
    </ul>
</section>
