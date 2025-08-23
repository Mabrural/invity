<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function show($slug)
    {
        // Cari tamu berdasarkan slug
        $guest = Guest::with('event')->where('slug', $slug)->firstOrFail();

        // Kirim ke view undangan
        return view('invitations.show', compact('guest'));
    }
}
