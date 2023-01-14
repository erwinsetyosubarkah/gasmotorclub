<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Profile;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index() {

        $events = Event::latest();

        if(request('search')){
            $events->where('title','like', '%' . request('search') . '%');
        }

        return view('event',[
            'page_title' => 'Event',
            'profile' => Profile::first(),
            'events' => $events->paginate(5)
        ]);
    }

    public function show(Event $event) {
     
        return view('eventsingle',[
            'page_title' => 'Event',
            'profile' => Profile::first(),
            'event' => Event::find($event->id)
        ]);
    }
}
