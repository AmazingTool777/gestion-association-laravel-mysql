<x-app-layout>
    <x-slot:head>
        <title>{{$event->title}}</title>
        @vite('resources/css/fontawesome.css')
    </x-slot>

    <div class="row">
        <div class="offset-3 col-md-6 mt-2">
            <img src="/{{$event->photo}}" alt="image_évènement"><br/>
            <h1 class="text-primary text_title"><strong>{{$event->title}}</strong></h1><br/>
            <p>{{$event->description}}</p><br/>
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-4" style="color:white;background:green;height:170px">
                        <strong>Date à retenir</strong><br/>
                        Début: {{date('d F Y', strtotime($event->starts_at))}}<br/>
                        Fin: {{date('d F Y', strtotime($event->ends_at))}}
                    </div>
                </div>    
                <div class="col-md-4">
                    <div class="card p-4" style="color:white;background:deeppink;height:170px">
                        <strong>Organisation</strong><br/>{{$event->location}}
                    </div>    
                </div>
            
                <div class="col-md-4">
                    <div class="card p-4" style="color:white;background:deepskyblue;height:170px">
                        <strong>Lieu</strong><br/> Location: {{$event->location}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>