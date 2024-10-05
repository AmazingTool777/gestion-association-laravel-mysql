@php
    $numberFormatter = new NumberFormatter('fr', NumberFormatter::DECIMAL);
    $numberFormatter->setAttribute(NumberFormatter::MIN_FRACTION_DIGITS, 0);
    $numberFormatter->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, 2);
@endphp

<x-bo-layout>
    <x-slot:head>
        <title>Tableau de bord</title>
        @vite('resources/scss/bo-dashboard.scss')
    </x-slot>

    <main class="pb-8">
        <h1 class="font-bold text-xl md:text-2xl mb-4">Tableau de bord</h1>

        {{-- Counts data --}}
        <section aria-label="Comptages" class="mb-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-3 gap-y-4">
                {{-- Users --}}
                <article>
                    <div class="flex items-center bg-white shadow-sm py-3 px-3 gap-x-3">
                        <div class="h-12 w-12 rounded-3xl bg-secondary flex justify-center items-center">
                            <i class="fa-solid fa-users text-primary font-bold text-lg"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-primary">Utilisateurs</h3>
                            <p data-counter="{{ $usersCount }}" class="font-bold text-3xl">
                                {{ $usersCount }}
                            </p>
                        </div>
                    </div>
                </article>
                {{-- Donation calls --}}
                <article>
                    <div class="flex items-center bg-white shadow-sm py-3 px-3 gap-x-3">
                        <div class="h-12 w-12 rounded-3xl bg-secondary flex justify-center items-center">
                            <i class="fa-solid fa-broadcast-tower text-primary font-bold text-lg"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-primary">Appels aux dons</h3>
                            <p data-counter="{{ $donationCallsCount }}" class="font-bold text-3xl">
                                {{ $donationCallsCount }}
                            </p>
                        </div>
                    </div>
                </article>
                {{-- Donations --}}
                <article>
                    <div class="flex items-center bg-white shadow-sm py-3 px-3 gap-x-3">
                        <div class="h-12 w-12 rounded-3xl bg-secondary flex justify-center items-center">
                            <i class="fa-solid fa-hand-holding-heart text-primary font-bold text-lg"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-primary">Donations</h3>
                            <p data-counter="{{ $donationsCount }}" class="font-bold text-3xl">
                                {{ $donationsCount }}
                            </p>
                        </div>
                    </div>
                </article>
                {{-- Events --}}
                <article>
                    <div class="flex items-center bg-white shadow-sm py-3 px-3 gap-x-3">
                        <div class="h-12 w-12 rounded-3xl bg-secondary flex justify-center items-center">
                            <i class="fa-solid fa-calendar-alt text-primary font-bold text-lg"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-primary">Evénements</h3>
                            <p data-counter="{{ $eventsCount }}" class="font-bold text-3xl">
                                {{ $eventsCount }}
                            </p>
                        </div>
                    </div>
                </article>
            </div>
        </section>

        {{-- Donations --}}
        <section aria-label="Donations" class="pb-8">
            <div class="grid grid-cols-12 gap-x-3 gap-y-3">
                {{-- Last 7 days revenue --}}
                <article class="col-span-12 md:col-span-6 xl:col-span-7">
                    <div class="bg-white shadow-sm py-4 px-3">
                        <h3 class="font-semibold mb-1">Donations collectées</h3>
                        <p class="font-bold text-3xl text-primary mb-4">
                            <span data-counter="{{ $donationsTotalCollectedAmount }}">
                                {{ $numberFormatter->format($donationsTotalCollectedAmount) }}
                            </span>
                            Ar
                        </p>
                        <canvas id="revenueChart"></canvas>
                    </div>
                </article>
                {{-- Top 5 donators --}}
                <article class="col-span-12 md:col-span-6 xl:col-span-5 bg-white py-4 shadow-sm px-4 h-fit">
                    <h3 class="font-semibold mb-2 text-primary">Top 5 donateurs</h3>
                    <table class="table table-hover text-sm">
                        <thead>
                            <tr>
                                <th>Noms complet</th>
                                <th class="text-right">Montant</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($topDonators as $donator)
                                <tr>
                                    <td>{{ $donator->full_name }}</td>
                                    <td class="font-semibold text-right">
                                        {{ $numberFormatter->format($donator->amount) }} Ar
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </article>
            </div>
        </section>

        {{-- Donation calls --}}
        <section aria-label="Appels aux dons">
            <div class="grid grid-cols-12 gap-x-3 gap-y-3">
                {{-- Donations calls repartition --}}
                <article class="bg-white shadow-sm col-span-12 md:col-span-6 py-4 px-3">
                    <h3 class="font-semibold mb-2">Répartition des appels aux dons</h3>
                    <canvas id="donationCallChart" class="ma"></canvas>
                </article>
                {{-- Most recent donation calls --}}
                <article class="bg-white shadow-sm col-span-12 md:col-span-6 py-4 px-3 h-fit">
                    <h3 class="font-semibold mb-2 text-primary">Appels aux dons les plus récents</h3>
                    <table class="table table-hover text-sm">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th class="text-center">Type</th>
                                <th class="text-right">Montant(Ar)</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($recentDonationCalls as $donationCall)
                                <tr>
                                    <td>
                                        <p>
                                            {{ $donationCall->title }}
                                        </p>
                                    </td>
                                    <td class="text-center font-semibold">
                                        {{ $donationCall->type }}
                                    </td>
                                    <td class="font-semibold text-right">
                                        {{ $numberFormatter->format($donationCall->required_amount) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </article>
            </div>
        </section>
    </main>
</x-bo-layout>

{{-- Javascript --}}
<script>
    window.donationsCollectedAmountLastSevenDays = @json($donationsCollectedAmountLastSevenDays);
    window.donationCallsPerType = @json($donationCallsPerType);
</script>
@vite('resources/js/dashboard.bo.js')
