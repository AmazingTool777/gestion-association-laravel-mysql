<div id="app-sidenav-overlay" class="app-sidenav-overlay hide-lg"></div>

<nav id="app-sidenav" aria-label="Menu de navigation" class="app-sidenav hide-lg px-2 py-4">
    {{-- Main navigation links --}}
    @php
        $mainLinks = [
            ['href' => '/', 'label' => 'Accueil', 'icon' => 'fa-house'],
            ['href' => '/about', 'label' => 'HelloAsso', 'icon' => 'fa-circle-info'],
            ['href' => '/events', 'label' => 'Evénements', 'icon' => 'fa-calendar-days'],
            ['href' => '/contact', 'label' => 'Nous contacter', 'icon' => 'fa-envelope'],
        ];
    @endphp
    <ul class="list-none m-0 p-0">
        <li>
            @foreach ($mainLinks as $link)
                <x-nav-link :href="$link['href']"
                    class="app-sidenav__link py-3 px-4 font-semibold block text-black/80 hover:bg-black/5 duration-300"
                    active-class-name="active text-primary bg-secondary/30 hover:bg-secondary/40">
                    <i class="fa-solid {{ $link['icon'] }} mr-3"></i>
                    {{ $link['label'] }}
                </x-nav-link>
            @endforeach
        </li>
    </ul>
    {{-- Auth navigation links --}}
    @guest
        <hr class="my-3">
        @php
            $mainLinks = [
                ['href' => '/auth/signup', 'label' => 'Devenir membre', 'icon' => 'fa-user-plus'],
                ['href' => '/auth/signin', 'label' => 'Se connecter', 'icon' => 'fa-lock'],
            ];
        @endphp
        <ul class="list-none m-0 p-0">
            <li>
                @foreach ($mainLinks as $link)
                    <x-nav-link :href="$link['href']"
                        class="app-sidenav__link py-3 px-4 font-semibold block text-black/80 hover:bg-black/5 duration-300"
                        active-class-name="active text-primary bg-secondary/30 hover:bg-secondary/40">
                        <i class="fa-solid {{ $link['icon'] }} mr-3"></i>
                        {{ $link['label'] }}
                    </x-nav-link>
                @endforeach
            </li>
        </ul>
    @endguest
    {{-- Donation CTA --}}
    <hr class="my-3">
    <a href="#"
        class="app-sidenav__link py-3 px-4 font-semibold block text-primary hover:bg-secondary duration-300 border border-solid border-secondary">
        <i class="fa-solid fa-hand-holding-heart mr-3"></i>
        Faire un don
    </a>
</nav>
