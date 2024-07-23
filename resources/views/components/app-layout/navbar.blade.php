<header class="app-navbar sticky top-0 flex justify-between items-center pr-4">
    {{-- Logo --}}
    <a href="/" aria-label="Page d'accueil" class="block h-full nav-logo">
        <img src="/img/logo-xl.png" alt="Logo étendue" class="block h-full">
    </a>
    {{-- Liens de navigation --}}
    <nav aria-label="Menu de navigation principale" class="h-full">
        <ul class="app-navbar__main-nav-links-list flex gap-x-4 h-full">
            <li>
                <x-nav-link href="/" class="flex items-center h-full" active-class-name="active">
                    Accueil
                </x-nav-link>
            </li>
            <li>
                <x-nav-link href="/x-nav-linkbout" class="flex items-center h-full" active-class-name="active">
                    HelloAsso
                </x-nav-link>
            </li>
            <li>
                <x-nav-link href="/events" class="flex items-center h-full" active-class-name="active">
                    Evénements
                </x-nav-link>
            </li>
            <li>
                <x-nav-link href="/contact" class="flex items-center h-full" active-class-name="active">
                    Nous contacter
                </x-nav-link>
            </li>
        </ul>
    </nav>
    <nav aria-label="Navigation d'authentification et appel à action"
        class="flex items-center flex-row-reverse gap-x-4">
        @guest
            {{-- Authentication links --}}
            <ul class="app-navbar__auth-links flex gap-x-4">
                <li><a href="/auth/signup" class="text-primary">Devenir membre</a></li>
                <li><a href="{{ route('login') }}" class="text-primary">Se connecter</a></li>
            </ul>
        @endguest
        @auth
            {{-- Authenticated user menu --}}
            <div class="relative">
                <button id="auth-user-menu-toggle" type="button" aria-label="Avatar de l'utilisateur"
                    data-toggle="auth-user-menu" aria-expanded="false">
                    <x-user-avatar :firstname="Auth::user()->profile->first_name" :lastname="Auth::user()->profile->last_name" :photo="Auth::user()->profile->photo_url" width="2.5rem" />
                </button>
                <div id="auth-user-menu" class="auth-user-menu">
                    <div class="flex items-start gap-x-2 px-2 py-2 mb-2">
                        <x-user-avatar :firstname="Auth::user()->profile->first_name" :lastname="Auth::user()->profile->last_name" :photo="Auth::user()->profile->photo_url" width="3rem"
                            fontsize="1.125rem" />
                        <div class="text-sm">
                            <p class="font-semibold">
                                {{ Auth::user()->profile->last_name }} {{ Auth::user()->profile->first_name }}
                            </p>
                            <p class="opacity-75 text-xs">
                                {{ Auth::user()->email }}
                            </p>
                            @if (Auth::user()->isAdmin())
                                <p class="text-sm mt-1">
                                    {{-- #ec546d --}}
                                    <i @class([
                                        'fa-solid fa-user-shield mr-1',
                                        'text-secondary' => Auth::user()->isAdmin(true),
                                    ]) @style([
                                        'color: #ec546d' => Auth::user()->isSuperAdmin(),
                                    ])></i>
                                    <span @class(['badge', 'text-bg-secondary' => Auth::user()->isAdmin(true)]) @style(['background-color: #ec546d; color: #fff;' => Auth::user()->isSuperAdmin()])>
                                        @if (Auth::user()->isSuperAdmin())
                                            Super Admin
                                        @else
                                            Admin
                                        @endif
                                    </span>
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="list-group">
                        <a href="/me/profile" class="list-group-item list-group-item-action">
                            <i class="fa-solid fa-user mr-2"></i> Mon profil
                        </a>
                        <a href="/me/settings" class="list-group-item list-group-item-action">
                            <i class="fa-solid fa-cog mr-2"></i> Paramètres
                        </a>
                        @if (Auth::user()->isAdmin())
                            <a href="/back-office/dashboard" class="list-group-item list-group-item-action">
                                <i class="fa-solid fa-shield-alt mr-2"></i> Paneau d'administration
                            </a>
                        @endif
                        <button class="list-group-item list-group-item-action" data-bs-toggle="modal"
                            data-bs-target="#logout-modal">
                            <i class="fa-solid fa-sign-out-alt mr-2"></i>
                            Se déconnecter
                        </button>
                    </div>
                </div>
            </div>
        @endauth
        {{-- Call To Action: Faire un don --}}
        <a href="#" class="app-navbar__cta text-primary">Faire un don</a>
    </nav>
</header>

@auth
    {{-- Logout modal --}}
    @push('modals')
        <div class="modal fade" id="logout-modal" tabindex="-1" aria-labelledby="logout-modal-title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="logout-modal-title">
                            <i class="fa-solid fa-sign-out-alt mr-2"></i>
                            Déconnexion
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Voulez-vous vraiment vous déconnecter?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Fermer</button>
                        <form method="POST" action="{{ route('logout.submit') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Se déconnecter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endpush

    @push('scripts')
        @vite('resources/js/navbar.js')
    @endpush
@endauth
