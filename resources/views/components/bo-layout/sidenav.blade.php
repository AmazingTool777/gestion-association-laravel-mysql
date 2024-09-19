<div id="bo-sidenav-overlay" class="bo-sidenav-overlay hide-lg"></div>

<nav id="bo-sidenav" aria-labelledby="bo-sidenav-title" class="bo-sidenav px-2 pb-4 pt-3">
    <h2 id="bo-sidenav-title" class="mb-3 px-2">Menu de navigation</h2>
    {{-- Main navigation links --}}
    @php
        $mainLinks = [
            ['href' => '/back-office/dashboard', 'label' => 'Tableau de bord', 'icon' => 'fa-chart-area'],
            ['href' => '/back-office/users', 'label' => 'Utilisateurs', 'icon' => 'fa-users'],
            ['href' => '/back-office/admins', 'label' => 'Administrateurs', 'icon' => 'fa-user-shield'],
            ['href' => '/back-office/events', 'label' => 'Evénements', 'icon' => 'fa-calendar-alt'],
            ['href' => '/back-office/donation-calls', 'label' => 'Appels aux dons', 'icon' => 'fa-hand-holding-heart'],
        ];
    @endphp
    <ul class="list-none m-0 p-0">
        <li>
            @foreach ($mainLinks as $link)
                <x-nav-link :href="$link['href']"
                    class="bo-sidenav__link py-3 px-4 font-semibold block text-black/80 hover:bg-black/5 duration-300"
                    active-class-name="active text-primary bg-secondary/30 hover:bg-secondary/40">
                    <i class="fa-solid {{ $link['icon'] }} mr-3"></i>
                    {{ $link['label'] }}
                </x-nav-link>
            @endforeach
        </li>
    </ul>
</nav>

@push('scripts')
    @vite('resources/js/layouts/bo-sidenav.js')
@endpush
