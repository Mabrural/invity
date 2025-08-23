<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guests = Guest::all();
        $events = Event::all();
        return view('tamu.index', compact('guests', 'events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'name'     => 'required|string|max:255',
        ]);

        // slug dasar dari nama
        $baseSlug = Str::slug($request->name);
        $slug     = $baseSlug;
        $counter  = 1;

        // cek apakah slug sudah ada, kalau ada tambahkan angka
        while (Guest::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        $guest = Guest::create([
            'event_id' => $request->event_id,
            'name'     => $request->name,
            'slug'     => $slug,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Tamu berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guest = Guest::findOrFail($id);
        $guest->delete();

        return redirect()
            ->back()
            ->with('success', 'Tamu berhasil dihapus!');
    }
}
