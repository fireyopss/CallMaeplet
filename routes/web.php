<?php

use App\Http\Controllers\FactController;
use App\Models\Facts;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {


    return Inertia::render('welcome',[
        'facts' => Facts::orderBy('created_at', 'desc')->get()
    ]);
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

Route::post('/create-fact', [FactController::class, 'createFact']);

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
