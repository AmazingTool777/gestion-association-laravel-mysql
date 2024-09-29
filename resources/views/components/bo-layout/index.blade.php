<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/scss/lib/bootstrap.scss', 'resources/css/lib/fontawesome.css', 'resources/scss/layouts/bo-layout.scss'])
    {{-- Slot for other head tags --}}
    {{ $head }}
</head>

<body>
    {{-- Top bar + Side navigation bar --}}
    <x-bo-layout.navbar />

    {{-- Default slot --}}
    <div class="bo-content-layout px-4 pt-4 pb-8">
        {{ $slot }}
    </div>

    {{-- Modals --}}
    @stack('modals')

    {{-- Javascript files --}}
    @stack('scripts')
</body>

</html>
