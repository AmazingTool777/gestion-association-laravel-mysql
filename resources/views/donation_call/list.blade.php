@php
    // The desired locale
    $locale = 'fr_FR';
    // Create a new IntlDateFormatter object
    $dateFormatter = new IntlDateFormatter($locale, IntlDateFormatter::LONG, IntlDateFormatter::NONE);
@endphp

<x-app-layout>
    <x-slot:head>
        <title>Appels aux dons</title>
        @vite('resources/scss/donation-call/list.scss')
    </x-slot>

    <main class="page-wrapper bg-gray-100">
        <div class="container mx-auto max-w-screen-lg px-3 pt-8 pb-16">
            <h1 class="font-bold text-2xl sm:text-3xl lg:text-4xl mb-8">Appels aux dons</h1>

            {{-- Search + Filters + Sort --}}
            <div class="space-y-6 mb-6">
                {{-- Search --}}
                <x-text-search-field placeholder="Rechercher des appels aux dons" class="w-full" />
                {{-- Filters --}}
                <x-filters-field>
                    {{-- Donation call types --}}
                    <section aria-labelledby="categories-filter-title">
                        <h3 id="categories-filter-title" class="mb-3 font-semibold">Catégories</h3>
                        <div class="flex flex-wrap gap-x-4 gap-y-2">
                            @foreach ($donationCallTypes as $type)
                                @php
                                    $id = $type['id'];
                                    $htmlId = 'donation-type-' . $id;
                                @endphp
                                <div class="form-check">
                                    <input type="checkbox" name="type_ids[]" value="{{ $id }}"
                                        @if (DataListQueryParamsUtils::queryArrayHas('type_ids', $id)) checked @endif id="{{ $htmlId }}"
                                        class="form-check-input">
                                    <label for="{{ $htmlId }}" class="form-check-label">
                                        {{ $type['name'] }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    {{-- Sort --}}
                    <x-slot:actions>
                        @php
                            $sortParams = [
                                [
                                    'name' => 'Date de publication',
                                    'key' => 'created_at',
                                    'orders' => [
                                        [
                                            'value' => 'asc',
                                            'label' => 'Les plus anciens d\'abord',
                                        ],
                                        [
                                            'value' => 'desc',
                                            'label' => 'Les plus récents d\'abord',
                                        ],
                                    ],
                                ],
                                [
                                    'name' => 'Montant requis',
                                    'key' => 'required_amount',
                                    'orders' => [
                                        [
                                            'value' => 'asc',
                                            'label' => 'Ordre croissante',
                                            'fa-icon' => 'sort-numeric-up',
                                        ],
                                        [
                                            'value' => 'desc',
                                            'label' => 'Ordre décroissante',
                                            'fa-icon' => 'sort-numeric-down',
                                        ],
                                    ],
                                ],
                            ];
                        @endphp
                        <x-sort-field :params="$sortParams" :default-query="$defaultSort" />
                    </x-slot>
                </x-filters-field>
            </div>

            {{-- List of donation calls --}}
            <x-pagination-list :paginator="$results">
                <div class="space-y-10">
                    @foreach ($results->items() as $donationCall)
                        @php
                            $htmlId = 'donation-call-article-' . $donationCall->id;
                            $htmlProgressId = 'donation-call-progress-' . $donationCall->id;
                            $donationCallURL = '/donation-calls/' . $donationCall->id;
                            $progress = (($donationCall->collected_amount ?? 0) / $donationCall->required_amount) * 100;
                            $progressText =
                                $progress == floor($progress)
                                    ? number_format($progress, 0)
                                    : number_format($progress, 1);
                        @endphp
                        <article aria-labelledby="{{ $htmlId }}" data-donation-call-url="{{ $donationCallURL }}"
                            class="donation-call-card bg-white cursor-pointer flex flex-col md:flex-row relative">
                            <div class="donation-call-card__illustration-layout md:mt-7 md:ml-7 md:mb-7">
                                <img src="{{ $donationCall->photo_url }}" alt="{{ $donationCall->title }}"
                                    class="donation-call-card__illustration block w-full">
                            </div>
                            <div class="donation-call-card__content-layout py-4">
                                <h2 id="{{ $htmlId }}" class="font-bold lg:text-lg mb-1">
                                    {{ $donationCall->title }}
                                </h2>
                                <p class="text-sm text-black/65 mb-3">
                                    Lancé le {{ $dateFormatter->format($donationCall->created_at) }}
                                </p>
                                <p class="donation-call-card__type absolute top-1 left-1 py-2 px-4 rounded">
                                    {{ $donationCall->type->name }}
                                </p>
                                <div
                                    class="donation-call-card__description text-black/65 mb-3 [font-size:0.875rem] lg:text-base">
                                    {!! $donationCall->description !!}
                                </div>
                                <div class="donation-call-card__progress relative pt-6 mb-2">
                                    <span id="{{ $htmlProgressId }}"
                                        class="text-black text-sm font-semibold absolute top-0 -translate-x-1/2"
                                        style="left: {{ $progress }}%">
                                        {{ $progressText }}%
                                    </span>
                                    <div role="progressbar" aria-valuemin="0"
                                        aria-valuemax="{{ $donationCall->required_amount }}"
                                        aria-valuenow="{{ $donationCall->collected_amount }}"
                                        aria-describedby="{{ $htmlProgressId }}"
                                        class="donation-call-card__progressbar bg-slate-200">
                                        <div class="donation-call-card__progressbar-inner"
                                            style="width: {{ $progress }}%">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex gap-x-6 mb-3">
                                    <p class="w-fit text-gray-600 text-sm">
                                        Objectif:
                                        <strong class="text-black">
                                            {{ $donationCall->required_amount }}Ar
                                        </strong>
                                    </p>
                                    <p class="w-fit text-gray-600 text-sm">
                                        Collectés:
                                        <strong class="text-black">
                                            {{ $donationCall->collected_amount }}Ar
                                        </strong>
                                    </p>
                                </div>
                                <div class="d-grid md:w-fit">
                                    <a href="{{ $donationCallURL }}" class="btn btn-primary">
                                        <i class="fa-solid fa-hand-holding-heart mr-2"></i>
                                        Faire un don
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </x-pagination-list>
        </div>
    </main>

    {{-- Javascript --}}
    @vite('resources/js/donation-call/list.js')
</x-app-layout>
