<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('acara.index', compact('events'));
    }

    public function create()
    {
        return view('acara.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_name_1'        => 'required|string|max:255',
            'event_photo_1'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'event_name_2'        => 'nullable|string|max:255',
            'event_photo_2'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'event_date'          => 'required|date',
            'location'            => 'required|string|max:255',
            'dresscode'           => 'nullable|string|max:255',
            'link_googlemaps'     => 'nullable|string',
            'no_wa_confirmation'  => 'nullable|string|max:20',
            'other_information'   => 'nullable|string',
        ]);

        $data = $request->only([
            'event_name_1',
            'event_name_2',
            'event_date',
            'location',
            'dresscode',
            'link_googlemaps',
            'no_wa_confirmation',
            'other_information',
        ]);

        // Upload foto pasangan
        if ($request->hasFile('event_photo_1')) {
            $data['event_photo_1'] = $request->file('event_photo_1')->store('events', 'public');
        }

        if ($request->hasFile('event_photo_2')) {
            $data['event_photo_2'] = $request->file('event_photo_2')->store('events', 'public');
        }

        Event::create($data);

        return redirect()->route('acara.index')->with('success', 'Acara berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('acara.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'event_name_1'        => 'required|string|max:255',
            'event_photo_1'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'event_name_2'        => 'nullable|string|max:255',
            'event_photo_2'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'event_date'          => 'required|date',
            'location'            => 'required|string|max:255',
            'dresscode'           => 'nullable|string|max:255',
            'link_googlemaps'     => 'nullable|string',
            'no_wa_confirmation'  => 'nullable|string|max:20',
            'other_information'   => 'nullable|string',
        ]);

        $acara = Event::findOrFail($id);

        $data = $request->only([
            'event_name_1',
            'event_name_2',
            'event_date',
            'location',
            'dresscode',
            'link_googlemaps',
            'no_wa_confirmation',
            'other_information',
        ]);

        // Update foto 1 jika ada upload baru
        if ($request->hasFile('event_photo_1')) {
            if ($acara->event_photo_1 && Storage::disk('public')->exists($acara->event_photo_1)) {
                Storage::disk('public')->delete($acara->event_photo_1);
            }
            $data['event_photo_1'] = $request->file('event_photo_1')->store('events', 'public');
        }

        // Update foto 2 jika ada upload baru
        if ($request->hasFile('event_photo_2')) {
            if ($acara->event_photo_2 && Storage::disk('public')->exists($acara->event_photo_2)) {
                Storage::disk('public')->delete($acara->event_photo_2);
            }
            $data['event_photo_2'] = $request->file('event_photo_2')->store('events', 'public');
        }

        $acara->update($data);

        return redirect()->route('acara.index')->with('success', 'Acara berhasil diperbarui.');
    }



    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        // Hapus file photo 1 jika ada
        if ($event->event_photo_1 && Storage::exists($event->event_photo_1)) {
            Storage::delete($event->event_photo_1);
        }

        // Hapus file photo 2 jika ada
        if ($event->event_photo_2 && Storage::exists($event->event_photo_2)) {
            Storage::delete($event->event_photo_2);
        }

        // Hapus data dari database
        $event->delete();

        return redirect()->route('acara.index')->with('success', 'Event berhasil dihapus beserta fotonya.');
    }
}
