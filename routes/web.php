<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::get('/storage/{folder}/{filename}', function ($folder, $filename) {
    $allowedFolders = ['events'];

    if (!in_array($folder, $allowedFolders)) {
        abort(403);
    }

    $path = storage_path('app/public/' . $folder . '/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path);
})->where('filename', '.*');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/acara', function () {
//     return view('acara.index');
// })->middleware(['auth', 'verified'])->name('acara');
Route::middleware('auth')->group(function () {

    Route::get('/acara', [EventController::class, 'index'])->name('acara.index');
    Route::get('/acara/create', [EventController::class, 'create'])->name('acara.create');
    Route::post('/acara', [EventController::class, 'store'])->name('acara.store');

    // Edit & Update
    Route::get('/acara/{id}/edit', [EventController::class, 'edit'])->name('acara.edit');
    Route::put('/acara/{id}', [EventController::class, 'update'])->name('acara.update');

    // Delete
    Route::delete('/acara/{id}', [EventController::class, 'destroy'])->name('acara.destroy');
});

// Guest routes nested dengan Event
Route::prefix('events/{event_id}/guests')->group(function () {
    Route::get('/', [GuestController::class, 'index'])->name('guests.index');
    Route::get('/create', [GuestController::class, 'create'])->name('guests.create');
    Route::post('/', [GuestController::class, 'store'])->name('guests.store');
    Route::get('/{slug}', [GuestController::class, 'show'])->name('guests.show');
    Route::get('/{id}/edit', [GuestController::class, 'edit'])->name('guests.edit');
    Route::put('/{id}', [GuestController::class, 'update'])->name('guests.update');
    Route::delete('/{id}', [GuestController::class, 'destroy'])->name('guests.destroy');
});


// Route::get('/tamu', function () {
//     return view('tamu.index');
// })->middleware(['auth', 'verified'])->name('tamu');
Route::resource('tamu', GuestController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
