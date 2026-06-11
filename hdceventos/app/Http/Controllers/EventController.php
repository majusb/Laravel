<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\User;

class EventController extends Controller
{
    public function index() {

        $search = request('search');

        if($search){
            $events =Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $events = Event::all();
        }
       
        return view('welcome', ['events' => $events, 'search' => $search]);
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

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id) {
        $event = Event::findOrFail($id);

        $user = auth()->user();
        $hasUserJoined = false;

        if($user) {
            $userEvents = $user->eventsAsParticipant->toArray();

            foreach($userEvents as $userEvent) {
                if($userEvent['id'] == $id) {
                    $hasUserJoined = true;
                    break;
                }
            }
        }

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner, 'hasUserJoined' => $hasUserJoined]);
    }

    public function dashboard() {
    $user = auth()->user();
    $events = $user->events;
    $eventsAsParticipant = $user->eventsAsParticipant;

    return view('events.dashboard', ['events' => $events, 'eventsAsParticipant' => $eventsAsParticipant]);
}

public function destroy($id) {

    Event::findOrFail($id)->delete();

    return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso!');

}

public function edit($id) {
    $event = Event::findOrFail($id);

    $user = auth()->user();

    if($user->id != $event->user_id) {
        return redirect('/dashboard');
    }

    return view('events.edit', ['event' => $event]);


}

public function update(Request $request) 
{
    // 1. Find the event first so $event actually exists
    $event = Event::findOrFail($request->id);
    
    $data = $request->all(); // Or your validated data

    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $requestImage = $request->image;
        $extension = $requestImage->extension();
        $imageName = md5($requestImage->getClientOriginalName() . uniqid(rand(), true)) . "." . $extension;
        $destinationPath = storage_path('app/public/events');
        $requestImage->move($destinationPath, $imageName);
        
        // This will now work perfectly because $event is no longer null!
        $data['image'] = $imageName;
    }

    // 2. Update the fetched event instance
    $event->update($data);

    return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
}

    public function joinEvent($id) {
        
        $user = auth()->user();
        $user->eventsAsParticipant()->attach($id);
        $event = Event::findOrFail($id);
        return redirect('/dashboard')->with('msg', 'Sua presença está confirmada no evento'. $event->title);
    }

    public function leaveEvent($id) {
        $user = auth()->user();
        $user->eventsAsParticipant()->detach($id);
        $event = Event::findOrFail($id);
        return redirect('/dashboard')->with('msg', 'Você saiu com sucesso do evento:'. $event->title);
    }




}