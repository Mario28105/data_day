<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OffreController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::get('/dashboard', [OffreController::class, 'dashboard'])
    ->middleware(['auth'])
    ->name('dashboard');



Route::middleware('auth')->group(function () {


    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');


    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');


    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');



    Route::get('/candidatures', [OffreController::class, 'mesCandidatures'])
        ->name('candidatures.index');



    Route::get('/offres/{id}', [OffreController::class, 'show'])
        ->name('offres.show');


});


require __DIR__.'/auth.php';