<div>
    {{-- Pagination result summary --}}
    <x-pagination-list.summary :paginator="$paginator" class="mb-6" />

    {{-- Data list --}}
    {{ $slot }}

    {{-- End of results text --}}
    @if ($paginator->total() > 0 && $paginator->lastPage() === $paginator->currentPage())
        <p class="text-gray-600 mt-6 italic text-sm">Fin des résultats</p>
    @endif

    {{-- Pagination links --}}
    <x-pagination-list.links :paginator="$paginator" />
</div>
