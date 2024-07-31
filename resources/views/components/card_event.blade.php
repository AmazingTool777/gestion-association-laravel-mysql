<div class="row m-2">
        <div class="col-md-2 col-xl-1 col-xm-5">
            <p class="bg-warning text-center text-grey font-bold" style="font-size:2.2em">{{date('d', strtotime($event->starts_at))}}<p>
            <p class="bg-warning text-center text-grey pb-4" style="font-size:0.8em">{{date('F,', strtotime($event->starts_at))}}<br/>
            {{date('Y', strtotime($event->starts_at))}}</p>
        </div>
        <div class="col-md-10 card border-none">
            <div class="row card-body">
                <div class="col-md-4">
                    <img src="{{$event->photo}}"/>
                </div>
                <div class="col-md-8">
                    <h1 class="text-primary text_title">{{$event->title}}</h1>
                    <p class="mt-3 text_description">{{$event->description}}..</p>
                    <p class="text_detail mt-3">
                        <i class="fas fa-calendar-alt " style="color:orange"></i> {{date('d F Y à h:m', strtotime($event->starts_at))}} - {{date('d F Y à h:m', strtotime($event->ends_at))}}</br>
                        <i class="fas fa-map-marker-alt" style="color:orange"></i> {{$event->location}}
                    </p><br/>
                    <a href="{{route('events.show',$event)}}" style="float:right" class="app-navbar__cta text-primary" >DETAIL</a>
                </div>
            </div>
        </div>
</div>

