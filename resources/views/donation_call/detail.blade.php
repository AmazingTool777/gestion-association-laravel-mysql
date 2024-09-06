@php
    // The desired locale
    $locale = 'fr_FR';
    // Create a new IntlDateFormatter object
    $dateFormatter = new IntlDateFormatter($locale, IntlDateFormatter::LONG, IntlDateFormatter::NONE);
    // Readable posting date
    $readablePostDate = $dateFormatter->format($donationCall->created_at);
@endphp

<x-app-layout>
    <x-slot:head>
        <title>Appel aux dons: {{ $donationCall->title }}</title>
        @vite('resources/scss/donation-call/detail.scss')
    </x-slot>

    <div class="container mx-auto max-w-screen-md pb-20">
        {{-- Donation success alert after submission --}}
        @if (session()->has('success'))
            <div class="alert alert-success mt-2" role="alert">
                <div class="flex justify-between">
                    🎉 Votre donation a été enregistré avec succès.
                    <button type="button" data-bs-dismiss="alert" aria-label="Close" class="btn-close"></button>
                </div>
            </div>
        @endif

        {{-- Breadcurmb navigation --}}
        <nav aria-label="breadcrumb" class="pl-1 py-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('donation-calls') }}" class="text-primary hover:underline">Appels aux dons</a>
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
            <div class="bg-slate-100 flex justify-center mt-8 mb-8">
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

            {{-- Donation submission section --}}
            <section aria-labelledby="donation-form-title" class="mt-12">
                <h2 id="donation-form-title" class="font-bold text-xl md:text-2xl">
                    <i class="fa-solid fa-hand-holding-heart mr-2"></i>
                    Faire un don
                </h2>
                {{-- Donation submission form --}}
                @auth
                    @php
                        // Whether the donation call supports only one mobile payment
                        $supportsSingleMobilePayment = count($donationCall->mobile_payment_phones) === 1;
                    @endphp
                    <form id="donation-form" method="POST" action="{{ route('donation.store') }}" class="mt-4">
                        @csrf
                        {{-- Hidden field for the donation call id --}}
                        <input type="hidden" name="donation_call_id" value={{ $donationCall->id }}>
                        {{-- Payment --}}
                        <section aria-labelledby="donation-mobile-money-title" class="mb-4">
                            {{-- Mobile Money payment methods --}}
                            <h3 id="donation-mobile-money-title" class="font-semibold mb-3">Paiement par Mobile Money:</h3>
                            <div class="flex flex-wrap gap-x-6 gap-y-4 mb-3">
                                @foreach ($donationCall->getMobileMoneyPaymentsDetails() as $mobileMoney)
                                    @php
                                        $htmlId = 'mobile-money-' . $mobileMoney['name'];
                                    @endphp
                                    <div class="form-check">
                                        <input type="radio" name="mobile_money_name" required
                                            @if ($supportsSingleMobilePayment) checked @endif
                                            value="{{ $mobileMoney['name'] }}" id="{{ $htmlId }}"
                                            class="form-check-input">
                                        <label for="{{ $htmlId }}" class="form-check-label cursor-pointer">
                                            {{ $mobileMoney['label'] }}
                                            <img src="{{ $mobileMoney['logo_url'] }}" alt="{{ $mobileMoney['label'] }}"
                                                class="block mt-1 mb-2 donation-mobile-money-logo">
                                            <strong class="text-sm">
                                                <i class="fa-solid fa-phone mr-1"></i>
                                                {{ $mobileMoney['phone'] }}
                                            </strong>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            {{-- Donation amount --}}
                            <div>
                                <label for="donation-amount-field" class="form-label">
                                    Montant de la donation (en Ariary)
                                </label>
                                <div class="input-group">
                                    @php
                                        $maxAmount = $donationCall->required_amount - $donationCall->collected_amount;
                                    @endphp
                                    <input type="number" id="donation-amount-field" name="amount" value="1"
                                        min="1" max="{{ $maxAmount }}" required class="form-control">
                                    <span class="input-group-text">Ar</span>
                                </div>
                            </div>
                        </section>
                        {{-- The donation giver's info --}}
                        <section aria-labelledby="donation-giver-section-title" class="mb-4">
                            @php
                                $defaultFullName = Auth::check()
                                    ? Auth::user()->profile->last_name . ' ' . Auth::user()->profile->first_name
                                    : '';
                                $defaultEmail = Auth::check() ? Auth::user()->email : '';
                            @endphp
                            <h3 id="donation-giver-section-title" class="font-semibold mb-3">
                                Informations sur le donateur:
                            </h3>
                            <div class="mb-3">
                                <label for="donation-giver-fullname-field" class="form-label">Nom complet</label>
                                <input type="text" id="donation-giver-fullname-field" name="donation_giver_fullname"
                                    placeholder="Nom et prénom du donateur" value="{{ $defaultFullName }}" required
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="donation-giver-email-field" class="form-label">Adresse e-mail</label>
                                <input type="email" id="donation-giver-email-field" name="donation_giver_email"
                                    placeholder="ex: example@site.com" value="{{ $defaultEmail }}" required
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="donation-giver-phone-field" class="form-label">Numéro téléphone</label>
                                <div class="input-group">
                                    <span class="input-group-text">+261</span>
                                    @php
                                        $placeholder = '3X XX XXX XX';
                                        if ($supportsSingleMobilePayment) {
                                            $placeholder[1] = $donationCall->mobile_payment_phones[0][2];
                                        }
                                    @endphp
                                    <input type="text" id="donation-giver-phone-field" name="donation_giver_phone"
                                        pattern="^(32|33|34)\s?(\d\s?){7}$" placeholder="{{ $placeholder }}" required
                                        aria-describedby="donation-giver-phone-text" class="form-control">
                                </div>
                                <p id="donation-giver-phone-text" class="form-text">
                                    Le numéro téléphone saisi doit issu du même opérateur que celle du numéro de paiement du
                                    Mobile Money séléctionné.
                                </p>
                            </div>
                        </section>
                        {{-- Submit button --}}
                        <button type="submit" class="donation-submit rounded-btn">
                            Envoyer
                        </button>
                    </form>
                @endauth
                {{-- Link to sign in page if the user is not signed in --}}
                @guest
                    <p class="text-gray-600 mt-3">
                        Veuillez <a href="{{ route('login') }}" class="text-primary hover:underline">vous connecter</a>
                        afin d'éffectuer une donation.
                    </p>
                @endguest
            </section>
        </main>
    </div>

    @auth
        {{-- Javascript --}}
        @push('scripts')
            @vite('resources/js/donation-call/detail.js')
        @endpush
    @endauth
</x-app-layout>
