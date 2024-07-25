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
                <form method="POST" action="">
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
                            <input type="text" class="form-control" id="firstname-field" name="first_name" />
                        </div>
                        <div>
                            <label for="lastname-field" class="form-label">Prénom:</label>
                            <input type="text" class="form-control" id="lastname-field" name="last_name" />
                        </div>
                        <div class="flex gap-x-4 gap-y-5 dual-col">
                            <div class="basis-full">
                                <label for="gender-field" class="form-label">Sexe:</label>
                                <select id="gender-field" name="gender" class="form-select">
                                    <option selected>Sélectionner</option>
                                    <option value="M">Homme</option>
                                    <option value="F">Femme</option>
                                </select>
                            </div>
                            <div class="basis-full">
                                <label for="birthday-field" class="form-label">Date de naissance:</label>
                                <input type="date" id="birthday-field" name="birthday" class="form-control" />
                            </div>
                        </div>
                        <div>
                            <label for="email-field" class="form-label">Adresse e-mail:</label>
                            <input type="email" id="email-field" name="email" placeholder="ex: example@site.com"
                                class="form-control" />
                        </div>
                        <div>
                            <label for="password-field" class="form-label">Mot de passe:</label>
                            <input type="password" id="password-field" name="password" class="form-control" />
                        </div>
                        <div>
                            <label for="password_confirmation-field" class="form-label">
                                Confirmez le mot de passe:
                            </label>
                            <input type="password" id="password_confirmation-field" name="password_confirmation"
                                class="form-control" />
                        </div>
                        <div>
                            <label for="address-field" class="form-label">Adresse:</label>
                            <input type="text" id="address-field" name="address"
                                placeholder="ex: Lot II B 20 IE Anjanahary, Antananarivo, Madagascar"
                                class="form-control" />
                        </div>
                        <div>
                            <label for="zip_code-field" class="form-label">Code postal:</label>
                            <input type="number" id="zip_code-field" name="zip_code" placeholder="101"
                                class="form-control" />
                        </div>
                        <div>
                            <label for="id_card_number-field" class="form-label">Numéro du CIN:</label>
                            <input type="text" id="id_card_number-field" name="id_card_number"
                                placeholder="XXX XXX XXX XXX" class="form-control" />
                        </div>
                        <div class="flex gap-x-4 gap-y-5 dual-col">
                            <div class="basis-full">
                                <label for="id_card_delivered_at-field" class="form-label">CIN délivrée le:</label>
                                <input type="date" id="id_card_delivered_at-field" name="id_card_delivered_at"
                                    class="form-control" />
                            </div>
                            <div class="basis-full">
                                <label for="id_card_delivered_in-field" class="form-label">CIN délivrée à:</label>
                                <input type="text" id="id_card_delivered_in-field" name="id_card_delivered_in"
                                    placeholder="ex: Antananarivo V" class="form-control" />
                            </div>
                        </div>
                        <div>
                            <label for="origin-field" class="form-label">Localité:</label>
                            <select type="text" id="origin-field" name="origin" class="form-select">
                                <option value="NATIONAL" selected>National</option>
                                <option value="FOREIGN">Etranger</option>
                            </select>
                        </div>
                        <div>
                            <label for="profession-field" class="form-label">Profession:</label>
                            <input type="text" id="profession-field" name="profession"
                                placeholder="XXX XXX XXX XXX" class="form-control" />
                        </div>
                        <div>
                            <label for="phone-field" class="form-label">Numéro téléphone:</label>
                            <input type="text" id="phone-field" name="phone" class="form-control" />
                        </div>
                    </div>
                    {{-- Accept terms of conditions checkbox --}}
                    <div class="flex justify-center">
                        <div class="form-check w-fit">
                            <input type="checkbox" id="accept-terms-conditions" name="accept-terms-conditions"
                                value="true" class="form-check-input">
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
