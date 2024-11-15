<x-app-layout>
    <x-slot:head>
        <title>HelloAsso</title>
        @vite('resources/scss/welcome.scss')
    </x-slot>

    <main>
        {{-- Intro section --}}
        <section aria-labelledby="intro-title" aria-describedby="intro-description" class="intro relative">
            <div class="intro__hero relative h-full flex items-center justify-center text-center">
                {{-- Main content --}}
                <div class="relative [z-index:1] space-y-6 px-8 lg:px-11 xl:px-16 flex flex-col items-center max-w-4xl">
                    <h1 id="intro-title" class="intro__title font-semibold text-4xl md:text-5xl lg:text-6xl">
                        Nous travaillons dans toutes les régions du pays pour sauver des vies et
                        <strong class="text-secondary">parvenir à la justice sociale.</strong>
                    </h1>
                    <p id="intro-description" class="intro__description">
                        D'après une étude britanique, aider les autres serait une manière modeste - mais efficace pour
                        être heureux au quotidien.
                    </p>
                </div>
                {{-- Caroussel --}}
                <div class="carousel intro-carousel" data-slide="carousel">
                    <div class="carousel__items" data-carousel="items">
                        <div class="carousel__item">
                            <img src="/img/children-hands.jpg" alt="Children's hands"
                                class="w-full h-full object-cover object-center">
                        </div>
                        <div class="carousel__item">
                            <img src="/img/children-smiles.jpg" alt="Children's smiles"
                                class="w-full h-full object-cover object-center">
                        </div>
                        <div class="carousel__item active">
                            <img src="/img/children-observation.jpg" alt="Children's observation"
                                class="w-full h-full object-cover object-center">
                        </div>
                    </div>
                </div>
                {{-- Social media links --}}
                <aside>
                    <section aria-label="Réseaux sociaux" class="intro__social-medias">
                        <ul class="m-0 p-0 list-none space-y-2">
                            <li>
                                <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                            </li>
                        </ul>
                    </section>
                </aside>
            </div>
            <aside>
                {{-- Info card --}}
                <section aria-label="Carte d'informations" class="intro-info-card px-4 md:px-6 relative">
                    <div class="intro-info-card__layout shadow">
                        <div class="intro-info-card__scroll-down p-4">
                            <p class="text-violet-950 font-semibold text-sm">Défiler vers le bas</p>
                        </div>
                        <div
                            class="intro-info-card__play flex items-center justify-center bg-indigo-900 py-4 px-5 gap-x-4">
                            <p class="font-medium text-white text-sm">Association HelloAsso</p>
                            <div>
                                <button
                                    class="intro-info-card__play-btn bg-white text-violet-900 flex justify-center items-center">
                                    <i class="fa-solid fa-play"></i>
                                </button>
                            </div>
                        </div>
                        <section aria-label="Contacts" class="intro-info-card__contacts px-5 gap-y-4 gap-x-8">
                            <article aria-labelledby="intro-contacts-phone-title" class="intro-info-card__contact">
                                <h6 id="intro-contacts-phone-title"
                                    class="intro-info-card__contacts-title uppercase mb-2 text-violet-600">
                                    Numéro téléphone
                                </h6>
                                <ul
                                    class="intro-info-card__contacts-text list-none m-0 p-0 flex flex-wrap gap-x-3 font-semibold text-sm text-violet-950">
                                    <li>034 99 854 05</li>
                                    <li>033 05 678 65</li>
                                </ul>
                            </article>
                            <article aria-labelledby="intro-contacts-email-title" class="intro-info-card__contact">
                                <h6 id="intro-contacts-email-title"
                                    class="intro-info-card__contacts-title uppercase mb-2 text-violet-600">
                                    Email
                                </h6>
                                <p
                                    class="intro-info-card__contacts-text list-none m-0 p-0 flex flex-wrap gap-x-3 font-semibold text-sm text-violet-950">
                                    helloasso@gmail.com
                                </p>
                            </article>
                        </section>
                    </div>
                </section>
            </aside>
        </section>

        {{-- About section --}}
        <section aria-labelledby="about-us-title" aria-describedby="about-us-description, about-us-bible-verse"
            class="about-us pt-28 lg:pt-24 pb-24">
            <div class="about-us__layout container flex items-center flex-col lg:flex-row flex-nowrap">
                {{-- Content --}}
                <div class="about-us__content mx-auto px-4 w-full">
                    <h2 id="about-us-title" class="about-us__title text-primary/60 font-bold mb-3">
                        A-propos de nous
                    </h2>
                    <p id="about-us-description" class="about-us__description text-primary text-3xl sm:text-4xl mb-3">
                        <strong>Aider et partager</strong> est notre principal objectif
                    </p>
                    <p id="about-us-bible-verse" class="about-us__bible-verse font-bold mb-6">
                        <q cite="Actes 20:35">
                            Il y a plus de bonheur à donner qu'à recevoir.
                        </q>
                        <em class="font-normal text-black/60 not-italic">[Actes 20:35]</em>
                    </p>
                    <p class="about-us__paragraph text-black/65 mb-3">
                        Donner procure du bonheur, c'est pour cela qu'HelloAsso a été créée pour toutes personnes
                        désireux
                        de
                        partager ou aider les autres en difficultés.
                    </p>
                    <p class="about-us__paragraph text-black/65 mb-10">
                        L'assocication vise à tout débiter que ce soit sur le plan intéllectuel, spirituel et matériel.
                        L'objectif est de porter secours et assistance aux personnes en tiraillement. Elle est
                        consitutée et
                        administrée exclusivement à des fins de bienfaisance et est opérationnelle dans toutes les
                        régions
                        du
                        pays.
                    </p>
                    <a href="#" class="rounded-btn inline-block">En savoir plus</a>
                </div>
                {{-- Illustration --}}
                <div class="about-us__illustration w-full relative">
                    <img src="/img/login-bg.png" alt="Paint brush" class="block about-us__illustration-paint-brush">
                    <div
                        class="about-us__illustration-card absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-sm">
                        <img src="/img/community-tree.jpg" alt="Community tree">
                        {{-- Signup link --}}
                        <a href="{{ route('signup') }}"
                            class="absolute bottom-3 left-1/2 -translate-x-1/2 uppercase text-primary text-sm hover:underline font-semibold">
                            Devenez membre
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- Services section --}}
        <section aria-labelledby="services-title" aria-describedby="services-description"
            class="services text-center pt-28 pb-48 bg-slate-100">
            <h2 id="services-title" class="services__title text-primary/60 font-bold mb-3">
                Nos services
            </h2>
            <p id="services-description"
                class="services__description text-primary text-3xl sm:text-4xl lg:text-5xl mb-12 md:mb-16 lg:mb-20 mx-auto max-w-lg lg:max-w-2xl px-3">
                <strong>Ce que nous apportons</strong> à l'humanité
            </p>
            <div
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-y-12 mx-auto max-w-screen-md lg:max-w-screen-lg">
                {{-- Aide médicale --}}
                <article aria-labelledby="service-medical-aid-title"
                    class="service-feature service-feature--medical-aid">
                    <div class="service-feature__illustration relative mx-auto mb-3">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                            xml:space="preserve">
                            <use href="#donation-icon"></use>
                        </svg>
                    </div>
                    <h3 id="service-medical-aid-title" class="service-feature__title font-bold">
                        Aide médicale
                    </h3>
                </article>
                {{-- Support matériel et moral --}}
                <article aria-labelledby="service-support-title" class="service-feature service-feature--support">
                    <div class="service-feature__illustration relative mx-auto mb-3">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 511.998 511.998"
                            style="enable-background:new 0 0 511.998 511.998;" xml:space="preserve">
                            <use href="#church-icon"></use>
                        </svg>
                    </div>
                    <h3 id="service-support-title" class="service-feature__title font-bold">
                        Support matériel et moral
                    </h3>
                </article>
                {{-- Aide alimentaire --}}
                <article aria-labelledby="service-food-aid-title" class="service-feature service-feature--food-aid">
                    <div class="service-feature__illustration relative mx-auto mb-3">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.002 512.002"
                            style="enable-background:new 0 0 512.002 512.002;" xml:space="preserve">
                            <use href="#bread-icon"></use>
                        </svg>
                    </div>
                    <h3 id="service-food-aid-title" class="service-feature__title font-bold">
                        Aide alimentaire
                    </h3>
                </article>
                {{-- Ouvre de charité --}}
                <article aria-labelledby="service-charity-title" class="service-feature service-feature--charity">
                    <div class="service-feature__illustration relative mx-auto mb-3">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.002 512.002"
                            style="enable-background:new 0 0 512.002 512.002;" xml:space="preserve">
                            <use href="#charity-icon"></use>
                        </svg>
                    </div>
                    <h3 id="service-charity-title" class="service-feature__title font-bold">
                        Ouvre de charité
                    </h3>
                </article>
            </div>
        </section>
    </main>

    @push('scripts')
        @vite('resources/js/welcome.js')
    @endpush
