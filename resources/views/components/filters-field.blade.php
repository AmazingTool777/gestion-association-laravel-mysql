<section aria-label="Filtres">
    <div class="flex items-center gap-x-4 mb-2">
        {{-- Filters toggle --}}
        <button type="button" id="page-filters-toggle" aria-controls="page-filters-wrapper" aria-expanded="true"
            title="Afficher les filtres" class="btn btn-light font-semibold">
            <i class="fa-solid fa-sliders-h mr-1"></i>
            Filtres
        </button>
        {{-- Other actions (e.g: Sort) --}}
        @if (isset($actions))
            {{ $actions }}
        @endif
    </div>
    {{-- Filters form --}}
    <div id="page-filters-wrapper" aria-hidden="false" class="duration-300 h-0 overflow-y-hidden">
        <div class="border border-solid border-gray-400 bg-white rounded py-6 px-4">
            <form method="GET" action="">
                {{ $slot }}
                {{-- Hidden field for including the text search query --}}
                @if (request()->input('q'))
                    <input type="hidden" name="q" value="{{ request()->input('q') }}" />
                @endif
                {{-- Actions --}}
                <div class="mt-4 flex gap-x-4">
                    <button type="submit" class="btn btn-primary">OK</button>
                    <button type="reset" class="btn btn-outline-primary">Réinitialiser</button>
                </div>
            </form>
        </div>
    </div>
</section>

{{-- Javascript --}}
@push('scripts')
    @vite('resources/js/components/filters-field.js')
@endpush
