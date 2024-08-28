@if ($paginator->hasPages())
    @php
        $currentPage = $paginator->currentPage();
        $hasPrevPage = $currentPage > 1;
        $prevLink = $hasPrevPage ? Request::fullUrlWithQuery(['page' => $currentPage - 1]) : '#';
        $hasNextPage = $paginator->hasMorePages();
        $nextLink = $hasNextPage ? Request::fullUrlWithQuery(['page' => $currentPage + 1]) : '#';
        $lastPage = $paginator->lastPage();
    @endphp

    <nav aria-label="Pagination" class="mt-12 w-fit mx-auto">
        <ul class="pagination">
            <li class="page-item @if (!$hasPrevPage) disabled @endif">
                <a href="{{ $prevLink }}" class="page-link">
                    Précédent
                </a>
            </li>
            @for ($page = 1; $page <= $lastPage; $page++)
                @php
                    $isActive = $page === $currentPage;
                    $url = Request::fullUrlWithQuery(['page' => $page]);
                @endphp

                <li class="page-item @if ($isActive) active @endif"
                    @if ($isActive) aria-current="page" @endif>
                    <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                </li>
            @endfor
            <li class="page-item @if (!$hasNextPage) disabled @endif">
                <a href="{{ $nextLink }}" class="page-link">Suivant</a>
            </li>
        </ul>
    </nav>
@endif
