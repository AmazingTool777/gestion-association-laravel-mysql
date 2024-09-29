<x-app-layout>
    <x-slot:head>
        <title>Evènements</title>
        @vite('resources/css/event/list.css')
    </x-slot>

    <div class="container" style="background-image: url('events_img/events_inner-bg.png')">
        <div class="row">
            <div class="col-md-11 offset-1">
                @foreach ($events as $event)
                    @include('components.card_event', ['event' => $event])
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>
