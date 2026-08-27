<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/calendar', function () {
    return view('frontend');
})->name('calendar');
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
