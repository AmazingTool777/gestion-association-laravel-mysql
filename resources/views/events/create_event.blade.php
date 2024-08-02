<x-app-layout>
    <x-slot:head>
        <title>Créer un évènement.</title>
    </x-slot>
    <div class="page-wrapper flex justify-center items-center min-h-screen relative"
        style="background-image: url('/events_img/events_inner-bg.png')">
        <div class="content-wrapper bg-white flex justify-center w-full max-w-2xl rounded-lg">
            <div class="row mt-2 mb-3">
                <form method="post" action="{{route('store_event')}}" enctype="multipart/form-data" >
                    @csrf
                    <header class="text-center">
                        <h1 class="text-primary font-light text-3xl mb-4 mt-2">
                            <strong class="font-semibold">Créer un évènement.</strong>
                        </h1>
                    </header>
                    <div class="form-group font-bold mb-3">
                        <label for="title">Titre</label>
                            <input name="title" type="text" class="form-control form-control-sm" id="title" required>                 
                    </div>
                    <div class="form-group font-bold mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control form-control-sm" id="description" rows="3" required>                 
                        </textarea>
                    </div>
                    <div class="form-group font-bold mb-3">
                        <label for="location">Lieu</label>
                        <input name="location" type="text" class="form-control form-control-sm" id="location"  required>                 
                    </div>
                    <div class="form-group font-bold mb-3">
                        <label for="starts_at">Date du début</label>
                        <input name="starts_at" type="date" class="form-control form-control-sm" id="starts_at"  required>                 
                    </div>
                    <div class="form-group font-bold mb-3">
                        <label for="ends_at">Date de fin</label>
                        <input name="ends_at" type="date" class="form-control form-control-sm" id="ends_at" required>                 
                    </div>
                    <div class="form-group font-bold mb-4">
                        <input type="file" name="photo" id="photo" class="form-control form-control-sm"/>
                    </div>  
                    <button type="submit" class="btn btn-primary form-control form-control-sm mb-2">Partager l'évènement.</button>
                </form> 
            </div>
        </div>
    </div>    
</x-app-layout>