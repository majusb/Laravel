<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index() {
       $events = Event::all();
       
         return view('welcome', ['events' => $events]);
    }

    public function create() {
        return view('events.create');
    }

    public function store(Request $request) {
        $event = new Event;

        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;
        $event->date = $request->date;

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            #$imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $imageName = md5($requestImage->getClientOriginalName() . uniqid(rand(), true)) . "." . $extension;
            #$requestImage->move(public_path('img/events'), $imageName);
            $destinationPath = storage_path('app/public/events');
            $requestImage->move($destinationPath, $imageName);
            $event->image = $imageName;
            #$event->items = json_decode($event->items);
        }

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id) {
        $event = Event::findOrFail($id);
        return view('events.show', ['event' => $event]);
    }
}

