@php
    // The desired locale
    $locale = 'fr_FR';
    // Create a new IntlDateFormatter object
    $dateFormatter = new IntlDateFormatter($locale, IntlDateFormatter::LONG, IntlDateFormatter::NONE);
    // Readable posting date
    $readablePostDate = $dateFormatter->format($donationCall->created_at);
@endphp

<x-bo-layout>
    <x-slot:head>
        <title>{{ $donationCall->title }} - Appel aux dons - Backoffice</title>
        @vite('resources/scss/donation-call/detail.bo.scss')
    </x-slot>

    <div class="container mx-auto max-w-screen-md pb-20">
        {{-- Breadcurmb navigation --}}
        <nav aria-label="breadcrumb" class="pl-1 py-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('back-office.donation-calls') }}" class="text-primary hover:underline">
                        Appels aux dons
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $donationCall->title }}</li>
            </ol>
        </nav>

        <main class="px-2">
            {{-- Title --}}
            <h1 class="font-bold text-2xl md:text-3xl lg:text-4xl mb-2">
                {{ $donationCall->title }}
            </h1>
            {{-- Type + Date --}}
            <div class="flex items-center gap-x-3">
                <p class="donation-call-type-badge w-fit px-2 py-1 rounded">
                    {{ $donationCall->type->name }}
                </p>
                <span class="font-bold">
                    ·
                </span>
                <p class="text-black/60">
                    Lancé le {{ $readablePostDate }}
                </p>
            </div>
            {{-- Photo --}}
            <div class="flex justify-center mt-8 mb-8">
                <img src="{{ $donationCall->photo_url }}" alt="{{ $donationCall->title }}"
                    class="donation-call-image block max-w-full">
            </div>
            {{-- Description --}}
            <div class="mb-6">
                {!! $donationCall->description !!}
            </div>
            {{-- Donations progress --}}
            <section aria-label="Progression des dons">
                <div class="flex gap-x-3 mb-2">
                    <p class="text-black/70">
                        Objectif:
                        <strong class="text-black">{{ $donationCall->required_amount }}Ar</strong>
                    </p>
                    <p class="text-black/70">
                        Collectés:
                        <strong class="text-black">{{ $donationCall->collected_amount }}Ar</strong>
                    </p>
                </div>
                @php
                    $progress = (($donationCall->collected_amount ?? 0) / $donationCall->required_amount) * 100;
                    $progressText =
                        $progress == floor($progress) ? number_format($progress, 0) : number_format($progress, 1);
                @endphp
                <div role="progressbar" aria-label="Animated striped example"
                    aria-valuenow="{{ $donationCall->collected_amount ?? 0 }}" aria-valuemin="0"
                    aria-valuemax="{{ $donationCall->required_amount }}" class="progress grow shrink basis-auto">
                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                        style="width: {{ $progress }}%; background-color: #179252;">
                        {{ $progressText }}%
                    </div>
                </div>
            </section>

            {{-- Donation call PDF download button --}}
            <a href="{{ route('donation-call.pdf', $donationCall->id) }}" class="btn btn-primary mt-8">
                <i class="fa-solid fa-file-pdf mr-2"></i>
                Obtenir la version PDF
            </a>

            {{-- Donations --}}
            <section aria-describedby="donation-call-donators-title" class="mt-10">
                <h2 id="donation-call-donators-title" class="text-xl font-bold mb-3">Donateurs</h2>
                <div x-data="donations" x-effect="getDonations(page)" class="table-responsive-sm">
                    {{-- Initial loader --}}
                    <template x-if="!isLoaded">
                        <div class="flex justify-center">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </template>
                    {{-- Donations list --}}
                    <template x-if="isLoaded">
                        <table class="table table-hover text-sm align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Nom complet</th>
                                    <th scope="col">Numéro téléphone</th>
                                    <th scope="col">Adresse e-mail</th>
                                    <th scope="col" class="text-right">Montant</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody :class="{ 'table-group-divider': true, 'opacity-50': isLoading }">
                                <template x-for="donation in donations">
                                    <tr>
                                        <td x-text="donation.giver_info.full_name"></td>
                                        <td x-text="donation.giver_info.phone"></td>
                                        <td x-text="donation.giver_info.email"></td>
                                        <td class="text-right">
                                            <span x-text="`${donation.amount}Ar`" class="font-semibold"></span>
                                        </td>
                                        <td x-text="new Date(donation.created_at).toISOString().split('T')[0]">
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </template>
                    {{-- Pagination --}}
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-sm justify-content-center">
                            <template x-for="link in links">
                                <li :class="{ 'page-item': true, 'disabled': !link.url }">
                                    <template x-if="link.label.endsWith('Previous')">
                                        <a :href="link.url ?? '#'" :tabindex="link.url ? 0 : -1"
                                            :aria-disabled="link.url ? false : true" class="page-link">
                                            Précédent
                                        </a>
                                    </template>
                                    <template x-if="!isNaN(link.label)">
                                        <a :href="link.url" x-text="link.label"
                                            :class="{ 'page-link': true, 'active': link.active }"
                                            @click="$event.preventDefault(); page = parseInt(link.label)"></a>
                                    </template>
                                    <template x-if="link.label.startsWith('Next')">
                                        <a :href="link.url ?? '#'" :tabindex="link.url ? 0 : -1"
                                            :aria-disabled="link.url ? false : true" class="page-link">
                                            Suivant
                                        </a>
                                    </template>
                                </li>
                            </template>
                        </ul>
                    </nav>
                </div>
            </section>
        </main>
    </div>

    {{-- Javascript --}}
    @vite('resources/js/donation-call/detail.bo.js')
</x-bo-layout>