</x-app-layout>

{{-- SVG icons to be referenced in the body of the page --}}
<div class="hidden">
    {{-- Donation --}}
    <svg>
        <symbol id="donation-icon">
            <g>
                <g>
                    <path d="M249.391,480.848l-5.955-81.261c-0.644-8.765-8.267-15.274-16.937-14.626l-4.06,0.298
           c-1.684-16.72-4.663-33.083-8.881-48.743c-5.795-21.513-11.132-28.631-35.39-58.71c-0.03-0.037-0.061-0.074-0.091-0.111
           c-9.117-10.87-16.034-13.592-63.355-40.001c-10.804-6.03-20.514-4.362-27.552-0.111l-0.951-2.285
           c0.792-2.303,1.289-4.692,1.465-7.138l4.32-59.924c1.125-15.605-10.594-29.147-26.202-30.272
           c-8.141-0.594-15.872,2.306-21.525,7.704c-17.838-13.303-50.332-0.331-43.294,33.012c0.068,0.325,32.147,118.269,32.234,118.588
           c4.603,21.37,20.138,33.048,26.62,37.084c0.805,0.499,17.8,9.877,18.63,10.335c25.706,14.18,27.804,15.34,34.941,24.697
           c6.853,8.987,6.83,17.261,7.275,23.332l-3.786,0.278c-8.702,0.639-15.262,8.236-14.623,16.936l5.357,73.138
           c0.61,8.334,7.635,14.862,15.991,14.862h109.893C242.755,497.93,250.066,490.065,249.391,480.848z M77.051,167.156l-2.834,39.302
           c-20.513-49.296-18.527-45.451-20.4-49.113C62.099,147.971,77.973,154.362,77.051,167.156z M67.611,321.534
           c-11.585-7.277-16.527-15.939-19.88-28.012L15.607,175.388c-0.62-3.095-2.482-16.157,9.303-19.475
           c6.087-1.42,10.482,0.561,13.937,5.552c1.548,2.237-2.11-6.058,37.249,88.526c-3.5,7.964-3.862,19.859,7.323,28.337
           c12.099,9.172,40.842,31.136,41.131,31.357c1.358,1.038,2.958,1.541,4.545,1.54c2.255,0,4.486-1.014,5.961-2.944
           c2.514-3.289,1.885-7.993-1.404-10.506c-0.289-0.222-29.054-22.203-41.178-31.393c-7.136-5.408-2.456-13.048,2.76-16.16
           c3.688-2.196,7.558-2.02,12.183,0.562c46.012,25.678,52.068,28.089,59.133,36.492c24.266,30.094,27.651,35.01,32.535,53.141
           c3.974,14.75,6.793,30.168,8.402,45.94l-71.854,5.264c-0.452-6.156-0.485-18.448-10.306-31.327
           C114.594,346.223,110.944,345.706,67.611,321.534z M234.194,482.641c-0.183,0.197-0.412,0.297-0.681,0.297H123.62
           c-0.545,0-1.002-0.425-1.042-0.967l-5.357-73.138c-0.033-0.458,0.313-0.857,0.771-0.892c12.324-0.902,95.982-7.031,109.603-8.029
           c0.022-0.002,0.045-0.003,0.067-0.003c0.201,0,0.383,0.068,0.539,0.203c0.174,0.149,0.27,0.342,0.287,0.57l5.953,81.259
           C234.459,482.209,234.376,482.445,234.194,482.641z" />
                </g>
            </g>
            <g>
                <g>
                    <path d="M467.721,145.664c-18.673-17.826-49.575-3.071-47.727,22.57l4.32,59.923c0.176,2.447,0.672,4.836,1.465,7.139
           l-0.951,2.285c-7.037-4.251-16.753-5.918-27.552,0.111c-47.382,26.436-54.259,29.154-63.356,40
           c-0.031,0.037-0.062,0.075-0.092,0.112c-24.257,30.081-29.593,37.197-35.388,58.709c-4.219,15.66-7.197,32.023-8.881,48.743
           l-4.061-0.298c-8.749-0.623-16.298,5.91-16.935,14.626l-5.955,81.261c-0.673,9.215,6.638,17.08,15.877,17.08h40.195
           c4.14,0,7.495-3.355,7.495-7.495s-3.355-7.495-7.495-7.495h-40.195c-0.269,0-0.498-0.1-0.681-0.297
           c-0.184-0.197-0.267-0.433-0.247-0.7l5.955-81.26c0.017-0.229,0.112-0.421,0.286-0.57c0.174-0.149,0.383-0.209,0.606-0.201
           c22.598,1.656,86.714,6.353,109.603,8.03c0.459,0.034,0.804,0.435,0.77,0.893l-5.357,73.138c-0.04,0.543-0.498,0.967-1.042,0.967
           h-34.722c-4.14,0-7.495,3.355-7.495,7.495s3.355,7.495,7.495,7.495h34.722c8.356,0,15.382-6.528,15.991-14.862l5.357-73.137
           c0.64-8.701-5.921-16.3-14.624-16.938l-3.785-0.278l0.38-5.186c0.484-6.59,2.868-12.864,6.895-18.146
           c8.604-11.281,9.973-10.686,53.261-34.849c0.105-0.058,0.208-0.119,0.311-0.183c6.481-4.036,22.016-15.714,26.62-37.084
           l32.133-118.17c0.038-0.139,0.071-0.278,0.101-0.419C518.065,145.28,485.527,132.383,467.721,145.664z M458.178,157.346
           c-1.619,3.165,1.656-3.891-20.4,49.113l-2.834-39.302C434.034,154.523,449.785,147.844,458.178,157.346z M496.388,175.388
           c-0.092,0.338-32.155,118.224-32.228,118.565c-3.207,15.173-13.7,23.763-19.776,27.58c-43.332,24.172-46.983,24.688-57.714,38.758
           c-9.536,12.505-9.786,24.25-10.306,31.327c-11.619-0.851-64.994-4.762-71.854-5.264c1.609-15.77,4.429-31.19,8.402-45.94
           c4.884-18.132,8.265-23.043,32.538-53.141c7.063-8.402,13.12-10.814,59.13-36.491c9.705-5.417,15.255,1.44,16.683,3.606
           c0.013,0.021,0.029,0.038,0.042,0.058c0.027,0.042,0.049,0.085,0.078,0.126c1.692,2.601,3.701,7.594-1.86,11.809
           c-12.124,9.189-40.889,31.17-41.178,31.392c-3.289,2.513-3.918,7.217-1.404,10.506c1.476,1.931,3.704,2.944,5.961,2.944
           c1.587,0,3.186-0.502,4.545-1.54c0.289-0.221,29.032-22.184,41.131-31.356c11.185-8.478,10.823-20.373,7.323-28.338
           c45.243-108.727,33.54-81.367,37.715-89.307C481.631,150.103,500.303,155.84,496.388,175.388z" />
                </g>
            </g>
            <g>
                <g>
                    <path d="M301.341,110.864h-20.043V90.819c0-13.93-11.332-25.262-25.262-25.262c-13.93,0-25.262,11.332-25.262,25.262v20.044
           h-20.044c-13.93,0-25.263,11.332-25.263,25.262s11.333,25.262,25.263,25.262h20.044v20.045
           c-0.001,13.93,11.331,25.262,25.261,25.262c13.93,0,25.262-11.332,25.262-25.262v-20.045h20.044
           c13.93,0,25.263-11.332,25.263-25.262S315.27,110.864,301.341,110.864z M301.341,146.397h-27.538c-4.14,0-7.495,3.355-7.495,7.495
           v27.54c0,5.664-4.608,10.272-10.272,10.272c-5.664,0-10.272-4.608-10.272-10.272v-27.54c0-4.14-3.355-7.495-7.495-7.495h-27.54
           c-5.665,0-10.273-4.608-10.273-10.272s4.608-10.272,10.273-10.272h27.539c4.14,0,7.495-3.355,7.495-7.495V90.819
           c0-5.664,4.608-10.272,10.272-10.272c5.664,0,10.272,4.608,10.272,10.272v27.539c0,4.14,3.355,7.495,7.495,7.495h27.539
           c5.665,0,10.273,4.608,10.273,10.272C311.614,141.79,307.006,146.397,301.341,146.397z" />
                </g>
            </g>
            <g>
                <g>
                    <path d="M370.268,145.993c-4.096-0.624-7.917,2.187-8.541,6.277c-7.892,51.672-53.33,90.637-105.692,90.637
           c-58.958,0-106.923-47.965-106.923-106.923S197.077,29.06,256.035,29.06c52.295,0,97.725,38.91,105.67,90.507
           c0.631,4.092,4.463,6.899,8.549,6.267c4.091-0.63,6.896-4.457,6.267-8.548C367.472,58.523,316.651,14.07,256.035,14.07
           c-67.223,0-121.913,54.691-121.913,121.914c0,67.223,54.691,121.913,121.913,121.913c29.319,0,57.654-10.559,79.789-29.734
           c21.906-18.977,36.368-45.125,40.721-73.63C377.169,150.442,374.358,146.617,370.268,145.993z" />
                </g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
        </symbol>
    </svg>
    {{-- Church --}}
    <svg>
        <symbol id="church-icon">
            <g>
                <g>
                    <path d="M443.726,325.008l-88.417-69.347v-33.14c0-4.143-3.357-7.5-7.5-7.5s-7.5,3.357-7.5,7.5v21.374l-79.68-62.494
   c-2.719-2.131-6.539-2.131-9.259,0l-79.68,62.494v-89.068L255.998,88.7l84.309,66.125v32.692c0,4.143,3.357,7.5,7.5,7.5
   s7.5-3.357,7.5-7.5V166.59l13.309,10.439c3.26,2.558,7.974,1.985,10.531-1.272c2.557-3.26,1.986-7.974-1.272-10.531
   L263.499,75.521V43.999h21.381c4.143,0,7.5-3.357,7.5-7.5s-3.357-7.5-7.5-7.5h-21.381V7.5c0-4.143-3.357-7.5-7.5-7.5
   c-4.143,0-7.5,3.357-7.5,7.5v21.496h-21.381c-4.143,0-7.5,3.357-7.5,7.5s3.357,7.5,7.5,7.5h21.381V75.52
   c-3.849,3.019-110.328,86.532-114.375,89.706c-3.259,2.557-3.829,7.271-1.272,10.531c2.561,3.264,7.277,3.825,10.531,1.272
   l13.308-10.438v89.068l-88.417,69.347c-3.259,2.557-3.829,7.271-1.272,10.531c2.557,3.259,7.271,3.83,10.531,1.272l30.124-23.626
   v183.814H76.078c-4.143,0-7.5,3.357-7.5,7.5c0,4.143,3.357,7.5,7.5,7.5c10.259,0,349.583,0,359.842,0c4.143,0,7.5-3.357,7.5-7.5
   c0-4.143-3.357-7.5-7.5-7.5h-31.576V313.185l30.124,23.626c3.255,2.554,7.972,1.989,10.531-1.272
   C447.555,332.279,446.985,327.565,443.726,325.008z M248.498,496.999h-43.629V378.22c0-18.035,14.673-32.708,32.708-32.708h10.921
   V496.999z M389.343,496.998h-67.214v-67.13c0-4.143-3.357-7.5-7.5-7.5s-7.5,3.357-7.5,7.5v67.131h-43.629V345.511h10.921
   c18.035,0,32.708,14.673,32.708,32.709v16.646c0,4.143,3.357,7.5,7.5,7.5s7.5-3.357,7.5-7.5V378.22
   c0-26.308-21.401-47.71-47.709-47.71h-36.842c-26.31,0-47.709,21.405-47.709,47.71v118.778h-67.214V301.419
   c6.806-5.338,125.674-98.568,133.344-104.584c7.956,6.24,126.605,99.298,133.344,104.584V496.998z" />
                </g>
            </g>
            <g>
                <g>
                    <path d="M270.885,121.611h-29.773c-4.143,0-7.5,3.357-7.5,7.5s3.357,7.5,7.5,7.5h29.773c4.143,0,7.5-3.357,7.5-7.5
   S275.029,121.611,270.885,121.611z" />
                </g>
            </g>
            <g>
                <g>
                    <path d="M270.885,149.425h-29.773c-4.143,0-7.5,3.357-7.5,7.5c0,4.143,3.357,7.5,7.5,7.5h29.773c4.143,0,7.5-3.357,7.5-7.5
   C278.386,152.782,275.029,149.425,270.885,149.425z" />
                </g>
            </g>
            <g>
                <g>
                    <path d="M270.885,261.076h-29.773c-4.143,0-7.5,3.357-7.5,7.5c0,4.143,3.357,7.5,7.5,7.5h29.773c4.143,0,7.5-3.357,7.5-7.5
   C278.386,264.433,275.029,261.076,270.885,261.076z" />
                </g>
            </g>
            <g>
                <g>
                    <path d="M270.885,288.888h-29.773c-4.143,0-7.5,3.357-7.5,7.5c0,4.143,3.357,7.5,7.5,7.5h29.773c4.143,0,7.5-3.357,7.5-7.5
   C278.386,292.246,275.029,288.888,270.885,288.888z" />
                </g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
        </symbol>
    </svg>
    {{-- Bread --}}
    <svg>
        <symbol id="bread-icon">
            <g>
                <g>
                    <path
                        d="M495.535,92.143h-4.457c0.344-1.447,0.545-2.949,0.545-4.5V67.738c0-10.752-8.748-19.5-19.5-19.5h-11.408
       c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h11.408c2.439,0,4.5,2.061,4.5,4.5v19.904c0,2.439-2.061,4.5-4.5,4.5
       h-57.818c-2.439,0-4.5-2.061-4.5-4.5V67.738c0-2.439,2.061-4.5,4.5-4.5h11.408c4.142,0,7.5-3.358,7.5-7.5
       c0-4.142-3.358-7.5-7.5-7.5h-11.408c-10.752,0-19.5,8.748-19.5,19.5v19.904c0,1.551,0.201,3.053,0.545,4.5H287.629
       c-9.212,0-16.707,7.495-16.707,16.707c0,9.227,0,173.848,0,180.013c-25.03-8.489-50.928-12.394-76.045-12.394
       c-83.833,0-154.508,42.636-187.491,101.791c-21.401,38.38,6.263,85.506,50.106,85.506h119.884c4.142,0,7.5-3.357,7.5-7.5
       s-3.358-7.5-7.5-7.5H57.493c-32.46,0-52.795-34.88-37.005-63.201c13.073-23.447,32.309-43.48,55.554-58.968v46.363
       c0,4.143,3.358,7.5,7.5,7.5s7.5-3.357,7.5-7.5v-55.419c12.713-6.936,26.367-12.601,40.668-16.866v72.286
       c0,4.143,3.358,7.5,7.5,7.5c4.142,0,7.5-3.357,7.5-7.5v-76.201c13.182-2.932,26.806-4.688,40.667-5.155v81.356
       c0,4.143,3.358,7.5,7.5,7.5c4.142,0,7.5-3.357,7.5-7.5v-81.356c13.861,0.467,27.485,2.223,40.668,5.155v76.2
       c0,4.143,3.358,7.5,7.5,7.5s7.5-3.357,7.5-7.5v-72.286c14.3,4.265,27.954,9.93,40.668,16.866v55.419c0,4.143,3.358,7.5,7.5,7.5
       s7.5-3.357,7.5-7.5v-46.363c24.616,16.4,43.256,36.911,55.554,58.968c15.808,28.352-4.579,63.201-37.005,63.201H212.378
       c-4.142,0-7.5,3.357-7.5,7.5s3.358,7.5,7.5,7.5c17.422,0,275.056,0,283.049,0c9.139,0,16.574-7.436,16.574-16.574
       c0-10.307,0-308.876,0-338.583C512.001,99.528,504.615,92.143,495.535,92.143z M285.923,108.849c0-0.941,0.765-1.706,1.706-1.706
       c9.598,0,197.464,0,207.906,0c0.808,0,1.464,0.657,1.464,1.464v46.037L285.923,261.942V108.849z M497,447.19
       c0,0.868-0.706,1.574-1.574,1.574H371.037c9.483-8.735,16.233-21.034,18.146-34.47c2.737-19.237-4.076-33.112-14.606-48.661
       L497,303.402V447.19z M497,286.576l-131.476,66.833c-19.813-24.581-47.229-45.241-79.601-58.859v-15.781L497,171.472V286.576z" />
                </g>
            </g>
            <g>
                <g>
                    <path d="M403.594,129.388h-30.552c-4.142,0-7.5,3.358-7.5,7.5s3.358,7.5,7.5,7.5h30.552c4.142,0,7.5-3.358,7.5-7.5
       S407.736,129.388,403.594,129.388z" />
                </g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
        </symbol>
    </svg>
    {{-- Charity --}}
    <svg>
        <symbol id="charity-icon">
            <g>
                <g>
                    <path d="M511.833,310.027c-8.158-38.269-45.677-65.235-86.638-57.957c10.639-123.887-86.883-231.318-212.203-231.318h-0.021
                c-0.001,0-0.002,0-0.003,0c-0.01,0-0.019,0.001-0.029,0.001C94.34,20.783,0,117.275,0,233.744
                C0,354.22,98.509,446.943,213.073,446.943c22.075,0,44.019-3.522,65.576-10.536c19.43,20.469,43.935,38.917,71.778,53.909
                c3.658,1.97,8.22,0.601,10.189-3.057c1.97-3.658,0.601-8.219-3.057-10.189c-98.571-53.076-125.017-132.852-108.589-173.626
                c18.607-46.07,82.568-50.594,107.262-7.141c1.376,2.421,7.796,8.56,15.846,8.383c6.247-0.146,12.028-4.11,15.077-9.002
                c31.133-49.96,99.33-32.402,109.965,17.481c0.866,4.062,4.855,6.655,8.925,5.788C510.108,318.087,512.7,314.09,511.833,310.027z
                 M162.425,42.355c-22.262,20.549-37.029,50.349-46.474,79.023c-18.425-5.258-35.275-12.033-49.856-20.172
                C92.997,71.531,126.397,51.925,162.425,42.355z M56.303,112.931c16.08,9.278,34.798,16.957,55.322,22.828
                c-8.072,29.433-11.922,60.32-12.472,90.463H15.202C16.734,185.357,30.763,145.99,56.303,112.931z M56.096,354.677
                c-25.017-32.159-39.367-71.359-40.899-113.411h83.956c0.546,30.053,4.257,60.998,12.401,90.484
                C90.971,337.644,72.204,345.356,56.096,354.677z M66.007,366.329c14.598-8.16,31.475-14.95,49.931-20.217
                c9.481,28.467,24.256,58.54,46.219,78.774C124.74,414.916,91.434,394.472,66.007,366.329z M205.47,430.978
                c-36.885-6.393-62.719-52.612-74.917-88.641c23.308-5.413,48.683-8.516,74.917-9.016V430.978z M205.47,318.277
                c-27.715,0.512-54.584,3.842-79.301,9.668c-7.279-26.463-11.392-55.947-11.97-86.678h91.271V318.277z M205.47,226.222h-91.271
                c0.548-29.094,4.286-58.741,11.97-86.678c24.718,5.825,51.588,9.156,79.301,9.667V226.222z M205.47,134.165
                c-26.236-0.499-51.614-3.604-74.923-9.016c12.129-36.335,37.274-82.924,74.923-88.763V134.165z M359.891,101.206
                c-14.581,8.14-31.43,14.915-49.856,20.172c-9.346-28.376-24.45-58.872-46.477-79.024
                C300.041,51.986,333.55,72.123,359.891,101.206z M220.515,36.386c37.773,5.858,62.794,52.424,74.923,88.762
                c-23.31,5.414-48.687,8.518-74.923,9.017V36.386z M257.329,410.184c-11.743,12.055-24.164,19.093-36.813,20.979v-97.839
                c3.111,0.06,6.226,0.148,9.334,0.282C231.466,361.514,241.539,387.112,257.329,410.184z M311.468,251.392
                c-41.192-4-77.628,26.35-81.513,67.17c-3.144-0.13-6.294-0.227-9.441-0.285v-77.011h91.264
                C311.715,244.647,311.619,248.027,311.468,251.392z M220.515,226.222v-77.011c27.714-0.511,54.584-3.842,79.301-9.667
                c7.279,26.463,11.392,55.947,11.97,86.678H220.515z M409.611,256.683c-23.949,10.169-34.499,30.393-35.484,31.426
                c-1.808,1.894-2.863,2.147-5.317-0.131c-0.008-0.008-0.016-0.013-0.024-0.021c-9.286-15.833-24.084-27.996-42.402-33.598
                c0.22-4.346,0.368-8.719,0.448-13.092h83.946C410.582,246.403,410.204,251.556,409.611,256.683z M326.831,226.222
                c-0.583-31.975-4.869-62.741-12.472-90.463c20.523-5.871,39.241-13.55,55.322-22.828c25.222,32.632,39.548,71.881,41.102,113.291
                H326.831z" />
                </g>
            </g>
            <g>
                <g>
                    <path d="M505.475,339.272c-4.098-0.657-7.961,2.129-8.622,6.23c-11.221,69.69-81.629,115.269-111.381,131.631
                c-3.64,2.002-4.969,6.576-2.967,10.216c2.003,3.642,6.577,4.968,10.216,2.967c55.891-30.738,108.926-79.956,118.984-142.421
                C512.366,343.793,509.577,339.933,505.475,339.272z" />
                </g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
        </symbol>
    </svg>
</div>
