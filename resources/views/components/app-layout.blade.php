@props(['showNavbar' => true])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/scss/lib/bootstrap.scss', 'resources/css/lib/fontawesome.css', 'resources/scss/layouts/app-layout.scss'])
    {{ $head }}
</head>

<body>
    {{-- Navigation bar --}}
    @if ($showNavbar)
        <x-app-layout.navbar />
    @endif

    {{-- Modals --}}
    @stack('modals')

    {{ $slot }}

    {{-- JS scripts --}}
    @vite('resources/js/layouts/navbar.js')
    @stack('scripts')
</body>

</html>
