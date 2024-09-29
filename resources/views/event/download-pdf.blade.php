<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <div class="row">
        <div class="container">
            <img src="{{$event->photo}}" alt="image_évènement"><br/>
            <h1 class="text-primary text_title"><strong>{{$event->title}}</strong></h1><br/>
            <p>{{$event->description}}<br/><br/>
                <strong>Début:</strong> {{date('d F Y', strtotime($event->starts_at))}}<br/>
                <strong>Fin:</strong> {{date('d F Y', strtotime($event->ends_at))}}<br/>
                <strong>Lieu:</strong> {{$event->location}}
            </p>
                
        </div>
    </div>
</body>