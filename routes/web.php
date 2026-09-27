<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::resources([
    'notes' => NoteController::class,
]);

Route::post('notes/ChangeStatus/{id}',[NoteController::class,'ChangeStatus'])->name('change_Status');

