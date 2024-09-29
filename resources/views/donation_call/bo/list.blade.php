<x-bo-layout>
    <x-slot:head>
        <title>Appels aux dons - Back-office</title>
        @vite('resources/scss/donation-call/list.bo.scss')
    </x-slot>

    <main class="pb-12">
        <h1 class="font-bold text-xl sm:text-2xl lg:text-3xl mb-8">Appels aux dons</h1>

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
                </x-slot>
            </x-filters-field>
        </div>

        {{-- List of donation calls --}}
        <x-pagination-list :paginator="$results">
            @if ($results->count() > 0)
                <div class="table-responsive-lg">
                    <table class="table table-hover text-sm mb-0">
                        <thead>
                            <tr class="align-middle">
                                <th scope="col">
                                    <div class="flex items-center gap-x-2">
                                        <span>Publié le</span>
                                        <x-col-sort-field key="created_at" :orders="[
                                            ['value' => 'asc', 'label' => 'Les plus anciens d\'abord'],
                                            ['value' => 'desc', 'label' => 'Les plus récents d\'abord'],
                                        ]" :is-default="$defaultSort['order']"
                                            :default-query="$defaultSort" title="date de publication" />
                                    </div>
                                </th>
                                <th scope="col">Photo</th>
                                <th scope="col">Titre</th>
                                <th scope="col" class="text-center">Catégorie</th>
                                <th scope="col" class="text-right">
                                    <div class="flex items-center gap-x-2">
                                        <span>Montants</span>
                                        <x-col-sort-field key="required_amount" :orders="[
                                            [
                                                'value' => 'asc',
                                                'label' => 'Ordre croissant',
                                                'fa-icon' => 'sort-numeric-up',
                                            ],
                                            [
                                                'value' => 'desc',
                                                'label' => 'Ordre décroissant',
                                                'fa-icon' => 'sort-numeric-down',
                                            ],
                                        ]" :align-end="true"
                                            :default-query="$defaultSort" title="montant requis" />
                                    </div>
                                </th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($results->items() as $donationCall)
                                <tr>
                                    <td>
                                        {{ $donationCall->created_at->format('d/m/Y') }}
                                    </td>
                                    <td>
                                        <img src="{{ $donationCall->photo_url }}" alt="{{ $donationCall->title }}"
                                            class="max-w-40 max-h-64">
                                    </td>
                                    <td>{{ $donationCall->title }}</td>
                                    <td class="text-center">{{ $donationCall->type->name }}</td>
                                    <td class="text-right space-y-2">
                                        <section>
                                            <h6 class="text-xs">Requis</h6>
                                            <p class="font-semibold">{{ $donationCall->required_amount }}Ar</p>
                                        </section>
                                        <section>
                                            <h6 class="text-xs">Collecté</h6>
                                            <p class="font-semibold">{{ $donationCall->collected_amount }}Ar</p>
                                        </section>
                                        @php

                                        @endphp
                                        <div class="progress" role="progressbar" aria-label="Animated striped example"
                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                            style="height: 0.5rem">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                style="width: 75%"></div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button type="button"
                                                class="btn btn-light donation-call-actions-toggle dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <span data-bs-toggle="tooltip" data-bs-title="Voir les actions">
                                                    <i class="fa-solid fa-ellipsis-h"></i>
                                                </span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="{{ route('back-office.donation-calls.show', ['donationCall' => $donationCall]) }}"
                                                        class="dropdown-item text-sm">
                                                        <i class="fa-solid fa-eye mr-2"></i>
                                                        Consulter
                                                    </a>
                                                    <button class="dropdown-item text-sm text-danger">
                                                        <i class="fa-solid fa-trash mr-2"></i>
                                                        Supprimer
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </x-pagination-list>
    </main>

    {{-- Javascript --}}
    @vite('resources/js/donation-call/list.bo.js')
</x-bo-layout>
