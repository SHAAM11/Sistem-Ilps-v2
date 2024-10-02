<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index-dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');  // Creat Data 
Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create'); // Create Data From Form Create
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store'); // Save Data
Route::get('/contact/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit'); // Edit Data
Route::post('/contact/{id}', [ContactController::class, 'update'])->name('contact.update');
Route::delete('/contact/{id}/destroy', [ContactController::class, 'destroy'])->name('contact.destory');


require __DIR__.'/auth.php';
