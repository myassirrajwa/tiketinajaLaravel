<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the events.
     */
    public function index()
    {
        $totalUser = User::count();
        $totalEvent = Event::count();   
        $user = auth()->user();
        $event = Event::all();
        return view('admin.admin', compact('user', 'event','totalUser','totalEvent'));
    }

    /**
     * Show the form for creating a new event.
     */
    public function create()
    {
        return view('admin.create');
    }

    public function event_index() {
        $user = auth()->user();
        $event = Event::all();
        return view('admin.data', compact('user', 'event'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'image' => 'nullable|image|mimes:png,jpg,jpeg'
        ]);

        $imagePath = 'image/Komodo.jpg'; // Default image

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image', 'public');
        }

        $validated['image'] = $imagePath;
        $validated['creator_id'] = Auth::id();

        Event::create($validated);

        return redirect()->route('admin')->with('success', 'Tiket berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified event.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        return view('admin.edit', compact('event'));
    }

    /**
     * Update the specified event in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
        'title' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'harga' => 'required|numeric',
        'image' => 'nullable|image|mimes:png,jpg,jpeg'
    ]);

    $event = Event::findOrFail($id);

    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('image', 'public');
    }

    $event->update($validated);

    return redirect()->route('admin')->with('success', 'Tiket berhasil diperbarui!');
    }

    /**
     * Remove the specified event from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin')->with('success', 'Tiket berhasil dihapus!');
    }
}
