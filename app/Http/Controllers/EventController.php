<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allEvents = Event::orderBy('id', 'desc')->get();
        return view('home', [
            'events' => $allEvents
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mode = "ADD";
        return view('form', [
            "mode" => $mode
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:articles|max:255',
            'description' => 'required',
            'image' => 'required'
        ]);
        if ($validated) {
            $title = $request->title;
            $description = $request->description;
            $image = $request->file("image");
            $path = null;
            if ($image !== null) {
                $path = $image->store('images', 'public');
            }
            Event::create([
                "title" => $title,
                "description" => $description,
                "image_url" => $path
            ]);
            Session::flash('status', 'Event is added successfully!');
            return redirect()->route('events.index');    
        } else {
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::where('id', $id)->firstOrFail();
        return view('detail', [
            "event" => $event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mode = "EDIT";
        $event = Event::where('id', $id)->firstOrFail();
        return view('form', [
            "mode" => $mode,
            "event" => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        if ($validated) {
            $title = $request->title;
            $description = $request->description;
            Event::where('id', $id)->update([
                "title" => $title,
                "description" => $description
            ]);
            Session::flash('status', 'Event is edited successfully!');
            return redirect()->route('events.index');
        } else {
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Event::where('id', $id)->delete();
        return redirect()->route('events.index');
    }
}
