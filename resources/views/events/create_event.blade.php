<x-app-layout>
    <x-slot:head>
        <title>Créer un évènement.</title>
        @vite('resources/css/fontawesome.css')
    </x-slot>
<div class="container" style="background-image: url('events_img/events_inner-bg.png')">
    <div class="row mt-5">
        <div class="offset-4 col-md-4">
        <form method="post" action="{{route('store_event')}}" enctype="multipart/form-data" >
            @csrf
            <header class="text-center mb-12">
                        <h1 class="text-primary font-light text-4xl mb-3">
                            <strong class="font-semibold">Créer un évènement.</strong>
                        </h1>
                
                </header>
            <h1></h1>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input name="title" type="text" class="form-controll" id="title" placeholder="Post Title" required>                 
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-controll" id="description" rows="3" required>                 
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="location">Lieu</label>
                                <input name="location" type="text" class="form-controll" id="location" placeholder="Post location" required>                 
                            </div>
                            <div class="form-group">
                                <label for="starts_at">Date du début</label>
                                <input name="starts_at" type="date" class="form-controll" id="starts_at" placeholder="starts_at" required>                 
                            </div>
                            <div class="form-group">
                                <label for="ends_at">Date de fin</label>
                                <input name="ends_at" type="date" class="form-controll" id="ends_at" placeholder="Post ends_at" required>                 
                            </div>
                            <div class="image">
                                <input type="file" name="photo" id="photo">
                            </div>  
                            <button type="submit" >
                        ok
                    </button>
                        </form> 
        </div>
    </div>
</div>
</x-app-layout>