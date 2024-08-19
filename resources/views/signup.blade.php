<x-app-layout :show-navbar="false">
    <x-slot:head>
        <title>Devenir membre</title>
        @vite('resources/scss/signup.scss')
    </x-slot>

    <main>
        <div class="content-layout relative">
            {{-- Top background image --}}
            <img src="/img/login-bg.png" alt="Top paint background" class="paint-background" />
            <div class="container mx-auto max-w-screen-lg py-24 px-4 relative z-10">
                {{-- Form --}}
                <form method="POST" action="{{ route('signup.submit') }}">
                    @csrf
                    {{-- Heading --}}
                    <header class="text-center mb-12">
                        <h1 class="text-primary font-light text-4xl mb-3">
                            <strong class="font-semibold">Formulaire</strong> d'adhésion
                        </h1>
                        <p class="opacity-80">
                            Complétez le formulaire pour devenir membre.
                        </p>
                    </header>
                    {{-- Main fields --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-5 gap-x-5 mb-4">
                        <div>
                            <label for="firstname-field" class="form-label">Nom:</label>
                            <input type="text" id="firstname-field" name="first_name" required
                                value="{{ old('first_name') }}"
                                class="form-control @error('first_name') is-invalid @enderror" />
                            @error('first_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="lastname-field" class="form-label">Prénom:</label>
                            <input type="text" id="lastname-field" name="last_name" required
                                value="{{ old('last_name') }}"
                                class="form-control @error('last_name') is-invalid @enderror" />
                            @error('last_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="flex gap-x-4 gap-y-5 dual-col">
                            <div class="basis-full">
                                <label for="gender-field" class="form-label">Sexe:</label>
                                <select id="gender-field" name="gender"
                                    class="form-select @error('gender') is-invalid @enderror">
                                    <option @selected(!old('gender'))>Sélectionner:</option>
                                    <option value="M" @selected(old('gender') === 'M')>Homme</option>
                                    <option value="F" @selected(old('gender') === 'F')>Femme</option>
                                </select>
                                @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="basis-full">
                                <label for="birthday-field" class="form-label">Date de naissance:</label>
                                <input type="date" id="birthday-field" name="birthday" required
                                    value="{{ old('birthday') }}"
                                    class="form-control @error('birthday') is-invalid @enderror" />
                                @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="email-field" class="form-label">Adresse e-mail:</label>
                            <input type="email" id="email-field" name="email" required
                                placeholder="ex: example@site.com" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" />
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="password-field" class="form-label">Mot de passe:</label>
                            <input type="password" id="password-field" name="password" required
                                value="{{ old('password') }}"
                                class="form-control @error('password') is-invalid @enderror" />
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="password_confirmation-field" class="form-label">
                                Confirmez le mot de passe:
                            </label>
                            <input type="password" id="password_confirmation-field" name="password_confirmation"
                                required value="{{ old('password_confirmation') }}"
                                class="form-control @error('password_confirmation') is-invalid @enderror" />
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="address-field" class="form-label">Adresse:</label>
                            <input type="text" id="address-field" name="address" required
                                placeholder="ex: Lot II B 20 IE Anjanahary, Antananarivo, Madagascar"
                                value="{{ old('address') }}"
                                class="form-control @error('address') is-invalid @enderror" />
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="zip_code-field" class="form-label">Code postal:</label>
                            <input type="number" id="zip_code-field" name="zip_code" required placeholder="101"
                                value="{{ old('zip_code') }}"
                                class="form-control @error('zip_code') is-invalid @enderror" />
                            @error('zip_code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="id_card_number-field" class="form-label">Numéro du CIN:</label>
                            <input type="text" id="id_card_number-field" name="id_card_number" required
                                placeholder="XXX XXX XXX XXX" value="{{ old('id_card_number') }}"
                                class="form-control @error('id_card_number') is-invalid @enderror" />
                            @error('id_card_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="flex gap-x-4 gap-y-5 dual-col">
                            <div class="basis-full">
                                <label for="id_card_delivered_at-field" class="form-label">CIN délivrée le:</label>
                                <input type="date" id="id_card_delivered_at-field" name="id_card_delivered_at"
                                    required value="{{ old('id_card_delivered_at') }}"
                                    class="form-control @error('id_card_delivered_at') is-invalid @enderror" />
                                @error('id_card_delivered_at')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="basis-full">
                                <label for="id_card_delivered_in-field" class="form-label">CIN délivrée à:</label>
                                <input type="text" id="id_card_delivered_in-field" name="id_card_delivered_in"
                                    required placeholder="ex: Antananarivo V"
                                    value="{{ old('id_card_delivered_in') }}"
                                    class="form-control @error('id_card_delivered_in') is-invalid @enderror" />
                                @error('id_card_delivered_in')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="origin-field" class="form-label">Localité:</label>
                            <select type="text" id="origin-field" name="origin" required
                                class="form-select @error('origin') is-invalid @enderror">
                                <option value="NATIONAL" @selected(!old('origin') || old('origin') === 'NATIONAL')>National</option>
                                <option value="FOREIGN" @selected(old('origin') === 'FOREIGN')>Etranger</option>
                            </select>
                            @error('origin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="profession-field" class="form-label">Profession:</label>
                            <input type="text" id="profession-field" name="profession" required
                                value="{{ old('profession') }}"
                                class="form-control @error('profession') is-invalid @enderror" />
                            @error('profession')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="phone-field" class="form-label">Numéro téléphone:</label>
                            <input type="text" id="phone-field" name="phone" required
                                value="{{ old('phone') }}"
                                class="form-control @error('phone') is-invalid @enderror" />
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- Accept terms of conditions checkbox --}}
                    <div class="flex justify-center">
                        <div class="form-check w-fit">
                            <input type="checkbox" id="accept-terms-conditions" name="accept_terms_conditions"
                                required value="true" @checked(old('accept_terms_conditions') === 'true') class="form-check-input">
                            <label for="accept-terms-conditions" class="form-check-label">
                                Accepter les
                                <a href="#" class="text-primary hover:underline">
                                    Termes des Conditions
                                </a>
                            </label>
                        </div>
                    </div>
                    {{-- Submit button --}}
                    <div class="flex justify-center mt-4">
                        <button type="submit" class="submit-btn">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-app-layout>
