<?php

namespace App\Http\Controllers;

use App\Models\AssociationEvent;
use Illuminate\Http\Request;
use Storage;
class AssociationEventController extends Controller
{
   
    public function index()
    {
        $events=AssociationEvent::orderBy('created_at',"desc")->paginate(10);
        return view('events',compact('events'));
    }

 
    public function create()
    {
        return view('events.create_event');
    }

    public function store(Request $request)
    {
        $result=request()->validate([
            'title'=>['required'],
            'description'=>['required'],
            'photo'=>[],
            'starts_at'=>['required'],
            'ends_at'=>['required'],
            'location'=>['required'],
            'posted_by'=>auth()->id,
        ]);
        if(request('photo')){
            $image= request('photo');
            $image_name="event_images/".$image->getClientOriginalName();
            $image->move(public_path("/event_images"),$image_name); 
            $result['photo']=$image_name;
           }else{
            $result['photo']="/events_img/1636612872Fambolen-kazo faobe.jpg";
        }    
        
        AssociationEvent::create($result);    
     return redirect()->route('events.index')->with('success','Evenement crée.');
    }

    public function show(AssociationEvent $event)
    {
        return view('events.show_event',[
            'event'=>$event,
            
        ]);
    }

 
    public function edit(AssociationEvent $event)
    {
        //return view('events.edit_event',$event);
    }


    public function update(UpdateAssociationEventRequest $request, AssociationEvent $associationEvent)
    {
        
    }

   
    public function destroy(AssociationEvent $associationEvent)
    {
       
    }
}
